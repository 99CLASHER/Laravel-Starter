@extends('layouts.app')
@section('content')
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Role</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.update', $role) }}" method="POST">
                        <div class="col-lg-12 col-md-6 col-12">
                            @csrf @method('PUT')
                            @include('roles._form')
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
