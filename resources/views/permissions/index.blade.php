@extends('layouts.app')

@section('content')
    <div class="col-lg-12 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <h3>Permissions</h3>
                @can('create-permission')
                    <a href="{{ route('permissions.create') }}" class="btn btn-primary">Create Permission</a>
                @endcan
            </div>
            <div class="card-body">
                <table class="table" id="permission_table">
                    <thead>
                        <tr>
                            <th>Sr#</th>
                            <th>Name</th>
                            @canany(['edit-permission', 'delete-permission'])
                                <th>Actions</th>
                            @endcanany
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $key=>$perm)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $perm->name }}</td>
                                @canany(['edit-permission', 'delete-permission'])
                                    <td>
                                        @can('edit-permission')
                                            <a href="{{ route('permissions.edit', $perm) }}" class="btn btn-sm btn-warning">Edit</a>
                                        @endcan

                                        @can('delete-permission')
                                            <form action="{{ route('permissions.destroy', $perm) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
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
        $('#permission_table').DataTable();
    </script>
@endpush
