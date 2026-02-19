@extends('admin.layouts.app')
@section('title', 'Products')

@section('content')
<div class="card">
    <div class="card-header">
        <span><i class="fas fa-flask" style="color:#2dd4bf;margin-right:8px;"></i>All Products</span>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Product</a>
    </div>
    <div class="card-body" style="padding:0;">
        @if($products->isEmpty())
            <div style="padding:40px; text-align:center; color:#94a3b8;">
                <i class="fas fa-flask" style="font-size:2.5rem; margin-bottom:12px; display:block; opacity:0.3;"></i>
                No products yet. <a href="{{ route('admin.products.create') }}" style="color:#2dd4bf;">Add your first product.</a>
            </div>
        @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Image</th><th>Name</th><th>Category</th><th>CAS No.</th><th>Formula</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="thumb">
                            @else
                                <div class="thumb-placeholder"><i class="fas fa-flask"></i></div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $product->name }}</strong>
                            <br><small style="color:#94a3b8;">{{ Str::limit($product->description, 60) }}</small>
                        </td>
                        <td><span class="badge badge-teal">{{ $product->category->name ?? '—' }}</span></td>
                        <td style="font-family:monospace; font-size:0.82rem; color:#64748b;">{{ $product->cas_number ?? '—' }}</td>
                        <td style="font-family:monospace; font-size:0.82rem; color:#64748b;">{{ $product->chemical_formula ?? '—' }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" style="display:inline;" onsubmit="return confirm('Delete this product?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding:16px 20px;">{{ $products->links() }}</div>
        @endif
    </div>
</div>
@endsection
