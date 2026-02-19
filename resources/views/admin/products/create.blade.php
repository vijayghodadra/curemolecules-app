@extends('admin.layouts.app')
@section('title', 'Add Product')

@section('content')
<div style="max-width:720px;">
    <div class="card">
        <div class="card-header">
            <span><i class="fas fa-plus" style="color:#2dd4bf;margin-right:8px;"></i>Add New Product</span>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div class="form-group" style="grid-column:1/-1;">
                        <label class="form-label">Product Name <span style="color:#ef4444;">*</span></label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                               value="{{ old('name') }}" placeholder="e.g. Aspirin" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category <span style="color:#ef4444;">*</span></label>
                        <select name="category_id" class="form-control {{ $errors->has('category_id') ? 'is-invalid' : '' }}" required>
                            <option value="">— Select Category —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">CAS Number</label>
                        <input type="text" name="cas_number" class="form-control" value="{{ old('cas_number') }}" placeholder="e.g. 50-78-2">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Chemical Formula</label>
                        <input type="text" name="chemical_formula" class="form-control" value="{{ old('chemical_formula') }}" placeholder="e.g. C₉H₈O₄">
                    </div>
                    <div class="form-group" style="grid-column:1/-1;">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" placeholder="Product description...">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group" style="grid-column:1/-1;">
                        <label class="form-label">Product Image</label>
                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}"
                               accept="image/*" id="imageInput">
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <img id="preview" class="img-preview" style="display:none;">
                    </div>
                </div>
                <div style="display:flex; gap:10px; margin-top:4px;">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Product</button>
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
