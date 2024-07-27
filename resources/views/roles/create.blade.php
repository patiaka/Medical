@extends('layouts.app')

@section('content')
    <h1>Create Role</h1>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <h3>Permissions</h3>
        @foreach ($permissions as $permission)
            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"> {{ $permission->name }}<br>
        @endforeach
        <button type="submit">Create</button>
    </form>
@endsection
