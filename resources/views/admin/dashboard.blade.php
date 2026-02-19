@extends('admin.layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon teal"><i class="fas fa-flask"></i></div>
        <div>
            <div class="stat-value">{{ $stats['products'] }}</div>
            <div class="stat-label">Total Products</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon blue"><i class="fas fa-tags"></i></div>
        <div>
            <div class="stat-value">{{ $stats['categories'] }}</div>
            <div class="stat-label">Categories</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon amber"><i class="fas fa-envelope"></i></div>
        <div>
            <div class="stat-value">{{ $stats['inquiries'] }}</div>
            <div class="stat-label">Inquiries</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <span><i class="fas fa-clock" style="color:#2dd4bf;margin-right:8px;"></i>Recent Inquiries</span>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-secondary">View All</a>
    </div>
    <div class="card-body" style="padding:0;">
        @if($recentInquiries->isEmpty())
            <div style="padding:32px; text-align:center; color:#94a3b8; font-size:0.9rem;">
                <i class="fas fa-inbox" style="font-size:2rem; margin-bottom:10px; display:block;"></i> No inquiries yet.
            </div>
        @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentInquiries as $inq)
                    <tr>
                        <td><strong>{{ $inq->name }}</strong></td>
                        <td>{{ $inq->email }}</td>
                        <td>{{ $inq->phone ?? '—' }}</td>
                        <td style="max-width:260px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">{{ $inq->message }}</td>
                        <td style="color:#94a3b8;">{{ $inq->created_at->format('d M Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

<div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-top:20px;">
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary" style="justify-content:center; padding:14px;"><i class="fas fa-plus"></i> Add New Product</a>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-secondary" style="justify-content:center; padding:14px;"><i class="fas fa-plus"></i> Add New Category</a>
</div>
@endsection
