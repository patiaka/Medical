<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConsultationRequest;
use App\Models\Consultation;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Injury;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $employees = Employee::all();
        $consultations = Consultation::paginate(10);
        return view('Consultation.index',compact('consultations','employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $injuryType = Injury::all();
        $employee = Employee::all();
        return view('Consultation.create',compact('injuryType','employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConsultationRequest $request)
    {
        Consultation::create($request->validated());
        toastr()->success('Consultation added succesfully');
        return redirect()->route('consultation.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Consultation $consultation)
    {
        return view('consultation.show',compact('consultation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consultation $consulation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consultation $consulation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        //
    }
}
