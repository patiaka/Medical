<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your other head elements -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        .icon-medical-checkup {
            color: #03a9f4;
        }

        .icon-department {
            color: #4caf50;
        }

        .form-select {
            width: auto;
            flex: 1;
        }

        .btn-outline-primary {
            margin-left: 1rem;
        }

        .chart-container {
            position: relative;
            width: 100%;
            height: 400px; /* Ensure the height is sufficient */
        }

        @media (max-width: 768px) {
            .chart-container {
                height: 300px; /* Adjust height for smaller screens */
            }
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <div class="page-header">
            <div class="row">
                <div class="col-12">
                    <h3 class="page-title">Welcome {{ auth()->user()->name }}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row mb-4">
            <!-- Cards -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card dash-widget">
                    <div class="card-body bg-doctor d-flex justify-content-between align-items-center">
                        <i class="fas fa-user-md fa-3x icon-doctor"></i>
                        <div class="dash-widget-info text-end">
                            <h3>{{ $totalDoctor }}</h3>
                            <a class="app-card-link-mask" href="{{ route('user.index') }}"><span>Doctors</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card dash-widget">
                    <div class="card-body bg-consultation d-flex justify-content-between align-items-center">
                        <i class="fas fa-stethoscope fa-3x icon-consultation"></i>
                        <div class="dash-widget-info text-end">
                            <h3>{{ $totalConsultation }}</h3>
                            <a class="app-card-link-mask" href="{{ route('consultation.index') }}"><span>Consultation</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card dash-widget">
                    <div class="card-body bg-patient d-flex justify-content-between align-items-center">
                        <i class="fas fa-heartbeat fa-3x icon-medical-checkup"></i>
                        <div class="dash-widget-info text-end">
                            <h3>{{ $totalheathSurveillance }}</h3>
                            <a class="app-card-link-mask" href="{{ route('healthSurveillance.index') }}"><span>Medical Check Up</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card dash-widget">
                    <div class="card-body bg-department d-flex justify-content-between align-items-center">
                        <i class="fas fa-hospital fa-3x icon-department"></i>
                        <div class="dash-widget-info text-end">
                            <h3>{{ $totalDepartment }}</h3>
                            <a class="app-card-link-mask" href="{{ route('department.index') }}"><span>Departments</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Consultations by Day Chart -->
            <div class="col-md-12 col-lg-8 mb-4">
                <div class="card dash-widget">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="stats-type">Consultations by Day</h4>
                            <form method="GET" action="{{ route('dashboard') }}" class="d-flex align-items-center">
                                <select name="filter" class="form-select" onchange="this.form.submit()">
                                    <option value="all" {{ $filter === 'all' ? 'selected' : '' }}>All</option>
                                    <option value="last_24h" {{ $filter === 'last_24h' ? 'selected' : '' }}>Last 24 Hours</option>
                                    <option value="week" {{ $filter === 'week' ? 'selected' : '' }}>This Week</option>
                                    <option value="month" {{ $filter === 'month' ? 'selected' : '' }}>This Month</option>
                                    <option value="year" {{ $filter === 'year' ? 'selected' : '' }}>This Year</option>
                                </select>
                                <input type="hidden" name="filter_diagnosis" value="{{ $filterDiagnosis }}">
                                <button id="exportExcel" class="btn btn-outline-primary">
                                    <i class="fas fa-file-excel"></i> Export
                                </button>
                            </form>
                        </div>
                        <div id="loadingIconConsultation" class="d-none d-flex justify-content-center align-items-center">
                            <i class="fas fa-spinner fa-pulse" style="font-size: 2rem;"></i>
                        </div>
                        <hr>
                        <div class="chart-container">
                            <canvas id="consultationChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Diagnoses Chart -->
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="card dash-widget">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="stats-type">Diagnoses Statistics</h4>
                            <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                                <select class="form-select me-2" id="filterSelectDiagnosis" name="filterSelectDiagnosis" onchange="this.form.submit()">
                                    <option value="all" {{ $filterDiagnosis === 'all' ? 'selected' : '' }}>All</option>
                                    <option value="top_5" {{ $filterDiagnosis === 'top_5' ? 'selected' : '' }}>Top 5</option>
                                    <option value="last_24h" {{ $filterDiagnosis === 'last_24h' ? 'selected' : '' }}>Last 24 hours</option>
                                    <option value="week" {{ $filterDiagnosis === 'week' ? 'selected' : '' }}>Last Week</option>
                                    <option value="month" {{ $filterDiagnosis === 'month' ? 'selected' : '' }}>Last Month</option>
                                    <option value="year" {{ $filterDiagnosis === 'year' ? 'selected' : '' }}>Last Year</option>
                                </select>
                                <button id="exportExcelDiagnoses" class="btn btn-outline-primary">
                                    <i class="fas fa-file-excel"></i> Export
                                </button>
                            </form>
                        </div>
                        <div class="chart-container">
                            <canvas id="diagnosesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var ctxConsultation = document.getElementById('consultationChart').getContext('2d');
                var consultationDates = {!! json_encode($consultationsByDay->pluck('period')) !!};
                var consultationCounts = {!! json_encode($consultationsByDay->pluck('count')) !!};

                function formatDate(dateStr, filter) {
                    var date = new Date(dateStr);
                    var options = {
                        day: '2-digit',
                        month: '2-digit',
                        year: 'numeric'
                    };

                    if (filter === 'month' || filter === 'year' || filter === 'all') {
                        return date.toLocaleDateString('en-US', {
                            month: 'short',
                            year: 'numeric'
                        });
                    } else {
                        return date.toLocaleDateString('en-GB', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        });
                    }
                }

                var formattedDates = consultationDates.map(date => formatDate(date, '{{ $filter }}'));

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
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                beginAtZero: true,
                                ticks: {
                                    autoSkip: true
                                }
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                var ctxDiagnoses = document.getElementById('diagnosesChart').getContext('2d');
                var diagnosesLabels = {!! json_encode($diagnosesStats->pluck('label')) !!};
                var diagnosesCounts = {!! json_encode($diagnosesStats->pluck('count')) !!};

                var diagnosesChart = new Chart(ctxDiagnoses, {
                    type: 'pie',
                    data: {
                        labels: diagnosesLabels,
                        datasets: [{
                            data: diagnosesCounts,
                            backgroundColor: [
                                '#FF6384',
                                '#36A2EB',
                                '#FFCE56',
                                '#4BC0C0',
                                '#9966FF',
                                '#FF9F40',
                                '#FFCD56',
                                '#C2C2C2',
                                '#8E5EA2',
                                '#3E95CD'
                            ]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                // Fonction pour l'exportation en Excel
                document.getElementById('exportExcel').addEventListener('click', function() {
                    var wb = XLSX.utils.book_new();

                    var wsConsultations = XLSX.utils.json_to_sheet(
                        consultationDates.map((date, index) => ({
                            Date: date,
                            Count: consultationCounts[index]
                        })), {
                            header: ['Date', 'Count']
                        }
                    );
                    XLSX.utils.book_append_sheet(wb, wsConsultations, 'Consultations');

                    var wsDiagnoses = XLSX.utils.json_to_sheet(
                        diagnosesLabels.map((label, index) => ({
                            Diagnosis: label,
                            Count: diagnosesCounts[index]
                        })), {
                            header: ['Diagnosis', 'Count']
                        }
                    );
                    XLSX.utils.book_append_sheet(wb, wsDiagnoses, 'Diagnoses');

                    XLSX.writeFile(wb, 'statistics_export.xlsx');
                });

                // Fonction pour l'exportation des diagnostics
                document.getElementById('exportExcelDiagnoses').addEventListener('click', function() {
                    var wb = XLSX.utils.book_new();

                    var wsDiagnoses = XLSX.utils.json_to_sheet(
                        diagnosesLabels.map((label, index) => ({
                            Diagnosis: label,
                            Count: diagnosesCounts[index]
                        })), {
                            header: ['Diagnosis', 'Count']
                        }
                    );
                    XLSX.utils.book_append_sheet(wb, wsDiagnoses, 'Diagnoses');

                    XLSX.writeFile(wb, 'diagnoses_export.xlsx');
                });
            });
        </script>
        <!-- Include Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</body>

</html>
