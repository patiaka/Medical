@extends('layouts.app')

@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Medical Check up</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <a class="btn btn-primary" href="{{ route('healthSurveillance.create') }}"
                            data-bs-target="#addHealthSurveillanceModal">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus me-1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 1a.5.5 0 0 1 .5.5V7h5.5a.5.5 0 0 1 0 1H8V14.5a.5.5 0 0 1-1 0V8H1.5a.5.5 0 0 1 0-1H7V1.5A.5.5 0 0 1 7.5 1z" />
                            </svg>
                            New 
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

    <div class="tab-content" id="health-surveillance-table-tab-content">
        <div class="tab-pane fade show active" id="health-surveillance-all" role="tabpanel"
            aria-labelledby="health-surveillance-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient ID</th>
                                    <th>Employee Name</th>
                                    <th>Surveillance Type</th>
                                    <th>Company</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($healthSurveillance as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->employee->employeeNumber }}</td>
                                        <td>{{ $row->employee->firstName }} {{ $row->employee->lastName }}</td>
                                        <td>{{ $row->surveillanceType }}</td>
                                        <td>{{ $row->employee->company->name }}</td>
                                        <td>{{ $row->employee->department->name }}</td>
                                        <td>
                                            <div style="display: flex;">
                                                <a class="btn-sm app-btn-secondary"
                                                    href="{{ route('healthSurveillance.edit', $row->id) }}">
                                                    <i class="fa fa-edit fa-lg text-success"></i>
                                                </a>
                                                <a role="button" href="{{ route('healthSurveillance.show', $row->id) }}"
                                                    class="btn-sm app-btn-danger" style="margin-left: 10px;">
                                                    <i class="fa fa-eye fa-lg text-danger"></i>
                                                </a>
                                                <a role="button" href="#"
                                                    onclick="deleteConfirmation('{{ route('healthSurveillance.destroy', $row->id) }}')"
                                                    class="btn-sm app-btn-danger">
                                                    <i class="fa fa-trash fa-lg text-danger"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
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
@endsection
