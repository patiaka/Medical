<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMedicationRequest;
use Illuminate\Support\Facades\Validator;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $medication = Medication::all();
        return view('Medication.index',compact('medication'));
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
        //
        $validatedData = Validator::make($request->all(), [
            'drugname' => 'required',
        ]);
        if ($validatedData->fails()) {
            toastr()->error('validation error');

            return \back();
        }
        
        Medication::create($validatedData->validated());
        toastr()->success('Medication added Successfully');

        return \back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Medication $medication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medication $medication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationRequest $request, Medication $medication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medication $medication)
    {
        //
    }
}
