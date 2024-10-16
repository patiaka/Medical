@extends('layouts.app')

@section('content')
<h1 class="app-page-title">Edit Drugname</h1>
<hr class="mb-4">
<div class="row g-4 settings-section">
    <div class="col-12 col-md-4">
        <h3 class="section-title">Edit</h3>
        <div class="section-intro">Edit Drugname</div>
    </div>
    <div class="col-12 col-md-8">
        <div class="app-card app-card-settings shadow-sm p-4">
            <div class="app-card-body">
                <form class="" action="{{ route('drugname.update', $drugname) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $drugname->name }}">
                        @error('name')
                        <div class="alert-danger alert">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn app-btn-primary" data-bs-dismiss="modal">Save</button>
                    <a href="{{ route('drugname.index') }}" class="btn btn-secondary">Close</a>
                </form>

            </div>
            <!--//app-card-body-->
        </div>
        <!--//app-card-->
    </div>
</div>
<!--//row-->
@endsection