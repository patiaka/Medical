@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Health Surveillance</h2>
        <form action="{{ route('healthSurveillance.update', $healthSurveillance->id) }}" method="POST"
            class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="card mb-4">
                <div class="card-header">
                    <h5>General Information</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="employee_id" class="form-label">Employee:</label>
                                <select class="form-select" name="employee_id" id="employee_id" required>
                                    <option value="">Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}" @selected($healthSurveillance->employee_id == $employee->id)>
                                            {{ $employee->firstName }} {{ $employee->lastName }} - {{ $employee->staffId }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please select an employee.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="surveillanceType" class="form-label">Surveillance Type:</label>
                                <select class="form-select" name="surveillanceType" id="surveillanceType" required>
                                    <option value="">Select Type</option>
                                    <option value="preEmployment" @selected($healthSurveillance->surveillanceType == 'preEmployment')>Pre Employment</option>
                                    <option value="postEmployment" @selected($healthSurveillance->surveillanceType == 'postEmployment')>Post Employment</option>
                                    <option value="annualMedical" @selected($healthSurveillance->surveillanceType == 'annualMedical')>Annual Medical</option>
                                    <option value="periodicMedical" @selected($healthSurveillance->surveillanceType == 'periodicMedical')>Periodical Medical</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a surveillance type.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="hazards" class="form-label">Hazards:</label>
                                <textarea rows="4" name="hazards" id="hazards" class="form-control" required>{{ $healthSurveillance->hazards }}</textarea>
                                <div class="invalid-feedback">
                                    Please describe the hazards.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ecg" class="form-label">ECG:</label>
                                <select class="form-select" name="ecg" id="ecg" required>
                                    <option value="">Select Result</option>
                                    <option value="Normal" @selected($healthSurveillance->ecg == 'Normal')>Normal</option>
                                    <option value="Abnormal" @selected($healthSurveillance->ecg == 'Abnormal')>Abnormal</option>
                                    <option value="Undetermined" @selected($healthSurveillance->ecg == 'Undetermined')>Undetermined</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select the ECG result.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="spirometry" class="form-label">Spirometry:</label>
                                <select class="form-select" name="spirometry" id="spirometry" required>
                                    <option value="">Select Result</option>
                                    <option value="Normal" @selected($healthSurveillance->spirometry == 'Normal')>Normal</option>
                                    <option value="Abnormal" @selected($healthSurveillance->spirometry == 'Abnormal')>Abnormal</option>
                                    <option value="Undetermined" @selected($healthSurveillance->spirometry == 'Undetermined')>Undetermined</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select the spirometry result.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="audiometry" class="form-label">Audiometry:</label>
                                <select class="form-select" name="audiometry" id="audiometry" required>
                                    <option value="">Select Result</option>
                                    <option value="Normal" @selected($healthSurveillance->audiometry == 'Normal')>Normal</option>
                                    <option value="Abnormal" @selected($healthSurveillance->audiometry == 'Abnormal')>Abnormal</option>
                                    <option value="Undetermined" @selected($healthSurveillance->audiometry == 'Undetermined')>Undetermined</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select the audiometry result.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="general" class="form-label">General:</label>
                                <textarea name="general" id="general" class="form-control" required>{{ $healthSurveillance->general }}</textarea>
                                <div class="invalid-feedback">
                                    Please provide general observations.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="followUp" class="form-label">Follow Up:</label>
                                <input type="date" name="followUp" id="followUp" class="form-control" required
                                    value="{{ $healthSurveillance->followUp }}">
                                <div class="invalid-feedback">
                                    Please select a follow-up date.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Laboratory Data</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        @php
                            $lab_fields = [
                                'hemoglobin' => 'Hemoglobin',
                                'malariaThick' => 'Malaria Thick',
                                'malariaThin' => 'Malaria Thin',
                                'malariaQuicktest' => 'Malaria Quicktest',
                                'bloodGlucose' => 'Blood Glucose',
                                'got' => 'GOT',
                                'gpt' => 'GPT',
                                'ggt' => 'GGT',
                                'creatinine' => 'Creatinine',
                                'urea' => 'Urea',
                                'potasiumK' => 'Potassium K',
                                'uricAcid' => 'Uric Acid',
                                'creatinineKinase' => 'Creatinine Kinase',
                                'troponinT' => 'Troponin T',
                                'urineDipstick' => 'Urine Dipstick',
                                'urineMicroscopy' => 'Urine Microscopy',
                                'stoolMicroscopy' => 'Stool Microscopy',
                                'sputumMicroscopy' => 'Sputum Microscopy',
                                'gammaGt' => 'Gamma GT',
                                'cholesterol' => 'Cholesterol',
                                'total' => 'Total',
                                'ldh' => 'LDH',
                                'ldl' => 'LDL',
                                'triglyceride' => 'Triglyceride',
                                'tBilirubine' => 'TBilirubine',
                                'dBilirubine' => 'DBilirubine',
                                'iBilirubine' => 'IBilirubine',
                                'fastingGlucose' => 'Fasting Glucose',
                            ];
                        @endphp

                        @foreach ($lab_fields as $field => $label)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="{{ $field }}" class="form-label">{{ $label }}:</label>
                                    <select class="form-select" name="{{ $field }}" id="{{ $field }}"
                                        required>
                                        <option value="">Select Result</option>
                                        <option value="Normal" @selected(optional($healthSurveillance->laboratory)->$field == 'Normal')>Normal</option>
                                        <option value="Abnormal" @selected(optional($healthSurveillance->laboratory)->$field == 'Abnormal')>Abnormal</option>
                                        <option value="Undetermined" @selected(optional($healthSurveillance->laboratory)->$field == 'Undetermined')>Undetermined</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select the {{ strtolower($label) }} result.
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection
