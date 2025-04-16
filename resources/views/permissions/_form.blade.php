<div class="mb-3">
    <label for="name" class="form-label">Permission Name</label>
    <input type="text" name="name" id="name" class="form-control"
           value="{{ old('name', $permission->name ?? '') }}" required>
</div>

<button class="btn btn-success">Save</button>
<a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
