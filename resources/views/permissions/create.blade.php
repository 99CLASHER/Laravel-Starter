@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Create Permission</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    @include('permissions._form', ['permission' => null])
                </form>
            </div>
        </div>
    </div>

@endsection
