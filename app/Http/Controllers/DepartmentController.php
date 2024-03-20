<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index()
    {
        $departments = Department::paginate(10);

        return view('department.index', compact('departments'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function edit(Department $department)
    {
        return view('department.edit', compact('department'));
    }

    public function store(Department $department, saveDepartmentRequest $request)
    {

        $department->name = $request->department_name;
        $department->save();
        toastr()->success('Department added successfully');

        return redirect()->route('department.index');

    }

    public function update(Department $department, saveDepartmentRequest $request)
    {

        $department->name = $request->department_name;
        $department->update();
        toastr()->success('Department updated');

        return redirect()->route('department.index');

    }

    public function delete(int $department)
    {

        $row = Department::findOrFail($department);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' supprimer avec success ' : class_basename($row).' non trouvé',
        ]);

    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $department = Department::where('name', 'like', "%$query%")->get();

        return response()->json($department);
    }
}
