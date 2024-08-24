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
                        <a class="btn btn-secondary" href="{{ route('healthSurveillance.create') }}"
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
            </div>
        </div>
    </div>
    
    <!-- Ajout d'une marge inférieure au conteneur des statistiques -->
    <div class="row mb-4">
        <!-- Total Check Up -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-consultation d-flex justify-content-between align-items-center">
                    <i class="fas fa-notes-medical fa-3x icon-consultation"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $allSurveillance }}</h3>
                        <span>Total Check Up</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href="{{ route('consultation.index') }}"></a>
            </div>
        </div>
    
        <!-- Total Pre Employment -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-consultation d-flex justify-content-between align-items-center">
                    <i class="fas fa-user-tie fa-3x icon-consultation"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $preEmploymentCount }}</h3>
                        <span>Total Pre Employment</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href="{{ route('consultation.index') }}"></a>
            </div>
        </div>
    
        <!-- Total Post Employment -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-day d-flex justify-content-between align-items-center">
                    <i class="fas fa-briefcase-medical fa-3x icon-day"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $postEmploymentCount }}</h3>
                        <span>Total Post Employment</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href=""></a>
            </div>
        </div>
    
        <!-- Total Leave -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-month d-flex justify-content-between align-items-center">
                    <i class="fas fa-plane-departure fa-3x icon-month"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $annualLeaveCount }}</h3>
                        <span>Total Annual Leave</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href=""></a>
            </div>
        </div>
    </div>
    

    <!-- Onglets -->
    <ul class="nav nav-tabs orders-table-tab app-nav-tabs nav shadow-sm flex-column flex-sm-row mb-4" id="myTab"
        role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#health-surveillance-all"
                type="button" role="tab" aria-controls="health-surveillance-all" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pre-employment-tab" data-bs-toggle="tab" data-bs-target="#pre-employment"
                type="button" role="tab" aria-controls="pre-employment" aria-selected="false">Pre Employment</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="post-employment-tab" data-bs-toggle="tab" data-bs-target="#post-employment"
                type="button" role="tab" aria-controls="post-employment" aria-selected="false">Post Employment</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="annual-leave-tab" data-bs-toggle="tab" data-bs-target="#annual-leave"
                type="button" role="tab" aria-controls="annual-leave" aria-selected="false">Annual Leave</button>
        </li>

    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="health-surveillance-all" role="tabpanel" aria-labelledby="all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left myTable" id="" style="width:100%">
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
                                                @can('delete-health', $row)
                                                    <a role="button" href="#"
                                                        onclick="deleteConfirmation('{{ route('healthSurveillance.destroy', $row->id) }}')"
                                                        class="btn-sm app-btn-danger">
                                                        <i class="fa fa-trash fa-lg text-danger"></i>
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pre-employment" role="tabpanel" aria-labelledby="pre-employment-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left myTable" id="" style="width:100%">
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
                                @foreach ($preEmployment as $row)
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
                                                @can('delete-health', $row)
                                                    <a role="button" href="#"
                                                        onclick="deleteConfirmation('{{ route('healthSurveillance.destroy', $row->id) }}')"
                                                        class="btn-sm app-btn-danger">
                                                        <i class="fa fa-trash fa-lg text-danger"></i>
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="post-employment" role="tabpanel" aria-labelledby="post-employment-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left myTable" id="" style="width:100%">
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
                                @foreach ($postEmployment as $row)
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
                                                @can('delete-health', $row)
                                                    <a role="button" href="#"
                                                        onclick="deleteConfirmation('{{ route('healthSurveillance.destroy', $row->id) }}')"
                                                        class="btn-sm app-btn-danger">
                                                        <i class="fa fa-trash fa-lg text-danger"></i>
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="annual-leave" role="tabpanel" aria-labelledby="annual-leave-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left myTable" id="" style="width:100%">
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
                                @foreach ($annualLeave as $row)
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
                                                @can('delete-health', $row)
                                                    <a role="button" href="#"
                                                        onclick="deleteConfirmation('{{ route('healthSurveillance.destroy', $row->id) }}')"
                                                        class="btn-sm app-btn-danger">
                                                        <i class="fa fa-trash fa-lg text-danger"></i>
                                                    </a>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
