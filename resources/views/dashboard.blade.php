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
        <div class="col-12 col-md-6">
            <div class="card dash-widget">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="stats-type">Consultations by Day</h4>
                        <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select me-2" id="filterSelectConsultation" name="filter">
                                <option value="last_24h" {{ $filter === 'last_24h' ? 'selected' : '' }}>Last 24h</option>
                                <option value="week" {{ $filter === 'week' ? 'selected' : '' }}>Week</option>
                                <option value="month" {{ $filter === 'month' ? 'selected' : '' }}>Month</option>
                                <option value="year" {{ $filter === 'year' ? 'selected' : '' }}>Year</option>
                            </select>
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

        <!-- Malaria Treatment Statistics Chart -->
        <div class="col-12 col-md-6">
            <div class="card dash-widget">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="stats-type">Malaria Treatment Statistics</h4>
                        <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select me-2" id="filterSelectMalaria" name="filter_malaria">
                                <option value="last_24h" {{ $filter_malaria === 'last_24h' ? 'selected' : '' }}>Last 24h
                                </option>
                                <option value="week" {{ $filter_malaria === 'week' ? 'selected' : '' }}>Week</option>
                                <option value="month" {{ $filter_malaria === 'month' ? 'selected' : '' }}>Month</option>
                                <option value="year" {{ $filter_malaria === 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                        </form>
                        <button id="exportMalaria" class="btn btn-outline-primary">
                            <i class="fas fa-file-export"></i>
                        </button>
                    </div>
                    <canvas id="malariaChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Consultations by Company Table -->
        <div class="col-12 col-md-6 mt-5">
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
        <div class="col-12 col-md-6 mt-5">
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
    </div>





    <!-- Script for the charts and export functionality -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Consultation Chart
            var ctx = document.getElementById('consultationChart').getContext('2d');
            var consultationDates = {!! json_encode(
                $consultationsByDay->pluck('date')->map(function ($date) {
                    return \Carbon\Carbon::parse($date)->format('Y-m-d');
                }),
            ) !!};
            var consultationCounts = {!! json_encode($consultationsByDay->pluck('count')) !!};

            var formattedDates = consultationDates.map(function(date) {
                var options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                return new Date(date).toLocaleDateString('en-US', options);
            });

            var consultationChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: formattedDates,
                    datasets: [{
                        label: 'Consultations per Day',
                        data: consultationCounts,
                        backgroundColor: 'rgba(240, 239, 230)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.raw + ' consultations';
                                }
                            }
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            formatter: function(value) {
                                return value;
                            }
                        }
                    }
                }
            });

            
            var malariaCtx = document.getElementById('malariaChart').getContext('2d');
            var malariaLabels = {!! json_encode($malariaStats->pluck('malaria')) !!};
            var malariaCounts = {!! json_encode($malariaStats->pluck('count')) !!};

            var malariaLabelsWithCounts = malariaLabels.map(function(label, index) {
                return label + ' (' + malariaCounts[index] + ')';
            });

            var malariaChart = new Chart(malariaCtx, {
                type: 'doughnut',
                data: {
                    labels: malariaLabelsWithCounts,
                    datasets: [{
                        label: 'Malaria Treatment',
                        data: malariaCounts,
                        backgroundColor: [
                            'rgba(29, 204, 55)', // Dark green
                            'rgba(242, 68, 15)', // Dark red
                            'rgba(194, 192, 95)', // Yellow
                            'rgba(128, 128, 128, 0.2)', // Gray
                            'rgba(255, 99, 132, 0.2)' // Pink as a placeholder
                        ],
                        borderColor: [
                            'rgba(23, 145, 42)', // Dark green
                            'rgba(227, 18, 49)', // Dark red
                            'rgba(194, 192, 95, 1)', // Yellow
                            'rgba(128, 128, 128, 1)', // Gray
                            'rgba(255, 99, 132, 1)' // Pink as a placeholder
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        legend: {
                            display: true
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    return tooltipItem.raw + ' cases';
                                }
                            }
                        }
                    }
                }
            });

            
            function exportTableToCSV(filename, tableId) {
                var csv = [];
                var rows = document.querySelectorAll(`#${tableId} tr`);

                for (var i = 0; i < rows.length; i++) {
                    var row = [],
                        cols = rows[i].querySelectorAll('td, th');

                    for (var j = 0; j < cols.length; j++) {
                        row.push(cols[j].innerText);
                    }

                    csv.push(row.join(","));
                }

                
                var csvFile = new Blob([csv.join("\n")], {
                    type: "text/csv"
                });
                var downloadLink = document.createElement("a");
                downloadLink.download = filename;
                downloadLink.href = window.URL.createObjectURL(csvFile);
                downloadLink.style.display = "none";
                document.body.appendChild(downloadLink);
                downloadLink.click();
            }

            function exportMalariaChartToCSV() {
                var csv = [];
                var rows = [
                    ['Malaria Type', 'Number of Cases']
                ];

                malariaLabels.forEach((label, index) => {
                    rows.push([label, malariaCounts[index]]);
                });

               
                var csvFile = new Blob([rows.map(e => e.join(",")).join("\n")], {
                    type: "text/csv"
                });
                var downloadLink = document.createElement("a");
                downloadLink.download = 'malaria_statistics.csv';
                downloadLink.href = window.URL.createObjectURL(csvFile);
                downloadLink.style.display = "none";
                document.body.appendChild(downloadLink);
                downloadLink.click();
            }

            document.getElementById('exportConsultations').addEventListener('click', function() {
                exportTableToCSV('consultations.csv', 'companyTable');
            });

            document.getElementById('exportMalaria').addEventListener('click', function() {
                exportMalariaChartToCSV();
            });

            
            $('#companyTable').DataTable();
            $('#departmentTable').DataTable();
        });

       
        document.addEventListener('DOMContentLoaded', function() {
            
            document.querySelector('#filterSelectConsultation').addEventListener('change', function() {
                
                document.getElementById('loadingIconConsultation').classList.remove('d-none');

                
                this.form.submit();
            });

        
            document.querySelector('#filterSelectMalaria').addEventListener('change', function() {
                
                document.getElementById('loadingIconMalaria').classList.remove('d-none');

                
                this.form.submit();
            });
        });
    </script>
@endsection
