@extends('layouts.app')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-12 col-md-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 text-center">
                    <i class="fas fa-user-md fa-3x text-primary mb-3"></i>
                    <h4 class="stats-type mb-1">Doctors</h4>
                    <div class="stats-figure">{{ $totalDoctor }}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('user.index') }}"></a>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 text-center">
                    <i class="fas fa-stethoscope fa-3x text-danger mb-3"></i>
                    <h4 class="stats-type mb-1">Consultation</h4>
                    <div class="stats-figure">{{ $totalConsultation }}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('consultation.index') }}"></a>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 text-center">
                    <i class="fas fa-user-friends fa-3x text-info mb-3"></i>
                    <h4 class="stats-type mb-1">Patient</h4>
                    <div class="stats-figure">{{ $totalEmployee }}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('employee.index') }}"></a>
            </div>
        </div>

        <div class="col-12 col-md-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4 text-center">
                    <i class="fas fa-hospital fa-3x text-success mb-3"></i>
                    <h4 class="stats-type mb-1">Department</h4>
                    <div class="stats-figure">{{ $totalDepartment }}</div>
                </div>
                <a class="app-card-link-mask" href="{{ route('department.index') }}"></a>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="app-card shadow-sm">
                <div class="app-card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="app-card-title">Consultations by Day</h2>
                        <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select me-2" id="filterSelect" name="filter">
                                <option value="last_24h" {{ $filter === 'last_24h' ? 'selected' : '' }}>Last 24h</option>
                                <option value="week" {{ $filter === 'week' ? 'selected' : '' }}>Week</option>
                                <option value="month" {{ $filter === 'month' ? 'selected' : '' }}>Month</option>
                                <option value="year" {{ $filter === 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                        </form>
                    </div>
                    <div id="loadingIcon" class="d-none d-flex justify-content-center align-items-center">
                        <i class="fas fa-circle-notch fa-spin" style="font-size: 5rem;"></i>
                    </div>
                    <hr>
                    <canvas id="consultationChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="app-card shadow-sm">
                <div class="app-card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="app-card-title">Malaria Treatment Statistics</h2>
                        <form action="{{ route('dashboard') }}" method="GET" class="d-flex align-items-center">
                            <select class="form-select me-2" id="filterSelectMalaria" name="filter">
                                <option value="last_24h" {{ $filter === 'last_24h' ? 'selected' : '' }}>Last 24h</option>
                                <option value="week" {{ $filter === 'week' ? 'selected' : '' }}>Week</option>
                                <option value="month" {{ $filter === 'month' ? 'selected' : '' }}>Month</option>
                                <option value="year" {{ $filter === 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                        </form>
                    </div>
                    <canvas id="malariaChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-5">
            <div class="app-card shadow-sm"
                style="background-color: #ffffff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="app-card-body">
                    <h2 class="mb-4" style="font-size: 1.5rem; color: #333333; font-weight: bold;">Consultations by
                        Company</h2>
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

        <div class="col-12 col-md-6 mt-5">
            <div class="app-card shadow-sm"
                style="background-color: #ffffff; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
                <div class="app-card-body">
                    <h2 class="mb-4" style="font-size: 1.5rem; color: #333333; font-weight: bold;">Consultations by
                        Department</h2>
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

    <!-- Script for the charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('consultationChart').getContext('2d');
            var consultationDates = {!! json_encode(
                $consultationsByDay->pluck('date')->map(function ($date) {
                    return \Carbon\Carbon::parse($date)->format('Y-m-d');
                }),
            ) !!};
            var consultationCounts = {!! json_encode($consultationsByDay->pluck('count')) !!};

            // Format the dates to show the full month name
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

            // Malaria chart
            var malariaCtx = document.getElementById('malariaChart').getContext('2d');
            var malariaLabels = {!! json_encode($malariaStats->pluck('malaria')) !!};
            var malariaCounts = {!! json_encode($malariaStats->pluck('count')) !!};

            // Append the counts to the labels
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

            // Initialize DataTables
            $('#companyTable').DataTable();
            $('#departmentTable').DataTable();
        });

        // Code de l'evenement qui declenche le auto filtre pour les consultations
        document.addEventListener('DOMContentLoaded', function() {
            // Écoute l'événement de soumission du formulaire
            document.querySelector('#filterSelect').addEventListener('change', function() {
                // Affiche l'icône de chargement
                document.getElementById('loadingIcon').classList.remove('d-none');

                // Soumet le formulaire
                this.form.submit();
            });

            // Code de l'evenement qui declenche le auto filtre pour les statistiques de malaria
            document.querySelector('#filterSelectMalaria').addEventListener('change', function() {
                // Affiche l'icône de chargement
                document.getElementById('loadingIcon').classList.remove('d-none');

                // Soumet le formulaire
                this.form.submit();
            });
        });
    </script>
@endsection
