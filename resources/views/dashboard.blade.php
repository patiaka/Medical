<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your other head elements -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <style>
            .card-body {
                background-color: #f8f9fa;
                border-radius: 10px;
                padding: 20px;
            }

            .bg-doctor { background-color: #e3f2fd; }
            .bg-consultation { background-color: #e3f2fd; }
            .bg-patient { background-color: #e1f5fe; }
            .bg-department { background-color: #e8f5e9; }

            .icon-doctor { color: #2196f3; }
            .icon-consultation { color: #f44336; }
            .icon-patient { color: #03a9f4; }
            .icon-department { color: #4caf50; }
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
            <!-- Cards -->
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
                                    <option value="last_24h" {{ $filter === 'last_24h' ? 'selected' : '' }}>Last 24 Hours</option>
                                    <option value="week" {{ $filter === 'week' ? 'selected' : '' }}>This Week</option>
                                    <option value="month" {{ $filter === 'month' ? 'selected' : '' }}>This Month</option>
                                    <option value="year" {{ $filter === 'year' ? 'selected' : '' }}>This Year</option>
                                </select>
                                <input type="hidden" name="filter_diagnosis" value="{{ $filterDiagnosis }}">
                            </form>
                            <button id="exportExcel" class="btn btn-outline-primary">
                                <i class="fas fa-file-excel"></i> Export
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
                                <select class="form-select me-2" id="filterSelectDiagnosis" name="filterSelectDiagnosis" onchange="this.form.submit()">
                                    <option value="all" {{ $filterDiagnosis === 'all' ? 'selected' : '' }}>All</option>
                                    <option value="top_5" {{ $filterDiagnosis === 'top_5' ? 'selected' : '' }}>Top 5</option>
                                    <option value="last_24h" {{ $filterDiagnosis === 'last_24h' ? 'selected' : '' }}>Last 24 hours</option>
                                    <option value="week" {{ $filterDiagnosis === 'week' ? 'selected' : '' }}>Last Week</option>
                                    <option value="month" {{ $filterDiagnosis === 'month' ? 'selected' : '' }}>Last Month</option>
                                    <option value="year" {{ $filterDiagnosis === 'year' ? 'selected' : '' }}>Last Year</option>
                                </select>
                            </form>
                            <button id="exportExcelDiagnoses" class="btn btn-outline-primary">
                                <i class="fas fa-file-excel"></i> Export
                            </button>
                        </div>
                        <canvas id="diagnosesChart" width="400" height="400"></canvas>
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
                        responsive: true
                    }
                });

                // Fonction pour l'exportation en Excel
                document.getElementById('exportExcel').addEventListener('click', function() {
                    var wb = XLSX.utils.book_new();

                    var wsConsultations = XLSX.utils.json_to_sheet(
                        consultationDates.map((date, index) => ({
                            Date: date,
                            Count: consultationCounts[index]
                        })),
                        { header: ['Date', 'Count'] }
                    );
                    XLSX.utils.book_append_sheet(wb, wsConsultations, 'Consultations');

                    var wsDiagnoses = XLSX.utils.json_to_sheet(
                        diagnosesLabels.map((label, index) => ({
                            Diagnosis: label,
                            Count: diagnosesCounts[index]
                        })),
                        { header: ['Diagnosis', 'Count'] }
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
                        })),
                        { header: ['Diagnosis', 'Count'] }
                    );
                    XLSX.utils.book_append_sheet(wb, wsDiagnoses, 'Diagnoses');

                    XLSX.writeFile(wb, 'diagnoses_export.xlsx');
                });
            });
        </script>
    @endsection
</body>
</html>
