@extends('layouts.app')

@section('content')
<style>
    .form-group {
        margin-bottom: 1rem;
    }

    .input-group-text i {
        font-size: 1.2rem;
    }

    .input-group-text {
        width: 40px;
        justify-content: center;
    }

    .alert-danger {
        margin-top: 0.5rem;
    }

    .medication-item {
        margin-bottom: 1rem;
    }

    .add-remove-buttons {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 1rem;
    }

    .add-remove-buttons button {
        margin: 0 5px;
        padding: 5px;
    }

    .add-remove-buttons i {
        font-size: 1.5rem;
    }
</style>

<h1 class="app-page-title">Consultation</h1>
<hr class="mb-4">
<div class="card">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <form id="consultationForm" action="{{ route('consultation.store') }}" method="POST">
                    @csrf
                    <div class="col-12">
                        <ul class="nav nav-tabs orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4"
                            id="myTab" role="tablist">
                            <li class="flex-sm-fill text-sm-center nav-item" role="presentation">
                                <a class="nav-link active no-loading" id="consultation-tab" data-bs-toggle="tab"
                                    href="#consultation" role="tab" aria-controls="consultation"
                                    aria-selected="true">Consultation</a>
                            </li>
                            <li class="flex-sm-fill text-sm-center nav-item" role="presentation">
                                <a class="nav-lin no-loading" id="medication-tab" data-bs-toggle="tab"
                                    href="#medication" role="tab" aria-controls="medication"
                                    aria-selected="false">Medication</a>
                            </li>
                            <li class="flex-sm-fill text-sm-center nav-item" role="presentation">
                                <a class="nav-link no-loading" id="laboratory-tab" data-bs-toggle="tab"
                                    href="#laboratory" role="tab" aria-controls="laboratory"
                                    aria-selected="false">Laboratory</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- Consultation Tab -->
                            <div class="tab-pane fade show active" id="consultation" role="tabpanel"
                                aria-labelledby="consultation-tab">
                                <div class="container">
                                    <div class="form-group row">

                                        <!-- Employee Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="employee" class="form-label">Employee</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                                                <select class="form-select @error('employee_id') is-invalid @enderror"
                                                    name="employee_id" id="employee">
                                                    <option value=""></option>
                                                    @foreach ($employee as $row)
                                                    <option value="{{ $row->id }}" {{ old('employee_id')==$row->id ?
                                                        'selected' : '' }}>
                                                        {{ $row->firstName }} {{ $row->lastName }} -
                                                        {{ $row->staffId }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('employee_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Injury Type Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="injurie_id" class="form-label">Injury Type</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-procedures"></i></span>
                                                <select class="form-select @error('injurie_id') is-invalid @enderror"
                                                    name="injurie_id" id="injurie_id">
                                                    <option value=""></option>
                                                    @foreach ($injuryType as $injury)
                                                    <option value="{{ $injury->id }}" {{ old('injurie_id')==$injury->id
                                                        ? 'selected' : '' }}>
                                                        {{ $injury->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('injurie_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Diagnosis Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="diagnose_id" class="form-label">Diagnosis</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                                <select class="form-select @error('diagnose_id') is-invalid @enderror"
                                                    name="diagnose_id" id="diagnose_id">
                                                    <option value=""></option>
                                                    @foreach ($diagnosis as $diag)
                                                    <option value="{{ $diag->id }}" {{ old('diagnose_id')==$diag->id ?
                                                        'selected' : '' }}>
                                                        {{ $diag->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('diagnose_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Staff Type Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="staffType" class="form-label">Staff Type</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                <select class="form-select @error('staffType') is-invalid @enderror"
                                                    name="staffType" id="staffType">
                                                    <option value="Staff" {{ old('staffType')=='Staff' ? 'selected' : ''
                                                        }}>Staff
                                                    </option>
                                                    <option value="Family" {{ old('staffType')=='Family' ? 'selected'
                                                        : '' }}>Family
                                                    </option>
                                                </select>
                                            </div>
                                            @error('staffType')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Referral Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="referral" class="form-label">Referral</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                                <select class="form-select @error('referral') is-invalid @enderror"
                                                    name="referral" id="referral">
                                                    <option value=""></option>
                                                    <option value="No Referral" {{ old('referral')=='No Referral'
                                                        ? 'selected' : '' }}>No
                                                        Referral</option>
                                                    <option value="Fourou" {{ old('referral')=='Fourou' ? 'selected'
                                                        : '' }}>Fourou
                                                    </option>
                                                    <option value="Kadiolo" {{ old('referral')=='Kadiolo' ? 'selected'
                                                        : '' }}>Kadiolo
                                                    </option>
                                                    <option value="Sikasso" {{ old('referral')=='Sikasso' ? 'selected'
                                                        : '' }}>Sikasso
                                                    </option>
                                                    <option value="INPS" {{ old('referral')=='INPS' ? 'selected' : ''
                                                        }}>INPS</option>
                                                </select>
                                            </div>
                                            @error('referral')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- History Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="history" class="form-label">History</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-history"></i></span>
                                                <textarea class="form-control @error('history') is-invalid @enderror"
                                                    name="history" id="history">{{ old('history') }}</textarea>
                                            </div>
                                            @error('history')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- BP Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="bp" class="form-label">BP</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                                                <input type="number"
                                                    class="form-control @error('bp') is-invalid @enderror" name="bp"
                                                    id="bp" value="{{ old('bp') }}">
                                            </div>
                                            @error('bp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Pulse Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="pulse" class="form-label">Pulse</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-pulse"></i></span>
                                                <input type="number"
                                                    class="form-control @error('pulse') is-invalid @enderror"
                                                    name="pulse" id="pulse" value="{{ old('pulse') }}">
                                            </div>
                                            @error('pulse')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Temperature Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="temperature" class="form-label">Temperature</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-thermometer-half"></i></span>
                                                <input type="number"
                                                    class="form-control @error('temperature') is-invalid @enderror"
                                                    name="temperature" id="temperature"
                                                    value="{{ old('temperature') }}">
                                            </div>
                                            @error('temperature')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Observation Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="observation" class="form-label">Observation</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                                <textarea
                                                    class="form-control @error('observation') is-invalid @enderror"
                                                    name="observation"
                                                    id="observation">{{ old('observation') }}</textarea>
                                            </div>
                                            @error('observation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Comments Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="comments" class="form-label">Comments</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-comment"></i></span>
                                                <textarea class="form-control @error('comments') is-invalid @enderror"
                                                    name="comments" id="comments">{{ old('comments') }}</textarea>
                                            </div>
                                            @error('comments')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Malaria Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="malaria" class="form-label">Malaria</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-virus"></i></span>
                                                <input type="text"
                                                    class="form-control @error('malaria') is-invalid @enderror"
                                                    name="malaria" id="malaria" value="{{ old('malaria') }}">
                                            </div>
                                            @error('malaria')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Days Off Field -->
                                        <div class="col-md-6 mb-3">
                                            <label for="daysOff" class="form-label">Days Off</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-calendar-alt"></i></span>
                                                <input type="number"
                                                    class="form-control @error('daysOff') is-invalid @enderror"
                                                    name="daysOff" id="daysOff" value="{{ old('daysOff') }}">
                                            </div>
                                            @error('daysOff')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>



                            <!-- Medication Tab -->
                            <div class="tab-pane fade" id="medication" role="tabpanel" aria-labelledby="medication-tab">
                                <div id="medication-container">
                                    <div class="row medication-item no-loading">
                                        <div class="col-md-4">
                                            <label for="diagnose_id" class="form-label">Diagnosis</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                                <select style="width: 100%" name="medications[0][drugname]"
                                                    id="drugname-0"
                                                    class="form-select select2 @error('diagnose_id') is-invalid @enderror"
                                                    name="diagnose_id" id="diagnose_id">
                                                    <option value=""></option>
                                                    @foreach ($drugname as $diag)
                                                    <option value="{{ $diag->name }}" {{ old('diagnose_id')==$diag->name
                                                        ?
                                                        'selected' : '' }}>
                                                        {{ $diag->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('diagnose_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-4">
                                            <label for="prescription-0" class="form-label">Prescription</label>
                                            <input type="text" class="form-control" name="medications[0][prescription]"
                                                id="prescription-0">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="stock-0" class="form-label">Stock</label>
                                            <input type="number" class="form-control" name="medications[0][stock]"
                                                id="stock-0">
                                        </div>
                                        <div class="col-md-12 add-remove-buttons">
                                            <button type="button" class="btn btn-success add-medication no-loading">
                                                <i class="fas fa-plus-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger remove-medication no-loading"
                                                style="display: none;">
                                                <i class="fas fa-minus-circle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="laboratory" role="tabpanel" aria-labelledby="laboratory-tab">
                                <div class="container">
                                    <div class="form-group row">
                                        <!-- Hemoglobin -->
                                        <div class="col-md-6 mb-3">
                                            <label for="hemoglobin" class="form-label">Hemoglobin</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[hemoglobin]"
                                                    id="hemoglobin">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.hemoglobin')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.hemoglobin')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.hemoglobin')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Malaria Thick -->
                                        <div class="col-md-6 mb-3">
                                            <label for="malariaThick" class="form-label">Malaria Thick</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-virus"></i></span>
                                                <select class="form-select" name="laboratory[malariaThick]"
                                                    id="malariaThick">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.malariaThick')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.malariaThick')=='abnormal' ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.malariaThick')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Malaria Thin -->
                                        <div class="col-md-6 mb-3">
                                            <label for="malariaThin" class="form-label">Malaria Thin</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-virus"></i></span>
                                                <select class="form-select" name="laboratory[malariaThin]"
                                                    id="malariaThin">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.malariaThin')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.malariaThin')=='abnormal' ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.malariaThin')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>


                                        <!-- Malaria Quicktest -->
                                        <div class="col-md-6 mb-3">
                                            <label for="malariaQuicktest" class="form-label">Malaria Quicktest</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="fas fa-virus"></i></span>
                                                <select class="form-select" name="laboratory[malariaQuicktest]"
                                                    id="malariaQuicktest">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{
                                                        old('laboratory.malariaQuicktest')=='normal' ? 'selected' : ''
                                                        }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.malariaQuicktest')=='abnormal' ? 'selected' : ''
                                                        }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.malariaQuicktest')=='undetermined' ? 'selected'
                                                        : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Blood Glucose -->
                                        <div class="col-md-6 mb-3">
                                            <label for="bloodGlucose" class="form-label">Blood Glucose</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[bloodGlucose]"
                                                    id="bloodGlucose">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.bloodGlucose')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.bloodGlucose')=='abnormal' ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.bloodGlucose')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- GOT -->
                                        <div class="col-md-6 mb-3">
                                            <label for="got" class="form-label">GOT</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[got]" id="got">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.got')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.got')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.got')=='undetermined' ? 'selected' : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- GPT -->
                                        <div class="col-md-6 mb-3">
                                            <label for="gpt" class="form-label">GPT</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[gpt]" id="gpt">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.gpt')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.gpt')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.gpt')=='undetermined' ? 'selected' : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- GGT -->
                                        <div class="col-md-6 mb-3">
                                            <label for="ggt" class="form-label">GGT</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[ggt]" id="ggt">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.ggt')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.ggt')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.ggt')=='undetermined' ? 'selected' : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Creatinine -->
                                        <div class="col-md-6 mb-3">
                                            <label for="creatinine" class="form-label">Creatinine</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[creatinine]"
                                                    id="creatinine">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.creatinine')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.creatinine')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.creatinine')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Urea -->
                                        <div class="col-md-6 mb-3">
                                            <label for="urea" class="form-label">Urea</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[urea]" id="urea">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.urea')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.urea')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.urea')=='undetermined' ? 'selected' : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="potassiumK" class="form-label">Potassium K</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[potassiumK]"
                                                    id="potassiumK">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.potassiumK')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.potassiumK')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.potassiumK')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Uric Acid -->
                                        <div class="col-md-6 mb-3">
                                            <label for="uricAcid" class="form-label">Uric Acid</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[uricAcid]" id="uricAcid">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.uricAcid')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.uricAcid')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.uricAcid')=='undetermined' ? 'selected' : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Creatinine Kinase -->
                                        <div class="col-md-6 mb-3">
                                            <label for="creatinineKinase" class="form-label">Creatinine Kinase</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[creatinineKinase]"
                                                    id="creatinineKinase">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{
                                                        old('laboratory.creatinineKinase')=='normal' ? 'selected' : ''
                                                        }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.creatinineKinase')=='abnormal' ? 'selected' : ''
                                                        }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.creatinineKinase')=='undetermined' ? 'selected'
                                                        : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Troponin T -->
                                        <div class="col-md-6 mb-3">
                                            <label for="troponinT" class="form-label">Troponin T</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[troponinT]" id="troponinT">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.troponinT')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.troponinT')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.troponinT')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Urine Dipstick -->
                                        <div class="col-md-6 mb-3">
                                            <label for="urineDipstick" class="form-label">Urine Dipstick</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[urineDipstick]"
                                                    id="urineDipstick">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.urineDipstick')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.urineDipstick')=='abnormal' ? 'selected' : ''
                                                        }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.urineDipstick')=='undetermined' ? 'selected'
                                                        : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Urine Microscopy -->
                                        <div class="col-md-6 mb-3">
                                            <label for="urineMicroscopy" class="form-label">Urine Microscopy</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[urineMicroscopy]"
                                                    id="urineMicroscopy">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{
                                                        old('laboratory.urineMicroscopy')=='normal' ? 'selected' : ''
                                                        }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.urineMicroscopy')=='abnormal' ? 'selected' : ''
                                                        }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.urineMicroscopy')=='undetermined' ? 'selected'
                                                        : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Stool Microscopy -->
                                        <div class="col-md-6 mb-3">
                                            <label for="stoolMicroscopy" class="form-label">Stool Microscopy</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[stoolMicroscopy]"
                                                    id="stoolMicroscopy">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{
                                                        old('laboratory.stoolMicroscopy')=='normal' ? 'selected' : ''
                                                        }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.stoolMicroscopy')=='abnormal' ? 'selected' : ''
                                                        }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.stoolMicroscopy')=='undetermined' ? 'selected'
                                                        : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Sputum Microscopy -->
                                        <div class="col-md-6 mb-3">
                                            <label for="sputumMicroscopy" class="form-label">Sputum Microscopy</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[sputumMicroscopy]"
                                                    id="sputumMicroscopy">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{
                                                        old('laboratory.sputumMicroscopy')=='normal' ? 'selected' : ''
                                                        }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.sputumMicroscopy')=='abnormal' ? 'selected' : ''
                                                        }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.sputumMicroscopy')=='undetermined' ? 'selected'
                                                        : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Gamma GT -->
                                        <div class="col-md-6 mb-3">
                                            <label for="gammaGt" class="form-label">Gamma GT</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[gammaGt]" id="gammaGt">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.gammaGt')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.gammaGt')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.gammaGt')=='undetermined' ? 'selected' : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Cholesterol -->
                                        <div class="col-md-6 mb-3">
                                            <label for="cholesterol" class="form-label">Cholesterol</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[cholesterol]"
                                                    id="cholesterol">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.cholesterol')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.cholesterol')=='abnormal' ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.cholesterol')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Total Cholesterol -->
                                        <div class="col-md-6 mb-3">
                                            <label for="total" class="form-label">Total Cholesterol</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[total]" id="total">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.total')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.total')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.total')=='undetermined' ? 'selected' : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- LDL -->
                                        <div class="col-md-6 mb-3">
                                            <label for="ldl" class="form-label">LDL</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[ldl]" id="ldl">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.ldl')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{ old('laboratory.ldl')=='abnormal'
                                                        ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.ldl')=='undetermined' ? 'selected' : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Triglycerides -->
                                        <div class="col-md-6 mb-3">
                                            <label for="triglycerides" class="form-label">Triglycerides</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[triglycerides]"
                                                    id="triglycerides">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.triglycerides')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.triglycerides')=='abnormal' ? 'selected' : ''
                                                        }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.triglycerides')=='undetermined' ? 'selected'
                                                        : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- TBilrubine -->
                                        <div class="col-md-6 mb-3">
                                            <label for="tBilirubine" class="form-label">Total Bilirubine</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[tBilirubine]"
                                                    id="tBilirubine">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.tBilirubine')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.tBilirubine')=='abnormal' ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.tBilirubine')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- DBilrubine -->
                                        <div class="col-md-6 mb-3">
                                            <label for="dBilirubine" class="form-label">Direct Bilirubine</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[dBilirubine]"
                                                    id="dBilirubine">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.dBilirubine')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.dBilirubine')=='abnormal' ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.dBilirubine')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- IBilrubine -->
                                        <div class="col-md-6 mb-3">
                                            <label for="iBilirubine" class="form-label">Indirect Bilirubine</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[iBilirubine]"
                                                    id="iBilirubine">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.iBilirubine')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.iBilirubine')=='abnormal' ? 'selected' : '' }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.iBilirubine')=='undetermined' ? 'selected' : ''
                                                        }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Fasting Glucose -->
                                        <div class="col-md-6 mb-3">
                                            <label for="fastingGlucose" class="form-label">Fasting Glucose</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i
                                                        class="fas fa-tachometer-alt"></i></span>
                                                <select class="form-select" name="laboratory[fastingGlucose]"
                                                    id="fastingGlucose">
                                                    <option value="">Select Status</option>
                                                    <option value="normal" {{ old('laboratory.fastingGlucose')=='normal'
                                                        ? 'selected' : '' }}>
                                                        Normal</option>
                                                    <option value="abnormal" {{
                                                        old('laboratory.fastingGlucose')=='abnormal' ? 'selected' : ''
                                                        }}>
                                                        Abnormal</option>
                                                    <option value="undetermined" {{
                                                        old('laboratory.fastingGlucose')=='undetermined' ? 'selected'
                                                        : '' }}>
                                                        Undetermined</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Save Consultation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
            const medicationsContainer = document.getElementById('medication-container');

            function updateRemoveButtons() {
                const medicationItems = document.querySelectorAll('.medication-item');
                medicationItems.forEach((item, index) => {
                    const removeButton = item.querySelector('.remove-medication');
                    if (index === 0) {
                        removeButton.style.display = 'none';
                    } else {
                        removeButton.style.display = 'inline-block';
                    }
                });
            }

            medicationsContainer.addEventListener('click', function(event) {
                if (event.target.closest('.add-medication')) {
                    const medicationItem = event.target.closest('.medication-item');
                    const newMedicationItem = medicationItem.cloneNode(true);
                    const index = document.querySelectorAll('.medication-item').length;
                    const inputs = newMedicationItem.querySelectorAll('input');
                    inputs.forEach(input => {
                        input.value = '';
                        input.id = input.id.replace(/\d+/, index);
                        input.name = input.name.replace(/\d+/, index);
                    });
                    medicationsContainer.appendChild(newMedicationItem);
                    updateRemoveButtons();
                }

                if (event.target.closest('.remove-medication')) {
                    const medicationItem = event.target.closest('.medication-item');
                    medicationsContainer.removeChild(medicationItem);
                    updateRemoveButtons();
                }
            });

            updateRemoveButtons();
        });
</script>
@endsection
