@extends('layouts.app')

@section('content')
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
                                            <td><span class="truncate">{{ $consultation->employee->staffId }}</span>
                                            </td>
                                            <td>{{ $consultation->employee->employeeNumber }}</td>
                                            <td>{{ $consultation->employee->firstName }}</td>
                                            <td>{{ $consultation->employee->lastName }}</td>
                                            <td>{{ $consultation->employee->jobTitle }}</td>
                                            <td>{{ $consultation->created_at }}</td>
                                            <td>{{ $consultation->employee->company->name }}</td>
                                            <td>{{ $consultation->employee->department->name }}
                                            </td>

                                            <td>
                                                <div style="display: flex;">
                                                    <a class="btn-sm app-btn-secondary"
                                                        href="{{ route('consultation.edit', $consultation->id) }}">
                                                        <i class="fa fa-edit fa-lg text-success"></i>
                                                    </a>
                                                    <a role="button"
                                                        href="{{ route('consultation.show', $consultation->id) }}"
                                                        class="btn-sm app-btn-danger" style="margin-left: 10px;">
                                                        <i class="fa fa-eye fa-lg text-danger"></i>
                                                    </a>
                                                    <a role="button"
                                                        onclick="deleteConfirmation('{{ route('consultation.delete', $consultation->id) }}')"
                                                        class="btn-sm app-btn-danger" style="margin-left: 10px;">
                                                        <i class="fa fa-trash fa-lg text-danger"></i>
                                                    </a>
                                                </div>
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

            </div>
            <!--//tab-pane-->
        </div>
    </div>
@endsection
