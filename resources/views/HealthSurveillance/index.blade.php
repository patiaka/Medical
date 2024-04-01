@extends('layouts.app')

@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Health Surveillance</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addHealthSurveillanceModal">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus me-1"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 1a.5.5 0 0 1 .5.5V7h5.5a.5.5 0 0 1 0 1H8V14.5a.5.5 0 0 1-1 0V8H1.5a.5.5 0 0 1 0-1H7V1.5A.5.5 0 0 1 7.5 1z" />
                            </svg>
                            Add Health Surveillance
                        </button>
                    </div>
                </div>
                <!--//row-->
            </div>
            <!--//table-utilities-->
        </div>
        <!--//col-auto-->
    </div>
    <!--//row-->

    <div class="tab-content" id="health-surveillance-table-tab-content">
        <div class="tab-pane fade show active" id="health-surveillance-all" role="tabpanel"
            aria-labelledby="health-surveillance-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left" id="myTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Surveillance Type</th>
                                    <th>Occupation</th>
                                    <th>Hazards</th>
                                    <th>ECG</th>
                                    <th>Spirometry</th>
                                    <th>Audiometry</th>
                                    <th>General</th>
                                    <th>Follow Up</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($healthSurveillance as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->surveillanceType }}</td>
                                        <td>{{ $row->occupation }}</td>
                                        <td>{{ $row->hazards }}</td>
                                        <td>{{ $row->ecg }}</td>
                                        <td>{{ $row->spirometry }}</td>
                                        <td>{{ $row->audiometry }}</td>
                                        <td>{{ $row->general }}</td>
                                        <td>{{ $row->followUp }}</td>
                                        <td>
                                            <a class="btn-sm app-btn-secondary"
                                                href="{{ route('heathSurveillance.edit', $row->id) }}">
                                                <i class="fa fa-edit fa-lg text-success"></i>
                                            </a>
                                            <a role="button" href="#"
                                                onclick="deleteConfirmation('{{ route('heathSurveillance.destroy', $row->id) }}')"
                                                class="btn-sm app-btn-danger">
                                                <i class="fa fa-trash fa-lg text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10">No Health Surveillance added</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//tab-pane-->
    </div>
    <!--//tab-content-->

    <!-- Modal add health surveillance -->
    <div class="modal fade" id="addHealthSurveillanceModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="addHealthSurveillanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addHealthSurveillanceModalLabel">Add Health Surveillance</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('heathSurveillance.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="surveillanceType" class="form-label">Surveillance Type</label>
                            <input type="text" class="form-control" id="surveillanceType" name="surveillanceType"
                                value="{{ old('surveillanceType') }}">
                            @error('surveillanceType')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="occupation" class="form-label">Occupation</label>
                            <input type="text" class="form-control" id="occupation" name="occupation"
                                value="{{ old('occupation') }}">
                            @error('occupation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="hazards" class="form-label">Hazards</label>
                            <input type="text" class="form-control" id="hazards" name="hazards"
                                value="{{ old('hazards') }}">
                            @error('hazards')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="ecg" class="form-label">ECG</label>
                            <input type="text" class="form-control" id="ecg" name="ecg"
                                value="{{ old('ecg') }}">
                            @error('ecg')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="spirometry" class="form-label">Spirometry</label>
                            <input type="text" class="form-control" id="spirometry" name="spirometry"
                                value="{{ old('spirometry') }}">
                            @error('spirometry')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="audiometry" class="form-label">Audiometry</label>
                            <input type="text" class="form-control" id="audiometry" name="audiometry"
                                value="{{ old('audiometry') }}">
                            @error('audiometry')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="general" class="form-label">General</label>
                            <input type="text" class="form-control" id="general" name="general"
                                value="{{ old('general') }}">
                            @error('general')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="followUp" class="form-label">Follow Up</label>
                            <input type="date" class="form-control" id="followUp" name="followUp"
                                value="{{ old('followUp') }}">
                            @error('followUp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
