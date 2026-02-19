@extends('admin.layouts.app')
@section('title', 'Inquiries')

@section('content')
<div class="card">
    <div class="card-header">
        <span><i class="fas fa-envelope" style="color:#2dd4bf;margin-right:8px;"></i>All Inquiries</span>
        <span class="badge badge-blue">{{ $inquiries->total() }} total</span>
    </div>
    <div class="card-body" style="padding:0;">
        @if($inquiries->isEmpty())
            <div style="padding:40px; text-align:center; color:#94a3b8;">
                <i class="fas fa-inbox" style="font-size:2.5rem; margin-bottom:12px; display:block; opacity:0.3;"></i>
                No inquiries received yet.
            </div>
        @else
        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Message</th><th>Received</th><th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inquiries as $inq)
                    <tr>
                        <td style="color:#94a3b8;">{{ $inq->id }}</td>
                        <td><strong>{{ $inq->name }}</strong></td>
                        <td><a href="mailto:{{ $inq->email }}" style="color:#2dd4bf; text-decoration:none;">{{ $inq->email }}</a></td>
                        <td>{{ $inq->phone ?? '—' }}</td>
                        <td style="max-width:280px;">
                            <details>
                                <summary style="cursor:pointer; color:#64748b; font-size:0.83rem; list-style:none;">
                                    {{ Str::limit($inq->message, 55) }}
                                </summary>
                                <div style="margin-top:8px; padding:10px; background:#f8fafc; border-radius:6px; font-size:0.83rem; color:#1e293b; white-space:pre-wrap;">{{ $inq->message }}</div>
                            </details>
                        </td>
                        <td style="color:#94a3b8; white-space:nowrap;">
                            {{ $inq->created_at->format('d M Y') }}<br>
                            <small>{{ $inq->created_at->format('H:i') }}</small>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.inquiries.destroy', $inq) }}" onsubmit="return confirm('Delete this inquiry?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div style="padding:16px 20px;">{{ $inquiries->links() }}</div>
        @endif
    </div>
</div>
@endsection
