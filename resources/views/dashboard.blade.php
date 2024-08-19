@extends('layouts.app')

@section('content')
    <style>
        .card-body {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }

        .bg-doctor {
            background-color: #e3f2fd;
        }

        .bg-consultation {
            background-color: #e3f2fd;
        }

        .bg-patient {
            background-color: #e1f5fe;
        }

        .bg-department {
            background-color: #e8f5e9;
        }

        .icon-doctor {
            color: #2196f3;
        }

        .icon-consultation {
            color: #f44336;
        }

        .icon-patient {
            color: #03a9f4;
        }

        .icon-department {
            color: #4caf50;
        }
    </style>

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Welcome {{ auth()->user()->name }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-doctor d-flex justify-content-between align-items-center">
                    <i class="fas fa-user-md fa-3x icon-doctor"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $totalDoctor }}</h3>
                        <span>Doctors</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href="{{ route('user.index') }}"></a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-consultation d-flex justify-content-between align-items-center">
                    <i class="fas fa-stethoscope fa-3x icon-consultation"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $totalConsultation }}</h3>
                        <span>Consultation</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href="{{ route('consultation.index') }}"></a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-patient d-flex justify-content-between align-items-center">
                    <i class="fas fa-user-friends fa-3x icon-patient"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $totalEmployee }}</h3>
                        <span>Patients</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href="{{ route('employee.index') }}"></a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body bg-department d-flex justify-content-between align-items-center">
                    <i class="fas fa-hospital fa-3x icon-department"></i>
                    <div class="dash-widget-info text-end">
                        <h3>{{ $totalDepartment }}</h3>
                        <span>Departments</span>
                    </div>
                </div>
                <a class="app-card-link-mask" href="{{ route('department.index') }}"></a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <!-- Consultations by Day Chart -->
        <div class="col-md-12 col-lg-8">
            <div class="card dash-widget">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="stats-type">Consultations by Day</h4>
                        <form method="GET" action="{{ route('dashboard') }}">
                            <select name="filter" onchange="this.form.submit()">
                                <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>All</option>
                                <option value="last_24h" {{ $filter === 'last_24h' ? 'selected' : '' }}>Last 24 Hours
                                </option>
                                <option value="week" {{ $filter === 'week' ? 'selected' : '' }}>This Week</option>
                                <option value="month" {{ $filter === 'month' ? 'selected' : '' }}>This Month</option>
                                <option value="year" {{ $filter === 'year' ? 'selected' : '' }}>This Year</option>
                            </select>
                            <input type="hidden" name="filter_diagnosis" value="{{ $filterDiagnosis }}">
                        </form>
                        <button id="exportConsultations" class="btn btn-outline-primary">
                            <i class="fas fa-file-export"></i>
                        </button>
                    </div>
                    <div id="loadingIconConsultation" class="d-none d-flex justify-content-center align-items-center">
                        <i class="fas fa-spinner fa-pulse" style="font-size: 2rem;"></i>
                    </div>
                    <hr>
                    <canvas id="consultationChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Diagnoses Chart -->
        <div class="col-md-12 col-lg-4">
            <div class="card dash-widget">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="stats-type">Diagnoses Statistics</h4>
                        <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select me-2" id="filterSelectDiagnosis" name="filterSelectDiagnosis"
                                onchange="this.form.submit()">
                                <option value="all" {{ $filterDiagnosis === 'all' ? 'selected' : '' }}>All</option>
                                <option value="top_5" {{ $filterDiagnosis === 'top_5' ? 'selected' : '' }}>Top 5</option>
                                <option value="last_24h" {{ $filterDiagnosis === 'last_24h' ? 'selected' : '' }}>Last 24
                                    hours</option>
                                <option value="week" {{ $filterDiagnosis === 'week' ? 'selected' : '' }}>Last Week
                                </option>
                                <option value="month" {{ $filterDiagnosis === 'month' ? 'selected' : '' }}>Last Month
                                </option>
                                <option value="year" {{ $filterDiagnosis === 'year' ? 'selected' : '' }}>Last Year
                                </option>
                            </select>
                        </form>
                        <button id="exportDiagnoses" class="btn btn-outline-primary">
                            <i class="fas fa-file-export"></i>
                        </button>
                    </div>
                    <canvas id="diagnosesChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row mt-5">
        <!-- Consultations by Company Table -->
        <div class="col-md-6">
            <div class="card dash-widget">
                <div class="card-body">
                    <h4 class="stats-type mb-4">Consultations by Company</h4>
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left" id="companyTable">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Number of Consultations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultationsByCompany as $company)
                                    <tr>
                                        <td>{{ $company->company }}</td>
                                        <td>{{ $company->count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Consultations by Department Table -->
        <div class="col-md-6">
            <div class="card dash-widget">
                <div class="card-body">
                    <h4 class="stats-type mb-4">Consultations by Department</h4>
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left" id="departmentTable">
                            <thead>
                                <tr>
                                    <th>Department</th>
                                    <th>Number of Consultations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consultationsByDepartment as $department)
                                    <tr>
                                        <td>{{ $department->department }}</td>
                                        <td>{{ $department->count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}

    <!-- Script for the charts and export functionality -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctxConsultation = document.getElementById('consultationChart').getContext('2d');
            // Consultation Chart
            var consultationDates = {!! json_encode($consultationsByDay->pluck('period')) !!};
            var consultationCounts = {!! json_encode($consultationsByDay->pluck('count')) !!};

            // Function to format dates based on filter
            function formatDate(dateStr, filter) {
                var date = new Date(dateStr);
                var options = {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                };

                if (filter === 'month' || filter === 'year' || filter === 'all') {
                    // Format as Month Year (e.g., "Aug 2024")
                    return date.toLocaleDateString('en-US', {
                        month: 'short',
                        year: 'numeric'
                    });
                } else {
                    // Format as Day/Month/Year (e.g., "17/08/2024")
                    return date.toLocaleDateString('en-GB', {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    });
                }
            }

            var formattedDates = consultationDates.map(date => formatDate(date, '{{ $filter }}'));

            // Create the chart
            var consultationChart = new Chart(ctxConsultation, {
                type: 'bar',
                data: {
                    labels: formattedDates,
                    datasets: [{
                        label: 'Consultations',
                        data: consultationCounts,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: '{{ $filter === 'month' || $filter === 'year' || $filter === 'all' ? 'Month' : 'Date' }}'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Number of Consultations'
                            }
                        }
                    }
                }
            });

            // Diagnoses Chart
            // Diagnoses Chart
            var ctxDiagnoses = document.getElementById('diagnosesChart').getContext('2d');
            var diagnosesLabels = {!! json_encode($diagnosesStats->pluck('label')) !!};
            var diagnosesCounts = {!! json_encode($diagnosesStats->pluck('count')) !!};

            // Define custom colors for the chart segments
            var colors = [
                'rgba(100, 149, 237, 0.7)', // Cornflower Blue
                'rgba(60, 179, 113, 0.7)', // Medium Sea Green
                'rgba(255, 165, 0, 0.7)', // Orange
                'rgba(240, 128, 128, 0.7)', // Light Coral
                'rgba(255, 192, 203, 0.7)', // Pink
                'rgba(144, 238, 144, 0.7)', // Light Green
                'rgba(135, 206, 250, 0.7)', // Light Sky Blue
                'rgba(255, 222, 173, 0.7)', // Navajo White
                'rgba(221, 160, 221, 0.7)', // Plum
                'rgba(224, 255, 255, 0.7)', // Light Cyan
                'rgba(255, 240, 245, 0.7)', // Lavender Blush
                'rgba(255, 228, 225, 0.7)' // Misty Rose
            ];





            // Assign border colors
            var borderColors = [
                'rgba(82, 134, 202, 1)', // Darker Cornflower Blue
                'rgba(34, 139, 34, 1)', // Darker Medium Sea Green
                'rgba(255, 140, 0, 1)', // Darker Orange
                'rgba(205, 92, 92, 1)', // Darker Light Coral
                'rgba(255, 105, 180, 1)', // Darker Pink
                'rgba(0, 128, 0, 1)', // Darker Light Green
                'rgba(0, 191, 255, 1)', // Darker Light Sky Blue
                'rgba(255, 165, 0, 1)', // Darker Navajo White
                'rgba(128, 0, 128, 1)', // Darker Plum
                'rgba(0, 255, 255, 1)', // Darker Light Cyan
                'rgba(255, 182, 193, 1)', // Darker Lavender Blush
                'rgba(255, 228, 225, 1)' // Darker Misty Rose
            ];



            var diagnosesChart = new Chart(ctxDiagnoses, {
                type: 'doughnut',
                data: {
                    labels: diagnosesLabels,
                    datasets: [{
                        label: 'Number of Cases',
                        data: diagnosesCounts,
                        backgroundColor: colors,
                        borderColor: borderColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw;
                                }
                            }
                        }
                    }
                }
            });


            // Event Listeners for Filter Changes
            document.querySelector('#filterSelectConsultation').addEventListener('change', function() {
                document.getElementById('loadingIconConsultation').classList.remove('d-none');
                this.form.submit();
            });

            document.querySelector('#filterSelectDiagnosis').addEventListener('change', function() {
                this.form.submit();
            });

            // Export Table to CSV (placeholder function, needs implementation)
            function exportTableToCSV(tableId, filename) {
                // Implement CSV export logic here
                console.log(`Exporting ${tableId} to ${filename}`);
            }

            document.getElementById('exportConsultations').addEventListener('click', function() {
                exportTableToCSV('companyTable', 'consultations.csv');
            });

            document.getElementById('exportDiagnoses').addEventListener('click', function() {
                exportTableToCSV('diagnosisTable', 'diagnoses.csv');
            });

            // DataTables Initialization
            $('#companyTable').DataTable();
            $('#departmentTable').DataTable();
            $('#diagnosisTable').DataTable();
        });
    </script>
@endsection
