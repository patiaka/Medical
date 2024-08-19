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
        <!-- Total Consultations -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-consultation d-flex justify-content-between align-items-center">
                    <i class="fas fa-stethoscope fa-3x icon-consultation"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $consultationCount }}</h3>
                        <span>Total Consultations</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href="{{ route('consultation.index') }}"></a>
            </div>
        </div>

        <!-- Consultations by Department -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-day d-flex justify-content-between align-items-center">
                    <i class="fas fa-calendar-day fa-3x icon-day"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $consultationsByDay }}</h3>
                        <span>Consultations by Day</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href=""></a>
            </div>
        </div>

        {{-- <!-- Consultations by Week -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-week d-flex justify-content-between align-items-center">
                    <i class="fas fa-calendar-week fa-3x icon-week"></i>
                    <div class="dash-widget-info text-end">
                        <h3></h3>
                        <span>Consultations by Week</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href=""></a>
            </div>
        </div> --}}

        <!-- Consultations by Month -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-month d-flex justify-content-between align-items-center">
                    <i class="fas fa-calendar-alt fa-3x icon-month"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $consultationsByMonth }}</h3>
                        <span>Consultations by Month</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href=""></a>
            </div>
        </div>

        <!-- Consultations by Year -->
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-year d-flex justify-content-between align-items-center">
                    <i class="fas fa-calendar fa-3x icon-year"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $consultationsByYear }}</h3>
                        <span>Consultations by Year</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href=""></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
