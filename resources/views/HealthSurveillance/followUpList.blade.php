{{-- @extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Health Surveillance Follow-Up List</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item active">Follow-Ups</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Surveillance Type</th>
                                    <th>Hazards</th>
                                    <th>ECG</th>
                                    <th>Spirometry</th>
                                    <th>Audiometry</th>
                                    <th>General</th>
                                    <th>Follow-Up Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($followUpList as $surveillance)
                                    <tr>
                                        <td>{{ $surveillance->employee->name }}</td>
                                        <td>{{ $surveillance->surveillanceType }}</td>
                                        <td>{{ $surveillance->hazards }}</td>
                                        <td>{{ $surveillance->ecg }}</td>
                                        <td>{{ $surveillance->spirometry }}</td>
                                        <td>{{ $surveillance->audiometry }}</td>
                                        <td>{{ $surveillance->general }}</td>
                                        <td>{{ \Carbon\Carbon::parse($surveillance->followUp)->format('d/m/Y') }}</td>
                                        <td>
                                            @if (\Carbon\Carbon::parse($surveillance->followUp)->isPast())
                                                <span class="badge bg-danger">Overdue</span>
                                            @else
                                                <span class="badge bg-warning">Upcoming</span>
                                            @endif
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
@endsection --}}
