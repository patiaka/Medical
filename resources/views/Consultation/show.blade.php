@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Consultation Details</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Consultation ID:</th>
                                    <td>{{ $consultation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Consultation Date:</th>
                                    <td>{{ $consultation->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Employee:</th>
                                    <td>{{ $consultation->employee->firstName }} {{ $consultation->employee->lastName }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">National/Expat:</th>
                                    <td>{{ $consultation->employee->employeeType }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Staff ID:</th>
                                    <td>{{ $consultation->employee->staffId }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Company:</th>
                                    <td>{{ $consultation->employee->company }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Department:</th>
                                    <td>{{ $consultation->employee->department->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Seen by:</th>
                                    <td>{{ $consultation->user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Injury Type:</th>
                                    <td>{{ $consultation->injurie->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Staff/Family:</th>
                                    <td>{{ $consultation->staffType }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Referral:</th>
                                    <td>{{ $consultation->referral }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Diagnosis:</th>
                                    <td>{{ $consultation->diagnosis }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">History:</th>
                                    <td>{{ $consultation->history }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">BP:</th>
                                    <td>{{ $consultation->bp }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pulse:</th>
                                    <td>{{ $consultation->pulse }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Temperature:</th>
                                    <td>{{ $consultation->temperature }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Observation:</th>
                                    <td>{{ $consultation->observation }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Comments:</th>
                                    <td>{{ $consultation->comments }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Malaria:</th>
                                    <td>{{ $consultation->malaria }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Days Off:</th>
                                    <td>{{ $consultation->daysOff }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Diagnosis Specific:</th>
                                    <td>{{ $consultation->diagnosispec }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Diagnosis Mali:</th>
                                    <td>{{ $consultation->diagnosiMali }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('consultation.index') }}" class="btn btn-secondary">Back to Consultation List</a>
    </div>
@endsection
