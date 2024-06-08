<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Liste des employées
    public function index()
    {
        $companys = Company::all();
        $departments = Department::all();
        $employees = Employee::with('department')->get();

        return view('employee.index', compact('employees', 'departments', 'companys'));

    }

    // Enregistrement des employées
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            // 'employeeNumber' => 'required|string|unique:employees,employeeNumber',
            'staffId' => 'required|string|unique:employees,staffId',
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate' => 'required|date',
            'jobTitle' => 'required',
            'employeeType' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'company_id' => 'required|exists:companies,id'
        ]);
        $data = Employee::create($validatedData);
        $data->generateId('EMP');
        toastr()->success('Employee added Successfully');

        return redirect()->route('employee.index');
    }

    //Edition des employées
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $companys = Company::all();

        return view('employee.edit', compact('employee', 'departments', 'companys'));
    }

    // Mise a jour des employées
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'staffId' => 'required|unique:employees,staffId,'.$employee->id,
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate' => 'required|date',
            'jobTitle' => 'required',
            'employeeType' => 'required',
            'department_id' => 'required|exists:departments,id',
            'company_id' => 'required|exists:companies,id',
        ]);

        $employee->update($validatedData);

        toastr()->success('Employee updated successfully');

        return redirect()->route('employee.index');
    }

    public function delete(int $employee)
    {

        $row = Employee::findOrFail($employee);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' Deleted successfully ' : class_basename($row).' Not Fund',
        ]);

    }
}
