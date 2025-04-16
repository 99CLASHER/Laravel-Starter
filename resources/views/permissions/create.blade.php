@extends('layouts.app')

@section('content')
    <h2>Create Permission</h2>
    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf
        @include('permissions._form', ['permission' => null])
    </form>
@endsection
