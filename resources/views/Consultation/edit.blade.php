@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="container">
            <h2>Edit Consultation</h2>
            <form class="row" action="{{ route('consultation.update', $consultation->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="col-md-6">
                    <label for="employee" class="form-label">Employee</label>
                    <select class="form-select" name="employee_id" id="employee">

                        @foreach ($employee as $row)
                            <option @selected($row->id == $consultation->employee_id) value="{{ $row->id }}">{{ $row->firstName }}
                                {{ $row->lastName }} -
                                {{ $row->staffId }}</option>
                        @endforeach
                    </select>
                    @error('employee_id')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="employeeType" class="form-label">National/Expat</label>
                    <select class="form-select" name="employeeType" id="employeeType">
                        <option @selected($consultation->employeeType === 'national') value="national">National</option>
                        <option @selected($consultation->employeeType === 'expat') value="expat">Expat</option>
                    </select>
                    @error('employeeType')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="injury_type" class="form-label">Injury Type</label>
                    <select class="form-select" name="injurie_id" id="injury_type">

                        @foreach ($injuryType as $row)
                            <option @selected($row->id == $consultation->injurie_id) value="{{ $row->id }}">{{ $row->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('injury_type')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="company" class="form-label">Staff/Family</label>
                    <select class="form-select" name="staffType" id="staffType">
                        <option @selected($consultation->staffType === 'Staff') value="Staff">Staff</option>
                        <option @selected($consultation->staffType === 'Family') value="Family">Family</option>
                    </select>
                    @error('staffType')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="referral" class="form-label">Referral</label>
                    <select class="form-select" name="referral" id="referral">
                        <option @selected($consultation->referral === 'referral') value="referral">Referral</option>
                        <option @selected($consultation->referral === 'no referral') value="no referral">No referral
                        </option>
                    </select>
                    @error('referral')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="diagnosis" class="form-label">Diagnosis</label>
                    <textarea class="form-control" name="diagnosis" id="diagnosis" rows="6">{{ $consultation->diagnosis }}</textarea>
                    @error('diagnosis')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="history" class="form-label">History</label>
                    <textarea class="form-control" name="history" id="history">{{ $consultation->history }}</textarea>
                    @error('history')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="bp" class="form-label">BP</label>
                    <input type="text" class="form-control" name="bp" id="bp"
                        value="{{ $consultation->bp }}">
                    @error('bp')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="pulse" class="form-label">Pulse</label>
                    <input type="number" class="form-control" name="pulse" id="pulse"
                        value="{{ $consultation->pulse }}">

                    @error('pulse')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="temperature" class="form-label">Temperature</label>
                    <input type="number" class="form-control" name="temperature" id="temperature"
                        value="{{ $consultation->temperature }}">
                    @error('temperature')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="observation" class="form-label">Observation</label>
                    <textarea class="form-control" name="observation" id="observation" rows="6">{{ $consultation->observation }}</textarea>
                    @error('observation')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="comments" class="form-label">Comments</label>
                    <textarea class="form-control" name="comments" id="comments" rows="6">{{ $consultation->comments }}</textarea>
                    @error('comments')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="malaria" class="form-label">Malaria</label>
                    <input type="text" class="form-control" name="malaria" id="malaria"
                        value="{{ $consultation->malaria }}">
                    @error('malaria')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="daysOff" class="form-label">Days Off (include today)</label>
                    <input type="number" class="form-control" name="daysOff" id="daysOff"
                        value="{{ $consultation->daysOff }}">
                    @error('daysOff')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="diagnosispec" class="form-label">Diagnosis specific</label>
                    <select class="form-select" name="diagnose_id" id="diagnosispec">
                        @foreach ($diagnosis as $row)
                            <option value="{{ $row->id }}" @selected($row->id == $consultation->diagnose_id)>{{ $row->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('diagnosispec')
                        <div class="alert-danger alert">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="diagnosiMali" class="form-label">Diagnosis Mali</label>
                    <select class="form-select" name="diagnosiMali" id="diagnosiMali">
                        <option value="" selected disabled>select</option>
                        <option value="diagnosiMali1" @selected($consultation->diagnosiMali === 'diagnosiMali1')>DiagnosiMali1</option>
                        <option value="diagnosiMali2" @selected($consultation->diagnosiMali === 'diagnosiMali2')>DiagnosiMali2</option>
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
@endsection
