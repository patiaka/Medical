<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    //
    public function index()
    {
        $companys = Company::all();
        return view('company.index', compact('companys'));
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }

        Company::create($validatedData->validated());
        toastr()->success('Diagnosis added Successfully');

        return \back();
    }

    public function update(Request $request, Company $companys)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }
        $companys->update($validatedData->validated());
        toastr()->success('Company update succesfully');

        return redirect()->route('company.index');
    }


    public function delete(int $company)
    {
        $row = Company::findOrFail($company);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => class_basename($row) . ' Deleted successfully',
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $companies = Company::where('name', 'like', "%$query%")->get();

        return response()->json($companies);
    }
    
}
