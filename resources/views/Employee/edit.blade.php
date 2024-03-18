@extends('layouts.app')

@section('content')
    <h1 class="app-page-title">Edit Employee</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Edit</h3>
            <div class="section-intro">Edit Employee</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="staffId" class="form-label">Staff ID</label>
                            <input type="text" class="form-control" id="staffId" name="staffId"
                                value="{{ $employee->staffId }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                value="{{ $employee->firstName }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                value="{{ $employee->lastName }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="birthDate" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birthDate" name="birthDate"
                                value="{{ $employee->birthDate }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" name="jobTitle"
                                value="{{ $employee->jobTitle }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Employee Type</label>
                            <select class="form-control" name="employeeType" id="company">

                                <option @selected($employee->employeeType === 'National') value="National">National</option>
                                <option @selected($employee->employeeType === 'Expat') value="Expat">Expat</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <select class="form-control" name="company" id="company" required>

                                @foreach ($companys as $company)
                                    <option value="{{ $company }}" @selected($employee->company == $company)>
                                        {{ $company }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Department</label>
                            <select class="form-control" name="department_id" id="department_id" required>

                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}"
                                        {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                        {{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn app-btn-primary">Update</button>
                    </form>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
@endsection
