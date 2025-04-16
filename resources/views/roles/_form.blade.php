<div class="mb-3">
    <label for="name" class="form-label">Role Name</label>
    <input type="text" name="name" id="name" class="form-control"
           value="{{ old('name', $role->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Permissions</label>
    @foreach ($permissions as $perm)
        <div class="form-check">
            <input type="checkbox" name="permissions[]" value="{{ $perm->id }}"
                   class="form-check-input"
                   id="perm_{{ $perm->id }}"
                   {{ isset($rolePermissions) && in_array($perm->id, $rolePermissions) ? 'checked' : '' }}>
            <label class="form-check-label" for="perm_{{ $perm->id }}">{{ $perm->name }}</label>
        </div>
    @endforeach
</div>

<button class="btn btn-success">Save</button>
<a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
