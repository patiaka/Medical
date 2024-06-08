@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Add Medical Check up</h2>
        <form action="{{ route('healthSurveillance.store') }}" method="POST" class="needs-validation" novalidate
            id="medicalCheckupForm">
            @csrf
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" name="employee_id" id="employee_id" required>
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->firstName }} {{ $employee->lastName }} -
                                    {{ $employee->staffId }}</option>
                            @endforeach
                        </select>
                        <label for="employee_id">Employee:</label>
                        <div class="invalid-feedback">
                            Please select an employee.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" name="surveillanceType" id="surveillanceType" required>
                            <option value="">Select Type</option>
                            <option value="preEmployment">Pre Employment</option>
                            <option value="postEmployment">Post Employment</option>
                            <option value="annualMedical">Annual Medical</option>
                            <option value="periodicMedical">Periodical Medical</option>
                        </select>
                        <label for="surveillanceType">Surveillance Type:</label>
                        <div class="invalid-feedback">
                            Please select a surveillance type.
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea rows="4" name="hazards" id="hazards" class="form-control" required></textarea>
                        <label for="hazards">Hazards:</label>
                        <div class="invalid-feedback">
                            Please describe the hazards.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" name="ecg" id="ecg" required>
                            <option value="">Select Result</option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                            <option value="Undetermined">Undetermined</option>
                        </select>
                        <label for="ecg">ECG:</label>
                        <div class="invalid-feedback">
                            Please select the ECG result.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" name="spirometry" id="spirometry" required>
                            <option value="">Select Result</option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                            <option value="Undetermined">Undetermined</option>
                        </select>
                        <label for="spirometry">Spirometry:</label>
                        <div class="invalid-feedback">
                            Please select the spirometry result.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <select class="form-select" name="audiometry" id="audiometry" required>
                            <option value="">Select Result</option>
                            <option value="Normal">Normal</option>
                            <option value="Abnormal">Abnormal</option>
                            <option value="Undetermined">Undetermined</option>
                        </select>
                        <label for="audiometry">Audiometry:</label>
                        <div class="invalid-feedback">
                            Please select the audiometry result.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <textarea name="general" id="general" class="form-control" required></textarea>
                        <label for="general">General:</label>
                        <div class="invalid-feedback">
                            Please provide general observations.
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="date" name="followUp" id="followUp" class="form-control" required>
                        <label for="followUp">Follow Up:</label>
                        <div class="invalid-feedback">
                            Please select a follow-up date.
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-5">
            <h3>Laboratory Data</h3>
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
                        <div class="form-floating">
                            <select class="form-select" name="{{ $field }}" id="{{ $field }}" required>
                                <option value="">Select Result</option>
                                <option value="Normal" @if (old($field) == 'Normal') selected @endif>Normal</option>
                                <option value="Abnormal" @if (old($field) == 'Abnormal') selected @endif>Abnormal</option>
                                <option value="Undetermined" @if (old($field) == 'Undetermined') selected @endif>Undetermined
                                </option>
                            </select>
                            <label for="{{ $field }}">{{ $label }}:</label>
                            <div class="invalid-feedback">
                                Please select the {{ strtolower($label) }} result.
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <!-- Form validation script -->
    <script>
        $(document).ready(function() {
            $('#medicalCheckupForm').validate({
                errorClass: 'is-invalid',
                validClass: 'is-valid',
                errorPlacement: function(error, element) {
                    error.appendTo(element.siblings('.invalid-feedback'));
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass(errorClass).addClass(validClass);
                }
            });
        });
    </script>
@endsection
