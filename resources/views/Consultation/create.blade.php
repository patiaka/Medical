@extends('layouts.app')

@section('content')
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="employee" class="form-label">Employee</label>
                                            <select class="form-select" name="employee_id" id="employee">
                                                <option value=""></option>
                                                @foreach ($employee as $row)
                                                    <option value="{{ $row->id }}">{{ $row->firstName }}
                                                        {{ $row->lastName }} - {{ $row->staffId }}</option>
                                                @endforeach
                                            </select>
                                            @error('employee_id')
                                                <div class="alert-danger alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="injury_type" class="form-label">Injury Type</label>
                                            <select class="form-select" name="injurie_id" id="injurie_id">
                                                <option value=""></option>
                                                @foreach ($injuryType as $injury)
                                                    <option value="{{ $injury->id }}">{{ $injury->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('injurie_id')
                                                <div class="alert-danger alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="diagnosis" class="form-label">Diagnosis</label>
                                            <select class="form-select" name="diagnose_id" id="diagnose_id">
                                                <option value=""></option>
                                                @foreach ($diagnosis as $diag)
                                                    <option value="{{ $diag->id }}">{{ $diag->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('diagnose_id')
                                                <div class="alert-danger alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="staffType" class="form-label">Staff Type</label>
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
                                                <option value="No Referral">No Referral</option>
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
                                            <label for="history" class="form-label">History</label>
                                            <textarea class="form-control" name="history" id="history"></textarea>
                                            @error('history')
                                                <div class="alert-danger alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="bp" class="form-label">BP</label>
                                            <input type="number" class="form-control" name="bp" id="bp">
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
                                            <input type="number" class="form-control" name="temperature"
                                                id="temperature">
                                            @error('temperature')
                                                <div class="alert-danger alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="observation" class="form-label">Observation</label>
                                            <textarea class="form-control" name="observation" id="observation"></textarea>
                                            @error('observation')
                                                <div class="alert-danger alert">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <label for="comments" class="form-label">Comments</label>
                                            <textarea class="form-control" name="comments" id="comments"></textarea>
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
                                            <label for="daysOff" class="form-label">Days Off</label>
                                            <input type="number" class="form-control" name="daysOff" id="daysOff">
                                            @error('daysOff')
                                                <div class="alert-danger alert">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- Medication Tab -->
                                <div class="tab-pane fade" id="medication" role="tabpanel" aria-labelledby="medication-tab">
                                    <div id="medication-container">
                                        <div class="row medication-item">
                                            <div class="col-md-4">
                                                <label for="drugname" class="form-label">Drug Name</label>
                                                <input type="text" class="form-control" name="medications[0][drugname]" id="drugname">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="prescription" class="form-label">Prescription</label>
                                                <input type="text" class="form-control" name="medications[0][prescription]" id="prescription">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="stock" class="form-label">Stock</label>
                                                <input type="number" class="form-control" name="medications[0][stock]" id="stock">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-3" id="add-medication">Add Medication</button>
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
                                        @endphp
                                        @foreach ($fields as $field)
                                            <div class="col-md-6">
                                                <label for="{{ $field }}"
                                                    class="form-label">{{ ucfirst($field) }}</label>
                                                <input type="text" class="form-control"
                                                    name="laboratory[{{ $field }}]" id="{{ $field }}">
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
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('add-medication').addEventListener('click', function() {
                const container = document.getElementById('medication-container');
                const count = container.children.length; // Nombre d'éléments actuels dans le conteneur
                const newItem = document.querySelector('.medication-item').cloneNode(
                    true); // Cloner l'élément

                // Réinitialiser les valeurs des champs clonés
                newItem.querySelectorAll('input').forEach(input => {
                    input.value = ''; // Réinitialiser la valeur
                    input.name = input.name.replace(/\[\d\]/, '[' + count +
                        ']'); // Mettre à jour les noms des champs avec le nouveau compteur
                });

                // Ajouter le nouvel élément cloné au conteneur
                container.appendChild(newItem);
            });

            document.getElementById('consultationForm').addEventListener('submit', function(event) {
                // Empêcher la soumission par défaut pour gérer manuellement via JavaScript
                event.preventDefault();

                // Soumettre le formulaire après validation
                this.submit();
            });
        });
    </script>
@endsection
