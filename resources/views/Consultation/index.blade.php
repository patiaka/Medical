@extends('layouts.app')

@section('content')
    <style>
        .bg-consultation {
            background-color: #e3f2fd;
        }

        .bg-day {
            background-color: #c8e6c9;
        }

        .bg-month {
            background-color: #ffe0b2;
        }

        .bg-year {
            background-color: #ffccbc;
        }

        /* Icon Colors */
        .icon-consultation {
            color: #1976d2;
            /* Dark blue */
        }

        .icon-day {
            color: #388e3c;
            /* Green */
        }

        .icon-month {
            color: #f57c00;
            /* Orange */
        }

        .icon-year {
            color: #d32f2f;
            /* Red */
        }

        /* Style for action menu */
        .action-menu {
            display: none;
            position: absolute;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            min-width: 150px;
            right: 0;
        }

        .action-menu a {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            text-decoration: none;
            color: #333;
        }

        .action-menu a:hover {
            background-color: #f8f9fa;
        }

        .action-menu i {
            font-size: 1.25rem;
            margin-right: 8px;
        }

        .action-btn {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            font-size: 1.5rem;
            color: #333;
        }

        .action-btn:hover {
            color: #007bff;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-toggle:focus {
            outline: none;
        }
    </style>

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-12 col-md-8">
            <h1 class="app-page-title mb-0">Consultation</h1>
        </div>

        <div class="col-12 col-md-4 d-flex justify-content-end">
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

    <!-- Statistics Containers -->
    <div class="row mb-4">
        <!-- Total Consultations -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
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

        <!-- Consultations by Day -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
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

        <!-- Consultations by Month -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
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
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
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

    <!-- Add margin here -->
    <div class="mb-4"></div>

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
                                            <div class="dropdown">
                                                <button class="action-btn no-loading" type="button" id="actionMenuButton{{ $consultation->id }}" aria-expanded="false">
                                                    <i class="fas fa-cog"></i>
                                                </button>
                                                <div class="action-menu" aria-labelledby="actionMenuButton{{ $consultation->id }}">
                                                    <a class="dropdown-item no-loading" href="{{ route('consultation.edit', $consultation->id) }}">
                                                        <i class="fa fa-edit text-success"></i> Edit
                                                    </a>
                                                    <a class="dropdown-item no-loading" href="{{ route('consultation.show', $consultation->id) }}">
                                                        <i class="fa fa-eye text-primary"></i> View
                                                    </a>
                                                    <a class="dropdown-item no-loading" onclick="deleteConfirmation('{{ route('consultation.delete', $consultation->id) }}')">
                                                        <i class="fa fa-trash text-danger"></i> Delete
                                                    </a>
                                                </div>
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
    <script>
        document.querySelectorAll('.action-btn').forEach(button => {
            button.addEventListener('click', function() {
                const menu = this.nextElementSibling;
                const isVisible = menu.style.display === 'block';
                
                // Hide all other menus
                document.querySelectorAll('.action-menu').forEach(m => m.style.display = 'none');
                
                // Toggle visibility of the clicked menu
                menu.style.display = isVisible ? 'none' : 'block';
            });
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown')) {
                document.querySelectorAll('.action-menu').forEach(menu => {
                    menu.style.display = 'none';
                });
            }
        });
    </script>
@endsection
