@extends('layouts.app')
@section('content')
<div class="row g-3 mb-4 align-items-center justify-content-between">
    <div class="col-auto">
        <h1 class="app-page-title mb-0">Consultation</h1>
    </div>
    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                <div class="col-auto">
                    <form class="table-search-form row gx-1 align-items-center">
                        <div class="col-auto">
                            <input type="text" id="search-orders" name="searchorders" class="form-control search-orders"
                                placeholder="Search">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn app-btn-secondary">Search</button>
                        </div>
                    </form>

                </div>
                <!--//col-->
                <div class="col-auto">

                    <select class="form-select w-auto">
                        <option selected value="option-1">All</option>
                        <option value="option-2">This week</option>
                        <option value="option-3">This month</option>
                        <option value="option-4">Last 3 months</option>

                    </select>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary" href="{{ route('consultation.create') }}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path fill-rule="evenodd"
                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                        </svg>
                        New Consultation
                    </a>
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
                                <th>Staff id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Job Title</th>
                                <th>Consulation Date</th>
                                <th>Company</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($consultations as $consultation)
                            <tr>
                                <td>{{ $consultation->id }}</td>
                                <td><span class="truncate">{{ $consultation->employee->staffId }}</span>
                                </td>
                                <td>{{ $consultation->employee->firstName }}</td>
                                <td>{{ $consultation->employee->lastName }}</td>
                                <td>{{ $consultation->employee->jobTitle }}</td>
                                <td>{{ $consultation->created_at }}</td>
                                <td>{{ $consultation->employee->company }}</td>
                                <td>{{ $consultation->employee->department->name }}
                                </td>

                                <td>
                                    <a class="btn-sm app-btn-secondary"
                                        href="{{ route('consultation.edit', $consultation->id) }}">
                                        <i class="fa fa-edit fa-2x text-success"></i>
                                    </a>
                                    <a role="button" href="#"
                                        onclick="deleteConfirmation('{{ route('consultation.show', $consultation->id) }}')"
                                        class="btn-sm app-btn-danger">
                                        <i class="fa fa-eye fa-2x text-danger"></i>
                                    </a>
                                    <a role="button" href="#"
                                        onclick="deleteConfirmation('{{ route('consultation.delete', $consultation->id) }}')"
                                        class="btn-sm app-btn-danger">
                                        <i class="fa fa-trash fa-2x text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">There is no entries for consultation</td>
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
        <nav class="app-pagination">
            <div class="justify-content-center">
                {{ $consultations->links() }}
            </div>
        </nav>
        <!--//app-pagination-->

    </div>
    <!--//tab-pane-->
</div>
<!--//tab-content-->
<!-- Button trigger modal -->


<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">New Consultation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('consultation.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <!-- Staff ID -->
                    <div class="mb-3">
                        <label for="staffId" class="form-label">Staff ID</label>
                        <input type="text" class="form-control" id="staffId" name="staffId" value="">
                    </div>
                    <!-- First Name and Last Name -->
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
                                        placeholder="employee last Name" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Birth Date -->
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="birthDate" name="birthDate" value="">
                    </div>
                    <!-- Job Title -->
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="jobTitle" name="jobTitle"
                            placeholder="employee job Title" value="" required>
                    </div>
                    <!-- Company -->
                    <div class="mb-3">
                        <label for="company" class="form-label">Company</label>
                        <select class="form-control" name="company" id="company">
                            <option value=""></option>
                            {{-- @foreach ($companys as $company)
                            <option value="{{ $company }}">{{ $company }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <!-- Department -->
                    <div class="mb-3">
                        <label for="department_id" class="form-label">Department</label>
                        <select class="form-control" name="department_id" id="department_id">
                            <option value=""></option>
                            {{-- @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach --}}
                        </select>
                        @error('department_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- Date Consultation -->
                    <div class="mb-3">
                        <label for="consultationDate" class="form-label">Consultation Date</label>
                        <input type="date" class="form-control" id="consultationDate" name="consultationDate" value="">
                    </div>
                    <!-- Expatriate/National -->
                    <div class="mb-3">
                        <label for="expatNational" class="form-label">Expatriate/National</label>
                        <select class="form-control" name="expatNational" id="expatNational">
                            <option value="Expatriate">Expatriate</option>
                            <option value="National">National</option>
                        </select>
                    </div>
                    <!-- Staff Family -->
                    <div class="mb-3">
                        <label for="staffFamily" class="form-label">Staff Family</label>
                        <select class="form-control" name="staffFamily" id="staffFamily">
                            <option value=""></option>

                        </select>
                    </div>
                    <!-- Injury -->
                    <div class="mb-3">
                        <label for="injury" class="form-label">Injury</label>
                        <select class="form-control" name="injury" id="injury">
                            <option value=""></option>
                            }
                        </select>
                    </div>
                    <!-- Referral -->
                    <div class="mb-3">
                        <label for="referral" class="form-label">Referral</label>
                        <select class="form-control" name="referral" id="referral">
                            <option value=""></option>
                        </select>
                    </div>
                    <!-- Diagnosis -->
                    <div class="mb-3">
                        <label for="diagnosis" class="form-label">Diagnosis</label>
                        <select class="form-control" name="diagnosis" id="diagnosis">
                            <option value=""></option>

                        </select>
                    </div>
                    <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection