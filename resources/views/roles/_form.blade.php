<div class="mb-3">
    <label for="name" class="form-label">Role Name</label>
    <input type="text" name="name" id="name" class="form-control"
           value="{{ old('name', $role->name ?? '') }}" required>
</div>

<!-- Add this new dropdown for role type -->
<div class="mb-3">
    <label for="role_type" class="form-label">Role Type</label>
    <select name="role_type" id="role_type" class="form-select" required>
        <option value="">Select Role Type</option>
        <option value="admin" {{ (old('role_type', $role->role_type ?? '') == 'admin') ? 'selected' : '' }}>Admin</option>
        <option value="dispatcher" {{ (old('role_type', $role->role_type ?? '') == 'dispatcher') ? 'selected' : '' }}>Dispatcher</option>
        <option value="maintainer" {{ (old('role_type', $role->role_type ?? '') == 'maintainer') ? 'selected' : '' }}>Fleet Maintenance Officer</option>
        <option value="officer" {{ (old('role_type', $role->role_type ?? '') == 'officer') ? 'selected' : '' }}>Safety Officer</option>
        <option value="payroller" {{ (old('role_type', $role->role_type ?? '') == 'officer') ? 'selected' : '' }}>Payroller</option>
        <option value="hr" {{ (old('role_type', $role->role_type ?? '') == 'hr') ? 'selected' : '' }}>HR Officer</option>
        <option value="viewer" {{ (old('role_type', $role->role_type ?? '') == 'viewer') ? 'selected' : '' }}>Viewer</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Permissions</label>
    <div class="row p-1">
        @if ( isset($permissions) )
            @foreach($permissions as $permission)
                <div class="col-md-3 col-sm-4">
                    <div class="checkbox checkbox-aqua pl-0">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                               id="{{$permission->id}}"
                            {{ isset($rolePermissions) && in_array($permission->id, $rolePermissions) ? 'checked' : ''}}>
                        <label for="{{$permission->id}}">{{$permission->name}}</label>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<button class="btn btn-success">Save</button>
<a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>