@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col">
            <h1 class="app-page-title">Dashboard</h1>
        </div>
        <div class="col-auto">
            <div class="btn-group" role="group" aria-label="Filter">
                <select class="form-select" id="filterSelect">
                    <option selected disabled>Filter</option>

                    <option value="last_24h">Last 24h</option>
                    <option value="week">Week</option>
                    <option value="month">Month</option>
                    <option value="year">Year</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 text-center">
                    <i class="fas fa-user-md fa-3x text-primary mb-3"></i>
                    <h4 class="stats-type mb-1">Doctors</h4>
                    <div class="stats-figure">{{ $totalDoctor }}</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('user.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 text-center">
                    <i class="fas fa-stethoscope fa-3x text-danger mb-3"></i>
                    <h4 class="stats-type mb-1">Consultation</h4>
                    <div class="stats-figure">{{ $totalConsultation }}</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('consultation.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 text-center">
                    <i class="fas fa-user-friends fa-3x text-info mb-3"></i>
                    <h4 class="stats-type mb-1">Patient</h4>
                    <div class="stats-figure">{{ $totalEmployee }}</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('employee.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 text-center">
                    <i class="fas fa-hospital fa-3x text-success mb-3"></i>
                    <h4 class="stats-type mb-1">Department</h4>
                    <div class="stats-figure">{{ $totalDepartment }}</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('department.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-12">
            <div class="app-card shadow-sm">
                <div class="app-card-body">
                    <h2 class="app-card-title">Dashboard Data</h2>
                    <canvas id="consultationChart" width="400" height="200"></canvas>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div><!--//col-->
    </div><!--//row-->
    <!-- Script for the chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('consultationChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total Doctors', 'Total Consultation', 'Total Patient', 'Total Department'],
                datasets: [{
                    label: 'Consultation Data',
                    data: [{{ $totalDoctor }}, {{ $totalConsultation }}, {{ $totalEmployee }},
                        {{ $totalDepartment }}
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
