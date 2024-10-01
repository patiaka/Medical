@extends('layouts.app')

@section('content')
    <style>
        .bg-checkup {
            background-color: #e3f2fd;
        }

        .bg-preemployment {
            background-color: #fff3e0;
        }

        .bg-postemployment {
            background-color: #e8f5e9;
        }

        .bg-leave {
            background-color: #fce4ec;
        }

        .icon-checkup {
            color: #2196f3;
        }

        .icon-preemployment {
            color: #ff9800;
        }

        .icon-postemployment {
            color: #4caf50;
        }

        .icon-leave {
            color: #e91e63;
        }

        /* Style pour le bouton d'action et le menu déroulant */
        .action-btn-container {
            position: relative;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 1.5rem;
            color: #fff;
            background-color: #007bff;
            text-align: center;
            cursor: pointer;
            border: none;
        }

        .action-btn:hover {
            opacity: 0.8;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            width: 200px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            border-radius: 4px;
            z-index: 1000;
            /* Assurez-vous que le menu est au-dessus des autres éléments */
        }

        .dropdown-menu a {
            display: block;
            padding: 8px 12px;
            color: #000;
            text-decoration: none;
            border-radius: 4px;
        }

        .dropdown-menu a:hover {
            background-color: #f8f9fa;
        }
    </style>

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Medical Check Up</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <a class="btn btn-secondary" href="{{ route('healthSurveillance.create') }}""
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

    <div class="row mb-4">
        <!-- Total Check Up -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-checkup d-flex justify-content-between align-items-center">
                    <i class="fas fa-notes-medical fa-3x icon-checkup"></i>
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
                <div class="card-body bg-preemployment d-flex justify-content-between align-items-center">
                    <i class="fas fa-user-tie fa-3x icon-preemployment"></i>
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
                <div class="card-body bg-postemployment d-flex justify-content-between align-items-center">
                    <i class="fas fa-briefcase-medical fa-3x icon-postemployment"></i>
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
                <div class="card-body bg-leave d-flex justify-content-between align-items-center">
                    <i class="fas fa-plane-departure fa-3x icon-leave"></i>
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
            <button class="nav-link active no-loading" id="all-tab" data-bs-toggle="tab"
                data-bs-target="#health-surveillance-all" type="button" role="tab"
                aria-controls="health-surveillance-all" aria-selected="true">All</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link no-loading" id="pre-employment-tab" data-bs-toggle="tab"
                data-bs-target="#pre-employment" type="button" role="tab" aria-controls="pre-employment"
                aria-selected="false">Pre Employment</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link no-loading" id="post-employment-tab" data-bs-toggle="tab"
                data-bs-target="#post-employment" type="button" role="tab" aria-controls="post-employment"
                aria-selected="false">Post Employment</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link no-loading" id="annual-leave-tab" data-bs-toggle="tab" data-bs-target="#annual-leave"
                type="button" role="tab" aria-controls="annual-leave" aria-selected="false">Annual Leave</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach (['health-surveillance-all' => $healthSurveillance, 'pre-employment' => $preEmployment, 'post-employment' => $postEmployment, 'annual-leave' => $annualLeave] as $tabId => $data)
            <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}" id="{{ $tabId }}" role="tabpanel"
                aria-labelledby="{{ $tabId }}-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table class="table app-table-hover mb-0 text-left myTable" id="myTable" style="width:100%">
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
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $row->id }}</td>
                                            <td>{{ $row->employee->employeeNumber }}</td>
                                            <td>{{ $row->employee->firstName }} {{ $row->employee->lastName }}</td>
                                            <td>{{ $row->surveillanceType }}</td>
                                            <td>{{ $row->employee->company->name }}</td>
                                            <td>{{ $row->employee->department->name }}</td>
                                            <td>
                                                <div class="action-btn-container">
                                                    <!-- Bouton d'action -->
                                                    <button class="action-btn no-loading" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-cog"></i>
                                                    </button>
                                                    <!-- Menu déroulant -->
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item no-loading"
                                                                href="{{ route('healthSurveillance.edit', $row->id) }}">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </a></li>
                                                        <li><a class="dropdown-item no-loading"
                                                                href="{{ route('healthSurveillance.show', $row->id) }}">
                                                                <i class="fa fa-eye"></i> View
                                                            </a></li>
                                                        @can('delete-health', $row)
                                                            <li><a class="dropdown-item no-loading" href="#"
                                                                    onclick="deleteConfirmation('{{ route('healthSurveillance.destroy', $row->id) }}')">
                                                                    <i class="fa fa-trash"></i> Delete
                                                                </a></li>
                                                        @endcan
                                                    </ul>
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
        @endforeach
    </div>
@endsection
