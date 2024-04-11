<?php

namespace App\Http\Controllers;

use App\Models\Injury;
use App\Models\Employee;
use App\Models\Diagnosis;
use App\Models\Laboratory;
use App\Models\Medication;
use App\Models\Consultation;
use App\Http\Requests\StoreConsultationRequest;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        $consultations = Consultation::all();

        return view('Consultation.index', compact('consultations', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $injuryType = Injury::all();
        $employee = Employee::all();
        $diagnosis = Diagnosis::all();

        return view('Consultation.create', compact('injuryType', 'employee', 'diagnosis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsultationRequest $request)
    {
      
        $consultation = Consultation::create($request->validated());
        if ($request->filled('laboratory')) {
            $laboratoryData = $request->input('laboratory');
            $laboratory = new Laboratory($laboratoryData);
            $consultation->laboratory()->save($laboratory);
        }
    

        foreach ($request->medications as $medicationData) {
            $medication = new Medication();
            $medication->consultation_id = $consultation->id;
            $medication->drugname = $medicationData['drugname'];
            $medication->prescription = $medicationData['prescription'];
            $medication->stock = $medicationData['stock'];
            $medication->save();
        }
        toastr()->success('Consultation added succesfully');

        return redirect()->route('consultation.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        return view('consultation.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consultation)
    {
        $injuryType = Injury::all();
        $employee = Employee::all();
        $diagnosis = Diagnosis::all();

        return view('consultation.edit', compact('consultation', 'injuryType', 'employee', 'diagnosis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreConsultationRequest $request, Consultation $consultation)
    {
        $consultation->update($request->validated());
        $laboratory = $consultation->laboratory ?? new Laboratory();
        $laboratory->fill($request->input('laboratory', []));
        $consultation->laboratory()->save($laboratory);
        toastr()->success('Consultation update succesfully');

        return redirect()->route('consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $consultation)
    {
        //
        $row = Consultation::findOrFail($consultation);
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' Deleted successfully ' : class_basename($row).' Not Fund',
        ]);

    }
}
