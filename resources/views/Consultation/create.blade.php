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
                                    <a class="nav-link active" id="consultation-tab" data-bs-toggle="tab"
                                        href="#consultation" role="tab" aria-controls="consultation"
                                        aria-selected="true">Consultation</a>
                                </li>
                                <li class="flex-sm-fill text-sm-center nav-item" role="presentation">
                                    <a class="nav-link" id="medication-tab" data-bs-toggle="tab" href="#medication"
                                        role="tab" aria-controls="medication" aria-selected="false">Medication</a>
                                </li>
                                <li class="flex-sm-fill text-sm-center nav-item" role="presentation">
                                    <a class="nav-link" id="laboratory-tab" data-bs-toggle="tab" href="#laboratory"
                                        role="tab" aria-controls="laboratory" aria-selected="false">Laboratory</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!-- Consultation Tab -->
                                <div class="tab-pane fade show active" id="consultation" role="tabpanel"
                                    aria-labelledby="consultation-tab">
                                    <div class="container">
                                        <div class="form-group row">
                                            <div class="col-md-6 mb-3">
                                                <label for="employee" class="form-label">Employee</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-user-md"></i></span>
                                                    <select class="form-select" name="employee_id" id="employee">
                                                        <option value=""></option>
                                                        @foreach ($employee as $row)
                                                            <option value="{{ $row->id }}">{{ $row->firstName }}
                                                                {{ $row->lastName }} - {{ $row->staffId }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('employee_id')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="injurie_id" class="form-label">Injury Type</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-procedures"></i></span>
                                                    <select class="form-select" name="injurie_id" id="injurie_id">
                                                        <option value=""></option>
                                                        @foreach ($injuryType as $injury)
                                                            <option value="{{ $injury->id }}">{{ $injury->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('injurie_id')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="diagnose_id" class="form-label">Diagnosis</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-stethoscope"></i></span>
                                                    <select class="form-select" name="diagnose_id" id="diagnose_id">
                                                        <option value=""></option>
                                                        @foreach ($diagnosis as $diag)
                                                            <option value="{{ $diag->id }}">{{ $diag->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('diagnose_id')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="staffType" class="form-label">Staff Type</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-users"></i></span>
                                                    <select class="form-select" name="staffType" id="staffType">
                                                        <option value="Staff">Staff</option>
                                                        <option value="Family">Family</option>
                                                    </select>
                                                </div>
                                                @error('staffType')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="referral" class="form-label">Referral</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-hospital"></i></span>
                                                    <select class="form-select" name="referral" id="referral">
                                                        <option value=""></option>
                                                        <option value="No Referral">No Referral</option>
                                                        <option value="Fourou">Fourou</option>
                                                        <option value="Kadiolo">Kadiolo</option>
                                                        <option value="Sikasso">Sikasso</option>
                                                        <option value="INPS">INPS</option>
                                                    </select>
                                                </div>
                                                @error('referral')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="history" class="form-label">History</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-history"></i></span>
                                                    <textarea class="form-control" name="history" id="history"></textarea>
                                                </div>
                                                @error('history')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="bp" class="form-label">BP</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-heartbeat"></i></span>
                                                    <input type="number" class="form-control" name="bp"
                                                        id="bp">
                                                </div>
                                                @error('bp')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="pulse" class="form-label">Pulse</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-pulse"></i></span>
                                                    <input type="number" class="form-control" name="pulse"
                                                        id="pulse">
                                                </div>
                                                @error('pulse')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="temperature" class="form-label">Temperature</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-thermometer-half"></i></span>
                                                    <input type="number" class="form-control" name="temperature"
                                                        id="temperature">
                                                </div>
                                                @error('temperature')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="observation" class="form-label">Observation</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                                    <textarea class="form-control" name="observation" id="observation"></textarea>
                                                </div>
                                                @error('observation')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="comments" class="form-label">Comments</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-comment"></i></span>
                                                    <textarea class="form-control" name="comments" id="comments"></textarea>
                                                </div>
                                                @error('comments')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="malaria" class="form-label">Malaria</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="fas fa-virus"></i></span>
                                                    <input type="text" class="form-control" name="malaria"
                                                        id="malaria">
                                                </div>
                                                @error('malaria')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="daysOff" class="form-label">Days Off</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-calendar-alt"></i></span>
                                                    <input type="number" class="form-control" name="daysOff"
                                                        id="daysOff">
                                                </div>
                                                @error('daysOff')
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Medication Tab -->
                                <div class="tab-pane fade" id="medication" role="tabpanel"
                                    aria-labelledby="medication-tab">
                                    <div id="medication-container">
                                        <div class="row medication-item">
                                            <div class="col-md-4">
                                                <label for="drugname-0" class="form-label">Drug Name</label>
                                                <input type="text" class="form-control"
                                                    name="medications[0][drugname]" id="drugname-0">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="prescription-0" class="form-label">Prescription</label>
                                                <input type="text" class="form-control"
                                                    name="medications[0][prescription]" id="prescription-0">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="stock-0" class="form-label">Stock</label>
                                                <input type="number" class="form-control" name="medications[0][stock]"
                                                    id="stock-0">
                                            </div>
                                            <div class="col-md-12 add-remove-buttons">
                                                <button type="button" class="btn btn-success add-medication">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger remove-medication"
                                                    style="display: none;">
                                                    <i class="fas fa-minus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Laboratory Tab -->
                                <div class="tab-pane fade" id="laboratory" role="tabpanel"
                                    aria-labelledby="laboratory-tab">
                                    <div class="row">
                                        @php
                                            $fields = [
                                                'hemoglobin',
                                                'malariaThick',
                                                'malariaThin',
                                                'malariaQuicktest',
                                                'bloodGlucose',
                                                'got',
                                                'gpt',
                                                'ggt',
                                                'creatinine',
                                                'urea',
                                                'potasiumK',
                                                'uricAcid',
                                                'creatinineKinase',
                                                'troponinT',
                                                'urineDipstick',
                                                'urineMicroscopy',
                                                'stoolMicroscopy',
                                                'sputumMicroscopy',
                                                'gammaGt',
                                                'cholesterol',
                                                'total',
                                                'ldh',
                                                'ldl',
                                                'triglyceride',
                                                'tBilirubine',
                                                'dBilirubine',
                                                'iBilirubine',
                                                'fastingGlucose',
                                            ];
                                            $options = ['', 'normal', 'abnormal', 'underminated'];
                                        @endphp
                                        @foreach ($fields as $field)
                                            <div class="col-md-6">
                                                <label for="{{ $field }}"
                                                    class="form-label">{{ ucfirst($field) }}</label>
                                                <select class="form-select" name="laboratory[{{ $field }}]"
                                                    id="{{ $field }}">
                                                    @foreach ($options as $option)
                                                        <option value="">{{ ucfirst($option) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('laboratory.' . $field)
                                                    <div class="alert-danger alert">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
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
