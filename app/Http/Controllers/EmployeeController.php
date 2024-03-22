<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Liste des employées
    public function index()
    {
        $companys = ['SOMISY', 'CORICA', 'SFTP', 'Aggreko', 'SNIAF'];
        sort($companys);
        $departments = Department::all();
        $employees = Employee::with('department')->paginate(10);

        return view('employee.index', compact('employees', 'departments', 'companys'));

    }

    // Enregistrement des employées
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'staffId' => 'required|integer|unique:employees,staffId',
            'firstName' => 'required',
            'lastName' => 'required',
            'birthDate' => 'required|date',
            'jobTitle' => 'required',
            'company' => 'required',
            'employeeType' => 'required|string',
            'department_id' => 'required|exists:departments,id',
        ]);

        Employee::create($validatedData);
        toastr()->success('Employee added Successfully');

        return redirect()->back();
    }

    //Edition des employées
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $companys = ['SOMISY', 'CORICA', 'SFTP', 'Aggreko', 'SNIAF'];
        sort($companys);

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
            'company' => 'required',
            'employeeType' => 'required',
            'department_id' => 'required|exists:departments,id',
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
