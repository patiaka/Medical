@extends('layouts.app')

@section('content')
    <style>
        .custom-select-container {
            margin-bottom: 20px;
        }

        .custom-select {
            position: relative;
            width: 100%;
        }

        .custom-select input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .select-items {
            position: absolute;
            background-color: white;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            /* Masquer initialement */
            z-index: 99;
        }

        .select-option {
            padding: 10px;
            cursor: pointer;
        }

        .select-option:hover {
            background-color: #f1f1f1;
        }
    </style>
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Employee</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <!--//col-->
                    <div class="col-auto">
                        <button type="button" class="btn btn-secondary no-loading" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Add employee
                        </button>
                    </div>
                </div>
                <!--//row-->
            </div>
            <!--//table-utilities-->
        </div>
        <!--//col-auto-->
    </div>
    <!--//row-->
    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Employee Number</th>
                                    <th>Staff id</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Birth Date</th>
                                    <th>Job Title</th>
                                    <th>Company</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->id }}</td>
                                        <td>{{ $employee->employeeNumber }}</td>
                                        <td><span class="truncate">{{ $employee->staffId }}</span></td>
                                        <td>{{ $employee->firstName }}</td>
                                        <td>{{ $employee->lastName }}</td>
                                        <td>{{ $employee->birthDate }}</td>
                                        <td>{{ $employee->jobTitle }}</td>
                                        <td>{{ $employee->company->name }}</td>
                                        <td>{{ $employee->department->name }}</td>
                                        <td>
                                            <div style="display: flex">
                                                <a class="btn-sm app-btn-secondary"
                                                    href="{{ route('employee.edit', $employee->id) }}">
                                                    <i class="fa fa-edit fa-lg text-success"></i>
                                                </a>
                                                @if (Auth::user()->isAdmin())
                                                    <a role="button" href="#"
                                                        onclick="deleteConfirmation('{{ route('employee.delete', $employee->id) }}')"
                                                        class="btn-sm app-btn-danger">
                                                        <i class="fa fa-trash fa-lg text-danger"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">No Employee added</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//tab-pane-->
    </div>
    <!--//tab-content-->
    <!-- Button trigger modal -->

    <!-- Modal add employee -->
    <!-- Modal add employee -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Employee</h1>
                    <button type="button" class="btn-close no-loading" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('employee.store') }}" method="POST">
                        @csrf
                        <!-- Row 1: Staff ID and Employee Type -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="staffId" class="form-label">Staff ID</label>
                                <input type="text" class="form-control" id="staffId" name="staffId"
                                    placeholder="Enter staff ID">
                            </div>
                            <div class="col-md-6">
                                <label for="employeeType" class="form-label">Employee Type</label>
                                <select class="form-control" name="employeeType" id="employeeType">
                                    <option selected disabled>Select employee type</option>
                                    <option value="National">National</option>
                                    <option value="Expat">Expat</option>
                                </select>
                            </div>
                        </div>

                        <!-- Row 2: First Name and Last Name -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                    placeholder="Employee's first name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                    placeholder="Employee's last name" required>
                            </div>
                        </div>

                        <!-- Row 3: Birth Date and Job Title -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="birthDate" class="form-label">Birth Date</label>
                                <input type="date" class="form-control" id="birthDate" name="birthDate">
                            </div>
                            <div class="col-md-6">
                                <label for="jobTitle" class="form-label">Job Title</label>
                                <input type="text" class="form-control" id="jobTitle" name="jobTitle"
                                    placeholder="Job title" required>
                            </div>
                        </div>

                        <!-- Row 4: Company and Department -->
                        <div class="custom-select-container">
                            <!-- Champ de sélection avec recherche pour le département -->
                            <label for="departmentSearch">Select Department:</label>
                            <div class="custom-select">
                                <input type="text" id="departmentSearch" class="form-control"
                                    placeholder="Search for a department..." onkeyup="filterDepartments()">
                                <div class="select-items" id="departmentItems">
                                    <div class="select-option" onclick="selectDepartment('')">None</div>
                                    @foreach ($departments as $department)
                                        <div class="select-option" onclick="selectDepartment('{{ $department->id }}')">
                                            {{ $department->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <input type="hidden" name="department_id" id="department_id" value="">
                        </div>

                        <div class="custom-select-container">
                            <!-- Champ de sélection avec recherche pour la compagnie -->
                            <label for="companySearch">Select Company:</label>
                            <div class="custom-select">
                                <input type="text" id="companySearch" class="form-control"
                                    placeholder="Search for a company..." onkeyup="filterCompanies()">
                                <div class="select-items" id="companyItems">
                                    <div class="select-option" onclick="selectCompany('')">None</div>
                                    @foreach ($companys as $company)
                                        <div class="select-option" onclick="selectCompany('{{ $company->id }}')">
                                            {{ $company->name }}</div>
                                    @endforeach
                                </div>
                            </div>
                            <input type="hidden" name="company_id" id="company_id" value="">
                        </div>


                        <!-- Modal buttons -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary no-loading">
                                <i class="fas fa-save me-1"></i> Save
                            </button>
                            <button type="button" class="btn btn-secondary no-loading" data-bs-dismiss="modal">
                                <i class="fas fa-times me-1"></i> Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        document.getElementById('departmentSearch').addEventListener('click', function() {
            document.getElementById('departmentItems').style.display = 'block';
        });

        document.getElementById('companySearch').addEventListener('click', function() {
            document.getElementById('companyItems').style.display = 'block';
        });

       
        window.addEventListener('click', function(e) {
            if (!e.target.matches('.form-control')) {
                document.querySelectorAll('.select-items').forEach(function(select) {
                    select.style.display = 'none';
                });
            }
        });

   
        function filterDepartments() {
            let input = document.getElementById('departmentSearch').value.toLowerCase();
            let options = document.querySelectorAll('#departmentItems .select-option');

            options.forEach(function(option) {
                if (option.textContent.toLowerCase().includes(input)) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });
        }

        /
        function filterCompanies() {
            let input = document.getElementById('companySearch').value.toLowerCase();
            let options = document.querySelectorAll('#companyItems .select-option');

            options.forEach(function(option) {
                if (option.textContent.toLowerCase().includes(input)) {
                    option.style.display = '';
                } else {
                    option.style.display = 'none';
                }
            });
        }

        // 
        function selectDepartment(value) {
            let departmentInput = document.getElementById('department_id');
            let departmentSearch = document.getElementById('departmentSearch');
            departmentInput.value = value;
            departmentSearch.value = document.querySelector(
                `#departmentItems .select-option[onclick="selectDepartment('${value}')"]`).textContent;
            document.getElementById('departmentItems').style.display = 'none';
        }

        // 
        function selectCompany(value) {
            let companyInput = document.getElementById('company_id');
            let companySearch = document.getElementById('companySearch');
            companyInput.value = value;
            companySearch.value = document.querySelector(
                `#companyItems .select-option[onclick="selectCompany('${value}')"]`).textContent;
            document.getElementById('companyItems').style.display = 'none';
        }
    </script>
@endsection
