<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use App\Models\Company;
use App\Models\Consultation;
use App\Models\Department;
use App\Models\Diagnosis;
use App\Models\Drugname;
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
        $consultationCount = Consultation::count();
        $consultationsByDay = Consultation::whereDate('created_at', now()->format('Y-m-d'))->count();
        $consultationsByMonth = Consultation::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count();
        $consultationsByYear = Consultation::whereYear('created_at', now()->year)->count();

        return view('Consultation.index', compact(
            'consultations',
            'employees',
            'consultationCount',
            'consultationsByDay',
            // 'consultationsByWeek',
            'consultationsByMonth',
            'consultationsByYear'
        ));
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
        $drugname = Drugname::all();

        return view('Consultation.create', compact('injuryType', 'employee', 'diagnosis', 'companys', 'departments', 'drugname'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsultationRequest $request)
    {
        // Création de la consultation
        $consultation = Consultation::create($request->validated());
        // Gestion des médicaments s'il y en a
        if ($request->has('medications') && is_array($request->medications)) {
            foreach ($request->medications as $medicationData) {
                if (is_array($medicationData)) {
                    $medication = new Medication($medicationData);
                    $medication->consultation_id = $consultation->id;
                    $medication->save();
                }
            }
        }
        if ($request->filled('laboratory')) {
            $laboratoryData = $request->input('laboratory');
            $consultation->laboratory()->create($laboratoryData);
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

        $laboratory = $consultation->laboratory ?? new Laboratory;
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
