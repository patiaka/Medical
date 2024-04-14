@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Health Surveillance</h2>
    <form action="{{ route('healthSurveillance.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="employee_id" class="form-label">Employee :</label>
                    <select class="form-select" name="employee_id" id="employee_id">
                        <option value="">Select Employee</option>
                        @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->firstName }} {{ $employee->lastName }} -
                            {{ $employee->staffId }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="surveillanceType" class="form-label">Surveillance Type :</label>
                    <select class="form-select" name="surveillanceType" id="surveillanceType">
                        <option value=""></option>
                        <option value="preEmployment">Pre Employment</option>
                        <option value="postEmployment">Post Employment</option>
                        <option value="annualMedical">Annual Medical</option>
                        <option value="periodicMedical">Periodical Medical</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="hazards" class="form-label">Hazards :</label>
                    <textarea rows="4" name="hazards" id="hazards" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="ecg" class="form-label">ECG :</label>
                    <select class="form-select" name="ecg" id="ecg" required>
                        <option value=""></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="spirometry" class="form-label">Spirometry :</label>
                    <select class="form-select" name="spirometry" id="spirometry" required>
                        <option value=""></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="audiometry" class="form-label">Audiometry :</label>
                    <select class="form-select" name="audiometry" id="audiometry" required>
                        <option value=""></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="general" class="form-label">General :</label>
                    <textarea type="text" name="general" id="general" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="followUp" class="form-label">Follow Up :</label>
                    <input type="date" name="followUp" id="followUp" class="form-control" required>
                </div>
            </div>
        </div>


        <hr>
        <h3>Laboratory Data</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="hemoglobin" class="form-label">Hemoglobin :</label>
                    <select class="form-select" name="hemoglobin" id="hemoglobin" required>
                        <option value=""></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="malariaThick" class="form-label">Malaria Thick :</label>
                    <select class="form-select" name="malariaThick" id="malariaThick" required>
                        <option value=""></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="malariaThin" class="form-label">Malaria Thin :</label>
                    <select class="form-select" name="malariaThin" id="malariaThin" required>
                        <option value=""></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="malariaQuicktest" class="form-label">Malaria Quicktest :</label>
                    <select class="form-select" name="malariaQuicktest" id="malariaQuicktest" required>
                        <option value=""></option>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
        </div>


        <!-- Autres champs de laboratoire à ajouter ici -->

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection