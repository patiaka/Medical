@extends('layouts.app')
@section('content')
    <h1 class="app-page-title">Consultation</h1>
    <hr class="mb-4">
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <form class="row" action="{{ route('consultation.store') }}" method="POST">
                        @csrf
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
                            <label for="nationality" class="form-label">Expat/National</label>
                            <select class="form-select" name="staffType" id="nationality">
                                <option value="national">national</option>
                                <option value="expat">expat</option>
                            </select>
                            @error('nationality')
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
                            @error('diagnosis')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="history" class="form-label">History</label>
                            <textarea class="form-control" name="history" id="history"></textarea>
                            @error('history')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="bp" class="form-label">BP</label>
                            <input type="text" class="form-control" name="bp" id="bp">
                            @error('bp')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="pulse" class="form-label">Pulse</label>
                            <input type="number" class="form-control" name="pulse" id="pulse">

                            @error('pulse')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="temperature" class="form-label">Temperature</label>
                            <input type="number" class="form-control" name="temperature" id="temperature">
                            @error('temperature')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="observation" class="form-label">Observation</label>
                            <textarea class="form-control" name="observation" id="observation" rows="3"></textarea>
                            @error('observation')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="comments" class="form-label">Comments</label>
                            <textarea class="form-control" name="comments" id="comments" rows="3"></textarea>
                            @error('comments')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="malaria" class="form-label">Malaria</label>
                            <input type="text" class="form-control" name="malaria" id="malaria">
                            @error('malaria')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="daysOff" class="form-label">Days Off (include today)</label>
                            <input type="number" class="form-control" name="daysOff" id="daysOff">
                            @error('daysOff')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="diagnosispec" class="form-label">Diagnosis specific</label>
                            <select class="form-select" name="diagnosispec" id="diagnosispec">
                                <option value="" selected disabled>select</option>
                                <option value="diagnosispec1">Diagnosispec1</option>
                                <option value="diagnosispec2">Diagnosispec2</option>
                            </select>
                            @error('diagnosispec')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="diagnosiMali" class="form-label">Diagnosis Mali</label>
                            <select class="form-select" name="diagnosiMali" id="diagnosiMali">
                                <option value="" selected disabled>select</option>
                                <option value="diagnosiMali1">DiagnosiMali1</option>
                                <option value="diagnosiMali2">DiagnosiMali2</option>
                            </select>
                            @error('diagnosiMali')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center mt-2">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-secondary">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
