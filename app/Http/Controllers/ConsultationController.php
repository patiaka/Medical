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
        $consultations = Consultation::paginate(10);
        return view('Consultation.index',compact('consultations'));
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
     
        // $request->validate([
        //     'user_id' => 'required|exists:users,id',
        //     'employee_id' => 'required|exists:employees,id',
        //     'injurie_id' => 'required|exists:injuries,id',
        //     'staffType' => 'required|string|max:255',
        //     'referral' => 'required|string|max:255',
        //     'diagnosis' => 'required|string|max:255',
        //     'history' => 'required|string',
        //     'bp' => 'required|string|max:255',
        //     'pulse' => 'required|integer',
        //     'temperature' => 'required|integer',
        //     'observation' => 'required',
        //     'comments' => 'required',
        //     'malaria' => 'required|string|max:255',
        //     'daysOff' => 'required|integer',
        //     'diagnosispec' => 'required',
        //     'diagnosiMali' => 'required',
        // ]);
        //
        // dd($request->all());
        Consultation::create($request->validated());
        toastr()->success('Consultation added succesfully');
        return back();

    }

    /**
     * Display the specified resource.
     */
    // public function show(Consultation $consulation)
    // {
    //     //
    // }

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
