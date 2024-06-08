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
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="flex-grow-1">
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
                            <button type="button" class="btn btn-primary ms-2" data-bs-toggle="modal"
                                data-bs-target="#addEmployeeModal">
                                Add
                            </button>
                        </div>

                        <div class="col-md-6">
                            <label for="injury_type" class="form-label">Injury Type</label>
                            <select class="form-select" name="injurie_id" id="injurie_id">
                                <option value=""></option>
                                @foreach ($injuryType as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            @error('injurie_id')
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
                            <select class="form-select" name="nationality" id="nationality">
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
                                <option value="referral">No Referral</option>
                                <option value="Fourou">Fourou</option>
                                <option value="Kadiolo">Kadiolo</option>
                                <option value="Sikasso">Sikasso</option>
                                <option value="INPS">INPS</option>
                            </select>
                            @error('referral')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="diagnosis" class="form-label">Diagnosis</label>
                            <select class="form-select" name="diagnose_id" id="diagnosis">
                                <option value="" selected disabled>select</option>
                                @foreach ($diagnosis as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
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
                            <label for="observation" class="form-label">Medical Observation</label>
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
                            <label for="malaria" class="form-label">Malaria Prophylaxis</label>
                            <select class="form-select" name="malaria" id="malaria">
                                <option value="" selected disabled>none</option>
                                <option value="Doxycycline">Doxycycline</option>
                                <option value="Lariam">Lariam</option>
                                <option value="Chloroquine">Chloroquine</option>
                                <option value="Coartem">Coartem 20 mg</option>
                                <option value="Fansider">Fansider</option>

                            </select>
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

                </div>
                {{-- @include('Laboratory.create') --}}
                @include('Medication.create')

            </div>
            </form>
        </div>
    </div>
    </div>
    </div>

    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEmployeeModalLabel">Add Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addEmployeeForm" action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <!-- Employee form fields... -->
                        <div class="mb-3">
                            <label for="staffId" class="form-label">Staff ID</label>
                            <input type="text" class="form-control" id="staffId" name="staffId" value="">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                            placeholder="Employee First Name" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                            placeholder="Employee Last Name" value="" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birthDate" name="birthDate" value="">
                        </div>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" name="jobTitle"
                                placeholder="Employee Job Title" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <select class="form-control" name="company" id="company">
                                <option value=""></option>
                                @foreach ($companys as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="employeeType" class="form-label">Employee Type</label>
                            <select class="form-control" name="employeeType" id="employeeType">
                                <option selected disabled>select</option>
                                <option value="National">National</option>
                                <option value="Expat">Expat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-control" name="department_id" id="department_id">
                                <option value=""></option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
