@extends('admin.layouts.app')
@section('title', 'Categories')

@section('content')
<div class="card">
    <div class="card-header">
        <span><i class="fas fa-tags" style="color:#2dd4bf;margin-right:8px;"></i>All Categories</span>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Add Category</a>
    </div>
    <div class="card-body" style="padding:0;">
        @if($categories->isEmpty())
            <div style="padding:40px; text-align:center; color:#94a3b8;">
                <i class="fas fa-tags" style="font-size:2.5rem; margin-bottom:12px; display:block; opacity:0.3;"></i>
                No categories yet. <a href="{{ route('admin.categories.create') }}" style="color:#2dd4bf;">Add your first category.</a>
            </div>
        @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th><th>Name</th><th>Slug</th><th>Products</th><th>Created</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td style="color:#94a3b8;">{{ $category->id }}</td>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td><span class="badge badge-teal">{{ $category->slug }}</span></td>
                        <td><span class="badge badge-blue">{{ $category->products_count }}</span></td>
                        <td style="color:#94a3b8;">{{ $category->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i> Edit</a>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" style="display:inline;" onsubmit="return confirm('Delete this category?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding:16px 20px;">{{ $categories->links() }}</div>
        @endif
    </div>
</div>
@endsection
