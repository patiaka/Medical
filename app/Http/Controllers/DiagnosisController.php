<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnosis = Diagnosis::all();

        return view('Diagnosis.index', compact('diagnosis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }

        Diagnosis::create($validatedData->validated());
        toastr()->success('Diagnosis added Successfully');

        return \back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Diagnosis $diagnosis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Diagnosis $diagnosi)
    {
        return view('Diagnosis.edit', compact('diagnosi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Diagnosis $diagnosi)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }
        $diagnosi->update($validatedData->validated());
        toastr()->success('diagnosis update succesfully');

        return redirect()->route('diagnosis.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $diagnosi)
    {
        $row = Diagnosis::findOrFail($diagnosi);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' Deleted successfully ' : class_basename($row).' Not Fund',
        ]);
    }
}
