@extends('layouts.app')
@section('content')
    <h1 class="app-page-title">Consultation</h1>
    <hr class="mb-4">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <form class="row g-3" action="{{ route('consultation.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                        <div class="col-md-6">
                            <label for="employee" class="form-label">Employee</label>
                            <select class="form-select" name="employee_id" id="employee">
                                <option value=""></option>
                                @foreach ($employee as $row)
                                    <option value="{{ $row->id }}">{{ $row->firstName }} {{ $row->lastName }} -
                                        {{ $row->staffId }}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="injury_type" class="form-label">Injury Type</label>
                            <select class="form-select" name="injurie_id" id="injury_type">
                                <option value=""></option>
                                @foreach ($injuryType as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            @error('injury_type')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="company" class="form-label">Staff/Family</label>
                            <select class="form-select" name="staffType" id="staffType">
                                <option value="Staff">Staff</option>
                                <option value="Family">Family</option>
                            </select>
                            @error('staffType')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="referral" class="form-label">Referral</label>
                            <select class="form-select" name="referral" id="referral">
                                <option value=""></option>
                                <option value="referral">Referral</option>
                                <option value="no referral">No referral</option>
                            </select>
                            @error('referral')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="diagnosis" class="form-label">Diagnosis</label>
                            <textarea class="form-control" name="diagnosis" id="diagnosis" rows="6"></textarea>
                        </div>
                        @error('diagnosis')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="history" class="form-label">History</label>
                            <textarea class="form-control" name="history" id="history"></textarea>
                        </div>
                        @error('history')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="bp" class="form-label">BP</label>
                            <input type="text" class="form-control" name="bp" id="bp">
                        </div>
                        @error('bp')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="pulse" class="form-label">Pulse</label>
                            <input type="number" class="form-control" name="pulse" id="pulse">
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        </div>
                        @error('pulse')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="temperature" class="form-label">Temperature</label>
                            <input type="number" class="form-control" name="temperature" id="temperature">
                        </div>
                        @error('temperature')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="observation" class="form-label">Observation</label>
                            <textarea class="form-control" name="observation" id="observation" rows="3"></textarea>
                        </div>
                        @error('observation')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="comments" class="form-label">Comments</label>
                            <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
                        </div>
                        @error('comments')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="malaria" class="form-label">Malaria</label>
                            <input type="text" class="form-control" name="malaria" id="malaria">
                        </div>
                        @error('malaria')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="daysOff" class="form-label">Days Off (include today)</label>
                            <input type="number" class="form-control" name="daysOff" id="daysOff">
                        </div>
                        @error('daysOff')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="diagnosispec" class="form-label">Diagnosis specific</label>
                            <select class="form-select" name="diagnosispec" id="diagnosispec">
                                <option value="diagnosispec1">Diagnosispec1</option>
                                <option value="diagnosispec2">Diagnosispec2</option>
                            </select>
                        </div>
                        @error('diagnosispec')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-md-6">
                            <label for="diagnosiMali" class="form-label">Diagnosis Mali</label>
                            <select class="form-select" name="diagnosiMali" id="diagnosiMali">
                                <option value="diagnosiMali1">DiagnosiMali1</option>
                                <option value="diagnosiMali2">DiagnosiMali2</option>
                            </select>
                        </div>
                        @error('diagnosiMali')
                            <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
