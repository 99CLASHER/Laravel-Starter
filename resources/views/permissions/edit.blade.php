@extends('layouts.app')

@section('content')
    <h2>Edit Permission</h2>
    <form action="{{ route('permissions.update', $permission) }}" method="POST">
        @csrf @method('PUT')
        @include('permissions._form')
    </form>
@endsection
