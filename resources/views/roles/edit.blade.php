@extends('layouts.app')
@section('content')
    <h2>Edit Role</h2>
    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf @method('PUT')
        @include('roles._form')
    </form>
@endsection
