@extends('layouts.app')

@section('content')
    <h1 class="app-page-title">Edit Doctor</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Edit</h3>
            <div class="section-intro">Edit Doctor</div>
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">
                <div class="app-card-body">
                    <form class="" action="{{ route('user.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $user->name }}">
                            @error('name')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $user->email }}">
                            @error('email')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $user->phone }}">
                            @error('phone')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="function" class="form-label">Function</label>
                            <input type="text" class="form-control" id="jobTitle" name="function" placeholder="function"
                                value="{{ $user->function }}" required>
                            @error('function')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option @selected($user->role === 'Super Admin') value="superAdmin">Super Admin</option>
                                <option @selected($user->role === 'Admin') value="admin">Admin</option>
                                <option @selected($user->role === 'user') value="user">User</option>

                            </select>
                            @error('role')
                                <div class="alert-danger alert">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Save</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Close</a>
                    </form>

                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
    </div>
    <!--//row-->
@endsection
