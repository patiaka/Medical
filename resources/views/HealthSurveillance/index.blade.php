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
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus me-1" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 1a.5.5 0 0 1 .5.5V7h5.5a.5.5 0 0 1 0 1H8V14.5a.5.5 0 0 1-1 0V8H1.5a.5.5 0 0 1 0-1H7V1.5A.5.5 0 0 1 7.5 1z" />
                        </svg>
                        Add Health Surveillance
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
                                <th>Employee Name</th>
                                <th>Surveillance Type</th>
                                <th>Hazards</th>
                                <th>ECG</th>
                                <th>Spirometry</th>
                                <th>Audiometry</th>
                                <th>General</th>
                                <th>Follow Up</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($healthSurveillance as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->surveillanceType }}</td>
                                <td>{{ $row->occupation }}</td>
                                <td>{{ $row->hazards }}</td>
                                <td>{{ $row->ecg }}</td>
                                <td>{{ $row->spirometry }}</td>
                                <td>{{ $row->audiometry }}</td>
                                <td>{{ $row->general }}</td>
                                <td>{{ $row->followUp }}</td>
                                <td>
                                    <a class="btn-sm app-btn-secondary"
                                        href="{{ route('heathSurveillance.edit', $row->id) }}">
                                        <i class="fa fa-edit fa-lg text-success"></i>
                                    </a>
                                    <a role="button" href="#"
                                        onclick="deleteConfirmation('{{ route('heathSurveillance.destroy', $row->id) }}')"
                                        class="btn-sm app-btn-danger">
                                        <i class="fa fa-trash fa-lg text-danger"></i>
                                    </a>
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