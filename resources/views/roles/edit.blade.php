@extends('layouts.app')

@section('content')
    <h1>Edit Role</h1>
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $role->name }}">
        <h3>Permissions</h3>
        @foreach ($permissions as $permission)
            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}> {{ $permission->name }}<br>
        @endforeach
        <button type="submit">Update</button>
    </form>
@endsection
