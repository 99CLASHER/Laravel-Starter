@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Permissions</h2>
    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create Permission</a>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $perm)
        <tr>
            <td>{{ $perm->name }}</td>
            <td>
                <a href="{{ route('permissions.edit', $perm) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('permissions.destroy', $perm) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
