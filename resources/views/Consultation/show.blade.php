@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ $consultation->employee->firstName }}
                        {{ $consultation->employee->lastName }} - Consultation Details</div>
                    <div class="card-body">
                        <div class="consultation-details">
                            <div class="consultation-info mb-4">
                                <h4 class="fw-bold mb-3">Consultation Information</h4>
                                <dl class="row">
                                    <div class="col-sm-4">
                                        <dt>Consultation ID:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->id }}</dd>
                                    </div>
                                    <div class="col-sm-4">
                                        <dt>Patient Number :</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->employee->employeeNumber }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Consultation Date:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->created_at }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Patient Name:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->employee->firstName }} {{ $consultation->employee->lastName }}
                                        </dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>National/Expat:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->employee->employeeType }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Staff ID:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->employee->staffId }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Company:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->employee->company }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Department:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->employee->department->name }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Seen by:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->user->name }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Injury Type:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->injurie->name }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Staff/Family:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->staffType }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Referral:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->referral }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Diagnosis:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->diagnosis }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>History:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->history }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>BP:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->bp }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Pulse:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->pulse }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Temperature:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->temperature }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Observation:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->observation }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Comments:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->comments }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Malaria:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->malaria }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Days Off:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->daysOff }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Diagnosis Specific:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->diagnosispec }}</dd>
                                    </div>

                                    <div class="col-sm-4">
                                        <dt>Diagnosis Mali:</dt>
                                    </div>
                                    <div class="col-sm-8">
                                        <dd>{{ $consultation->diagnosiMali }}</dd>
                                    </div>
                                </dl>
                            </div>
                            @include('Laboratory.details')
                            @include('Medication.details')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('consultation.pdf', $consultation) }}" class="btn btn-primary">Générer PDF des détails</a>
        <a href="{{ route('consultation.index') }}" class="btn btn-secondary">Back to Consultation List</a>
    </div>
@endsection
