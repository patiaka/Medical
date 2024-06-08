@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="card-title">{{ $healthSurveillance->employee->firstName }}
                    {{ $healthSurveillance->employee->lastName }}</h2>
                <p class="card-subtitle mb-2">Employee ID: {{ $healthSurveillance->employee->staffId }}</p>
            </div>
            <div class="card-body">
                <h3 class="card-title">Surveillance Details</h3>
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th>Type</th>
                            <td>{{ $healthSurveillance->surveillanceType }}</td>
                        </tr>
                        <tr>
                            <th>Hazards</th>
                            <td>{{ $healthSurveillance->hazards }}</td>
                        </tr>
                        <tr>
                            <th>ECG</th>
                            <td>{{ $healthSurveillance->ecg }}</td>
                        </tr>
                        <tr>
                            <th>Spirometry</th>
                            <td>{{ $healthSurveillance->spirometry }}</td>
                        </tr>
                        <tr>
                            <th>Audiometry</th>
                            <td>{{ $healthSurveillance->audiometry }}</td>
                        </tr>
                        <tr>
                            <th>Follow Up</th>
                            <td>{{ $healthSurveillance->followUp }}</td>
                        </tr>
                    </tbody>
                </table>
                @if ($healthSurveillance->laboratory)
                    <h3 class="card-title">Laboratory Data</h3>
                    <div class="row">
                        @php
                            $labData = $healthSurveillance->laboratory->toArray();
                            $keys = array_keys($labData);
                            $half = ceil(count($keys) / 2);
                        @endphp
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    @for ($i = 0; $i < $half; $i++)
                                        <tr>
                                            <th>{{ ucfirst($keys[$i]) }}</th>
                                            <td>{{ $labData[$keys[$i]] }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="table table-striped">
                                <tbody>
                                    @for ($i = $half; $i < count($keys); $i++)
                                        <tr>
                                            <th>{{ ucfirst($keys[$i]) }}</th>
                                            <td>{{ $labData[$keys[$i]] }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('healthSurveillance.pdf', $healthSurveillance->id) }}"
                    class="btn btn-lg btn-success">Generate PDF</a>
            </div>
        </div>
    </div>
@endsection
