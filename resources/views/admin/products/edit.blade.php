@extends('admin.layouts.app')
@section('title', 'Edit Product')

@section('content')
<div style="max-width:720px;">
    <div class="card">
        <div class="card-header">
            <span><i class="fas fa-pen" style="color:#2dd4bf;margin-right:8px;"></i>Edit Product</span>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div class="form-group" style="grid-column:1/-1;">
                        <label class="form-label">Product Name <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               value="{{ old('name', $product->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category <span style="color:#ef4444;">*</span></label>
                        <select name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" required>
                            <option value="">— Select Category —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">CAS Number</label>
                        <input type="text" name="cas_number" class="form-control" value="{{ old('cas_number', $product->cas_number) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Chemical Formula</label>
                        <input type="text" name="chemical_formula" class="form-control" value="{{ old('chemical_formula', $product->chemical_formula) }}">
                    </div>
                    <div class="form-group" style="grid-column:1/-1;">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="form-group" style="grid-column:1/-1;">
                        <label class="form-label">Product Image</label>
                        @if($product->image)
                            <div style="margin-bottom:10px;">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-preview" style="display:block;" alt="Current Image">
                                <small style="color:#94a3b8; display:block; margin-top:4px;">Current image. Upload a new one to replace it.</small>
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <img id="preview" class="img-preview" style="display:none; margin-top:8px;">
                    </div>
                </div>
                <div style="display:flex; gap:10px; margin-top:4px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update Product</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const prev = document.getElementById('preview');
        prev.src = URL.createObjectURL(file);
        prev.style.display = 'block';
    }
});
</script>
@endpush
@endsection
