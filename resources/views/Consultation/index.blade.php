@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Consultation</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
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
=======
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Consultation</h1>
        </div>
        
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <a class="btn btn-secondary" href="{{ route('consultation.create') }}">
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
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mb-4">
            <div class="stats-info p-3 bg-primary text-white rounded">
                <h6>Total Consultation</h6>
                <h4>12 <span>this month</span></h4>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mb-4">
            <div class="stats-info p-3 bg-success text-white rounded">
                <h6>Overtime Hours</h6>
                <h4>118 <span>this month</span></h4>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mb-4">
            <div class="stats-info p-3 bg-warning text-white rounded">
                <h6>Pending Request</h6>
                <h4>23</h4>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3 mb-4">
            <div class="stats-info p-3 bg-danger text-white rounded">
                <h6>Rejected</h6>
                <h4>5</h4>
            </div>
        </div>
    </div>

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Staff id</th>
                                    <th>Employee Number</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Job Title</th>
                                    <th>Consultation Date</th>
                                    <th>Company</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($consultations as $consultation)
                                    <tr>
                                        <td>{{ $consultation->id }}</td>
                                        <td><span class="truncate">{{ $consultation->employee->staffId }}</span></td>
                                        <td>{{ $consultation->employee->employeeNumber }}</td>
                                        <td>{{ $consultation->employee->firstName }}</td>
                                        <td>{{ $consultation->employee->lastName }}</td>
                                        <td>{{ $consultation->employee->jobTitle }}</td>
                                        <td>{{ $consultation->created_at }}</td>
                                        <td>{{ $consultation->employee->company->name }}</td>
                                        <td>{{ $consultation->employee->department->name }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a class="btn-sm app-btn-secondary"
                                                    href="{{ route('consultation.edit', $consultation->id) }}">
                                                    <i class="fa fa-edit fa-lg text-success"></i>
                                                </a>
                                                <a role="button"
                                                    href="{{ route('consultation.show', $consultation->id) }}"
                                                    class="btn-sm app-btn-danger ms-2">
                                                    <i class="fa fa-eye fa-lg text-danger"></i>
                                                </a>
                                                <a role="button"
                                                    onclick="deleteConfirmation('{{ route('consultation.delete', $consultation->id) }}')"
                                                    class="btn-sm app-btn-danger ms-2">
                                                    <i class="fa fa-trash fa-lg text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">There are no entries for consultation</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
>>>>>>> 9427f0d665f7e8d13ddc57ab4e28b78461f03a3d
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Staff id</th>
                                    <th>Employee Number</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Job Title</th>
                                    <th>Consultation Date</th>
                                    <th>Company</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($consultations as $consultation)
                                <tr>
                                    <td>{{ $consultation->id }}</td>
                                    <td><span class="truncate">{{ $consultation->employee->staffId }}</span></td>
                                    <td>{{ $consultation->employee->employeeNumber }}</td>
                                    <td>{{ $consultation->employee->firstName }}</td>
                                    <td>{{ $consultation->employee->lastName }}</td>
                                    <td>{{ $consultation->employee->jobTitle }}</td>
                                    <td>{{ $consultation->created_at }}</td>
                                    <td>{{ $consultation->employee->company->name }}</td>
                                    <td>{{ $consultation->employee->department->name }}</td>
                                    <td>
                                        <div class="d-flex">
                                            @can('update-consultation',$consultation)
                                            <a class="btn-sm app-btn-secondary"
                                                href="{{ route('consultation.edit', $consultation->id) }}">
                                                <i class="fa fa-edit fa-lg text-success"></i>
                                            </a>
                                            @endcan
                                            <a role="button" href="{{ route('consultation.show', $consultation->id) }}"
                                                class="btn-sm app-btn-danger ms-2">
                                                <i class="fa fa-eye fa-lg text-danger"></i>
                                            </a>
                                            <a role="button"
                                                onclick="deleteConfirmation('{{ route('consultation.delete', $consultation->id) }}')"
                                                class="btn-sm app-btn-danger ms-2">
                                                <i class="fa fa-trash fa-lg text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10">There are no entries for consultation</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
=======
@endsection

<style>
    .stats-info {
        text-align: center;
    }
    .stats-info h6 {
        margin-bottom: 0.5rem;
    }
</style>
>>>>>>> 9427f0d665f7e8d13ddc57ab4e28b78461f03a3d
