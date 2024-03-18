@extends('layouts.app')
@section('content')
    <h1 class="app-page-title">Department</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Add</h3>
            <div class="section-intro">Add new Department</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="" method="POST" action="{{ route('department.store') }}">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="department_id" class="form-label">Name</label>
                            <input type="text" class="form-control" id="department_name" name="department_name"
                                placeholder="Department Name" value="{{ old('department_name') }}" required>
                            @error('department_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save</button>
                    </form>
                </div><!--//app-card-body-->
            </div><!--//app-card-->
        </div>
    </div><!--//row-->
@endsection
