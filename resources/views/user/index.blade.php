@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-6 col-12">
        <div class="card">
            <div class="card-header">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Users</h4>
                    <div class="d-flex">
                        @can('create-user')
                            <a href="{{ route('users.create') }}" class="btn btn-primary">
                                Add New
                            </a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="user_table" class="table table-hover font-size-12">
                    <thead>
                        <tr>
                            <th class="text-center">Sr#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('#user_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('users.fetch') }}",
        columns: [
            { data: 0, name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 1, name: 'name' },
            { data: 2, name: 'username' },
            { data: 3, name: 'email' },
            { data: 4, name: 'role' },
            { data: 5, name: 'status' },
            { data: 6, name: 'actions', orderable: false, searchable: false }
        ],
        columnDefs: [
            { className: "text-center", targets: [0, 4, 5, 6] }
        ]
    });

    // Delete handler
    $(document).on('click', '.delete-user', function(e) {
        e.preventDefault();
        const userId = $(this).data('id');
        const userName = $(this).closest('tr').find('td:eq(1)').text();

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete " + userName + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('users.destroy', ':id') }}".replace(':id', userId),
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if(response.success) {
                            Swal.fire(
                                'Deleted!',
                                'User has been deleted.',
                                'success'
                            ).then(() => {
                                $('#user_table').DataTable().ajax.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                response.message || 'Failed to delete user.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr) {
                        Swal.fire(
                            'Error!',
                            xhr.responseJSON.message || 'There was an error deleting the user.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
@endpush
