<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\HealthSurveillance;
use Illuminate\Support\Facades\Validator;

class HealthSurveillanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Employee::all();
        $healthSurveillance = HealthSurveillance::all();
        $preEmployment = HealthSurveillance::where('surveillanceType', 'preEmployment')->get();
        $postEmployment = HealthSurveillance::where('surveillanceType', 'postEmployment')->get();
        $annualLeave = HealthSurveillance::where('surveillanceType', 'annualMedical')->get();

        return view('HealthSurveillance.index', compact('healthSurveillance', 'preEmployment', 'postEmployment', 'annualLeave', 'employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();

        return view('HealthSurveillance.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'employee_id' => 'required|exists:employees,id',
            'surveillanceType' => 'required|string',
            'hazards' => 'required|string',
            'ecg' => 'required|string',
            'spirometry' => 'required|string',
            'audiometry' => 'required|string',
            'general' => 'required',
            'followUp' => 'required|date',
            'hemoglobin' => 'required|string',
        ]);

        if ($validatedData->fails()) {
            toastr()->error('Validation error');

            return back();
        }
        $healthSurveillance = HealthSurveillance::create($validatedData->validated());

        if (
            $request->filled('hemoglobin') && $request->filled('malariaThick') && $request->filled('malariaThin') &&
            $request->filled('malariaQuicktest') && $request->filled('bloodGlucose') && $request->filled('got') &&
            $request->filled('gpt') && $request->filled('ggt') && $request->filled('creatinine') &&
            $request->filled('urea') && $request->filled('potasiumK') && $request->filled('uricAcid') &&
            $request->filled('creatinineKinase') && $request->filled('troponinT') && $request->filled('urineDipstick') &&
            $request->filled('urineMicroscopy') && $request->filled('stoolMicroscopy') && $request->filled('sputumMicroscopy') &&
            $request->filled('gammaGt') && $request->filled('cholesterol') && $request->filled('total') &&
            $request->filled('ldh') && $request->filled('ldl') && $request->filled('triglyceride') &&
            $request->filled('tBilirubine') && $request->filled('dBilirubine') && $request->filled('iBilirubine') &&
            $request->filled('fastingGlucose')
        ) {
            $laboratoryData = $request->only([
                'hemoglobin', 'malariaThick', 'malariaThin', 'malariaQuicktest', 'bloodGlucose', 'got', 'gpt',
                'ggt', 'creatinine', 'urea', 'potasiumK', 'uricAcid', 'creatinineKinase', 'troponinT', 'urineDipstick',
                'urineMicroscopy', 'stoolMicroscopy', 'sputumMicroscopy', 'gammaGt', 'cholesterol', 'total', 'ldh', 'ldl',
                'triglyceride', 'tBilirubine', 'dBilirubine', 'iBilirubine', 'fastingGlucose'
            ]);
        
            $healthSurveillance->laboratory()->create($laboratoryData);
        }
        
        toastr()->success('Health Surveillance added successfully');

        return redirect()->route('healthSurveillance.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthSurveillance $healthSurveillance)
    {
        return view('HealthSurveillance.show', compact('healthSurveillance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthSurveillance $healthSurveillance)
    {
        $healthSurveillance->load('Laboratory');
        $employees = Employee::all();
        return view('HealthSurveillance.edit', compact('healthSurveillance','employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthSurveillance $healthSurveillance)
    {
        $validatedData = Validator::make($request->all(), [
            'surveillanceType' => 'required',
            'hazards' => 'required',
            'ecg' => 'required',
            'spirometry' => 'required',
            'audiometry' => 'required',
            'general' => 'required',
            'followUp' => 'required|date',
    
        ]);
    
        if ($validatedData->fails()) {
            toastr()->error('Validation error');
            return back();
        }
    
        $healthSurveillance->update($validatedData->validated());

        // Mettez à jour les données de laboratoire si elles sont présentes dans la requête
        if ($request->filled('hemoglobin') && $request->filled('malariaThick') && $request->filled('malariaThin')) {
            $labData = $request->only([
                'hemoglobin', 'malariaThick', 'malariaThin', 'malariaQuicktest',
                'bloodGlucose', 'got', 'gpt', 'ggt', 'creatinine', 'urea',
                'potasiumK', 'uricAcid', 'creatinineKinase', 'troponinT',
                'urineDipstick', 'urineMicroscopy', 'stoolMicroscopy', 'sputumMicroscopy',
                'gammaGt', 'cholesterol', 'total', 'ldh', 'ldl', 'triglyceride',
                'tBilirubine', 'dBilirubine', 'iBilirubine', 'fastingGlucose'
            ]);
    
            if ($healthSurveillance->laboratory) {
                $healthSurveillance->laboratory->update($labData);
            } else {
                $healthSurveillance->laboratory()->create($labData);
            }
        }
    
        toastr()->success('Health Surveillance updated successfully');
        return redirect()->route('healthSurveillance.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HealthSurveillance $healthSurveillance)
    {
        $healthSurveillance->delete();
        toastr()->success('Health Surveillance deleted successfully');

        return response()->json([
            'success' => true,
        ]);
    }
    public function generatePDF(HealthSurveillance $healthSurveillance)
    {
        $patientName = str_replace(' ', '_', $healthSurveillance->employee->firstName . '_' . $healthSurveillance->employee->lastName);
        $pdf = PDF::loadView('healthSurveillance.pdf', compact('healthSurveillance'));
        return $pdf->download($patientName . 'medical-Checkup.pdf');
    }
}
