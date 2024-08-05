<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use App\Models\Company;
use App\Models\Consultation;
use App\Models\Department;
use App\Models\Diagnosis;
use App\Models\Employee;
use App\Models\Injury;
use App\Models\Laboratory;
use App\Models\Medication;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Gate;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $companys = Company::all();
        $diagnosis = Diagnosis::all();
        $departments = Department::all();

        return view('Consultation.create', compact('injuryType', 'employee', 'diagnosis', 'companys', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsultationRequest $request)
    {
        // Créer la consultation avec les données validées
        $consultation = Consultation::create($request->validated());

        // Enregistrer les médicaments s'ils sont présents
        if ($request->has('medications') && is_array($request->medications)) {
            foreach ($request->medications as $medicationData) {
                // Assurez-vous que $medicationData est un tableau d'attributs
                if (is_array($medicationData)) {
                    $medication = new Medication($medicationData);
                    $medication->consultation_id = $consultation->id;
                    $medication->save();
                }
            }
        }

        // Enregistrer le laboratoire s'il est présent
        if ($request->has('laboratory')) {
            $laboratoryData = $request->input('laboratory');
            $laboratory = new Laboratory($laboratoryData); // Assurez-vous que $laboratoryData est un tableau d'attributs
            $consultation->laboratory()->save($laboratory);
        }

        toastr()->success('Consultation added successfully');

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
        if (! Gate::allows('update-consultation', $consultation)) {
            abort(403);
        }
        $injuryType = Injury::all();
        $employee = Employee::all();
        $diagnosis = Diagnosis::all();
        $laboratory = $consultation->laboratory;
        $medications = $consultation->medications;

        return view('consultation.edit', compact('consultation', 'injuryType', 'employee', 'diagnosis', 'laboratory', 'medications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreConsultationRequest $request, Consultation $consultation)
    {
        $consultation->update($request->validated());

        // Mettre à jour les données du laboratoire
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
        $row = Consultation::findOrFail($consultation);
        if (! Gate::allows('delete-consultation', $row)) {
            abort(403);
        }
        $row->delete();

        return response()->json([
            'success' => true,
            'message' => $row ? class_basename($row).' Deleted successfully ' : class_basename($row).' Not Fund',
        ]);
    }

    public function generatePDF(Consultation $consultation)
    {
        $patientName = str_replace(' ', '_', $consultation->employee->firstName.'_'.$consultation->employee->lastName);
        $pdf = PDF::loadView('consultation.pdf', compact('consultation'));

        return $pdf->download($patientName.'_consultation-details.pdf');
    }
}
