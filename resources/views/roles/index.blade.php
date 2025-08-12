@extends('layouts.app')

@section('content')

    <div class="col-lg-12 col-md-6 col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center mb-3">
                <h2>Roles</h2>
                @can('create-role')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">Create Role</a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table" id="role_table">
                    <thead>
                    <tr>
                        <th>Sr#</th>
                        <th>Name</th>
                        @canany(['edit-role', 'delete-role'])
                            <th>Actions</th>
                        @endcanany
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key=>$role)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $role->name }}</td>
                            @canany(['edit-role', 'delete-role'])
                                <td>
                                    @can('edit-role')
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning">Edit</a>
                                    @endcan
                                    @can('delete-role')
                                        <form action="{{ route('roles.destroy', $role) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            @endcanany
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection


@push('js')
    <script>
        $('#role_table').DataTable();
    </script>
@endpush
