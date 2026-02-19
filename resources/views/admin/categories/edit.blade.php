@extends('admin.layouts.app')
@section('title', 'Edit Category')

@section('content')
<div style="max-width:520px;">
    <div class="card">
        <div class="card-header">
            <span><i class="fas fa-pen" style="color:#2dd4bf;margin-right:8px;"></i>Edit Category</span>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categories.update', $category) }}">
                @csrf @method('PUT')
                <div class="form-group">
                    <label class="form-label">Category Name <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           value="{{ old('name', $category->name) }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group">
                    <label class="form-label">Current Slug</label>
                    <input type="text" class="form-control" value="{{ $category->slug }}" disabled style="opacity:0.6;">
                    <div class="form-text">Slug will update automatically when you rename the category.</div>
                </div>
                <div style="display:flex; gap:10px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Category</button>
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
