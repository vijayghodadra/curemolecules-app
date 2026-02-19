@extends('admin.layouts.app')
@section('title', 'Add Category')

@section('content')
<div style="max-width:520px;">
    <div class="card">
        <div class="card-header">
            <span><i class="fas fa-plus" style="color:#2dd4bf;margin-right:8px;"></i>Add Category</span>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label">Category Name <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           value="{{ old('name') }}" placeholder="e.g. Pharmaceutical Intermediates" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    <div class="form-text">A slug will be auto-generated from the name.</div>
                </div>
                <div style="display:flex; gap:10px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Category</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
