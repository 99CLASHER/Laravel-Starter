@extends('layouts.app')

@section('content')
    <h2>Create Role</h2>
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        @include('roles._form', ['role' => null])
    </form>
@endsection
