<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\HealthSurveillance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HealthSurveillanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $healthSurveillance = HealthSurveillance::all();

        return view('HealthSurveillance.index', compact('healthSurveillance'));
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
        ]);

        if ($validatedData->fails()) {
            toastr()->error('Validation error');

            return back();
        }
        $healthSurveillance = HealthSurveillance::create($validatedData->validated());

        if ($request->filled('hemoglobin') && $request->filled('malariaThick') && $request->filled('malariaThin')) {
            $laboratoryData = $request->only(['hemoglobin', 'malariaThick', 'malariaThin']);
            $healthSurveillance->laboratory()->create($laboratoryData);
        }
        toastr()->success('Health Surveillance added successfully');

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(HealthSurveillance $healthSurveillance)
    {
        // return view('HealthSurveillance.show', compact('healthSurveillance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HealthSurveillance $healthSurveillance)
    {
        return view('HealthSurveillance.edit', compact('healthSurveillance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HealthSurveillance $healthSurveillance)
    {
        $validatedData = Validator::make($request->all(), [
            'surveillanceType' => 'required',
            'occupation' => 'required',
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
        toastr()->success('Health Surveillance updated successfully');

        return redirect()->route('health-surveillance.index');
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
}
