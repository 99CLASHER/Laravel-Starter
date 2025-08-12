@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Create Role</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                    @include('roles._form', ['role' => null])
                </form>
            </div>
        </div>
    </div>

@endsection
