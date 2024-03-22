@extends('layouts.app')

@section('content')
<h1 class="app-page-title">Edit Employee</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Edit</h3>
        <div class="section-intro">Edit Employee</div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="" action="{{ route('user.update',$user) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">name</label>
                        <input type="text" class="form-control" id="birthDate" name="name" value="{{ $user->name }}">
                        @error('name')
                        <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">email</label>
                        <input type="text" class="form-control" id="birthDate" name="email" value="{{ $user->email }}">
                        @error('email')
                        <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">phone</label>
                        <input type="text" class="form-control" id="birthDate" name="phone" value="{{ $user->phone }}">
                        @error('phone')
                        <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jobTitle" class="form-label">function</label>
                        <input type="text" class="form-control" id="jobTitle" name="function" placeholder="function"
                            value="{{ $user->function }}" required>
                        @error('function')
                        <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="rowType" class="form-label">role</label>
                        <select class="form-control" name="role" id="rowType">
                            <option @selected($user->role === 'National') value="National">National</option>
                            <option @selected($user->role === 'Expat') value="Expat">Expat</option>

                        </select>
                        @error('role')
                        <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Save</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>

            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
    </div>
</div>
<!--//row-->
@endsection