@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Edit Permissions</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.update', $permission) }}" method="POST">
                    @csrf @method('PUT')
                    @include('permissions._form')
                </form>
            </div>
        </div>
    </div>

@endsection
