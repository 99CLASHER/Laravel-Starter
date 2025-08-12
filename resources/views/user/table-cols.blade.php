@if($col == 'name')
    <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="User Name">
        {{ $user->name ?? 'N/A' }}
    </span>

@elseif($col == 'username')
    <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Username">
        {{ $user->username ?? 'N/A' }}
    </span>

@elseif($col == 'email')
    <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Email">
        {{ $user->email ?? 'N/A' }}
    </span>

@elseif($col == 'role')
    <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Role Name">
        {{ $user->getRoleNames()->first() ?? 'N/A' }}
    </span>

@elseif($col == 'status')
    @php
        $class = 'primary';
        if($user->status == 'active') {
            $class = 'success';
        } else if($user->status == 'inactive') {
            $class = 'warning';
        } else if($user->status == 'deleted') {
            $class = 'danger';
        }
    @endphp
    <div class="badge badge-light-{{$class}} fw-bold">{{ ucfirst($user->status) }}</div>

@elseif($col == 'created_at')
    <span data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="Created Date">
        {{ $user->created_at->format('Y-m-d H:i:s') ?? 'N/A' }}
    </span>

@elseif($col == 'actions')
    <div class="text-end">
        <div class="btn-group">
{{--            <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                Actions--}}
{{--            </button>--}}
            <button type="button" class="btn btn-outline-primary btn-inverse btn-icon tooltips mr-3" style="border-radius: 10px" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">Edit</a></li>
                <li><hr class="dropdown-divider"></li>
                @can('delete-user')
                <li><a class="dropdown-item text-danger delete-user" href="#" data-id="{{ $user->id }}">Delete</a></li>
                @endcan
            </ul>
        </div>
    </div>
@endif
