@extends('layouts.app')
@section('content')
    <h1 class="app-page-title">Edit</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-12 col-md-4">
            <h3 class="section-title">Edit</h3>
            <div class="section-intro">Edit Department</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="" method="POST" action="{{ route('department.update', $department->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Name</label>
                            <input type="text" class="form-control" id="department_name" name="department_name"
                                placeholder="Department Name" value="{{ $department->name }}" required>
                            @error('department_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary">Update</button>
                    </form>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
@endsection
