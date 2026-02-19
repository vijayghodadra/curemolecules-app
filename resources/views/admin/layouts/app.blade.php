<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — @yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --sidebar-bg: #0f172a;
            --sidebar-hover: #1e293b;
            --sidebar-active: #2dd4bf;
            --sidebar-text: #94a3b8;
            --sidebar-text-active: #ffffff;
            --topbar-bg: #ffffff;
            --body-bg: #f1f5f9;
            --card-bg: #ffffff;
            --primary: #2dd4bf;
            --primary-dark: #0d9488;
            --danger: #ef4444;
            --success: #22c55e;
            --warning: #f59e0b;
            --info: #3b82f6;
            --text: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --sidebar-w: 250px;
        }
        body { font-family: 'Segoe UI', system-ui, sans-serif; background: var(--body-bg); color: var(--text); display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            min-height: 100vh;
            position: fixed;
            top: 0; left: 0; bottom: 0;
            display: flex; flex-direction: column;
            z-index: 100;
            transition: transform 0.3s;
        }
        .sidebar-logo {
            padding: 24px 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-logo .brand { font-size: 1.2rem; font-weight: 800; color: #fff; letter-spacing: 0.5px; }
        .sidebar-logo .brand span { color: var(--primary); }
        .sidebar-logo small { color: var(--sidebar-text); font-size: 0.72rem; letter-spacing: 1px; text-transform: uppercase; }

        .sidebar-nav { flex: 1; padding: 16px 12px; overflow-y: auto; }
        .nav-section-label {
            font-size: 0.65rem; font-weight: 700; letter-spacing: 1.5px;
            text-transform: uppercase; color: #475569; padding: 16px 8px 8px;
        }
        .sidebar-nav a {
            display: flex; align-items: center; gap: 12px;
            padding: 10px 12px; border-radius: 8px; margin-bottom: 2px;
            color: var(--sidebar-text); text-decoration: none; font-size: 0.9rem; font-weight: 500;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar-nav a:hover { background: var(--sidebar-hover); color: #e2e8f0; }
        .sidebar-nav a.active { background: rgba(45,212,191,0.12); color: var(--primary); }
        .sidebar-nav a .icon { width: 18px; text-align: center; font-size: 0.95rem; }
        .sidebar-nav a .badge {
            margin-left: auto; background: var(--primary); color: #0f172a;
            font-size: 0.65rem; font-weight: 700; padding: 2px 7px; border-radius: 999px;
        }
        .sidebar-footer {
            padding: 16px 12px; border-top: 1px solid rgba(255,255,255,0.06);
        }
        .sidebar-footer form button {
            width: 100%; display: flex; align-items: center; gap: 10px;
            padding: 10px 12px; border-radius: 8px; background: rgba(239,68,68,0.1);
            color: #f87171; border: none; cursor: pointer; font-size: 0.9rem; font-weight: 500;
            transition: background 0.2s;
        }
        .sidebar-footer form button:hover { background: rgba(239,68,68,0.2); }

        /* Main layout */
        .main-wrapper { margin-left: var(--sidebar-w); flex: 1; display: flex; flex-direction: column; min-height: 100vh; }

        /* Topbar */
        .topbar {
            background: var(--topbar-bg); border-bottom: 1px solid var(--border);
            padding: 0 28px; height: 64px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 50;
            box-shadow: 0 1px 4px rgba(0,0,0,0.06);
        }
        .topbar-title { font-size: 1.15rem; font-weight: 700; color: var(--text); }
        .topbar-right { display: flex; align-items: center; gap: 16px; }
        .admin-avatar {
            width: 36px; height: 36px; border-radius: 50%; background: var(--primary);
            display: flex; align-items: center; justify-content: center;
            color: #0f172a; font-weight: 700; font-size: 0.85rem;
        }

        /* Page content */
        .page-content { padding: 28px; flex: 1; }

        /* Cards */
        .card {
            background: var(--card-bg); border-radius: 12px; border: 1px solid var(--border);
            box-shadow: 0 1px 6px rgba(0,0,0,0.04); overflow: hidden;
        }
        .card-header {
            padding: 16px 20px; border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            font-weight: 600; font-size: 0.95rem;
        }
        .card-body { padding: 20px; }

        /* Stat cards */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 28px; }
        .stat-card {
            background: var(--card-bg); border-radius: 14px; padding: 22px;
            border: 1px solid var(--border); display: flex; align-items: center; gap: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .stat-icon { width: 52px; height: 52px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0; }
        .stat-icon.teal { background: rgba(45,212,191,0.12); color: var(--primary); }
        .stat-icon.blue { background: rgba(59,130,246,0.12); color: var(--info); }
        .stat-icon.amber { background: rgba(245,158,11,0.12); color: var(--warning); }
        .stat-icon.green { background: rgba(34,197,94,0.12); color: var(--success); }
        .stat-value { font-size: 2rem; font-weight: 800; color: var(--text); line-height: 1; }
        .stat-label { font-size: 0.82rem; color: var(--text-muted); margin-top: 4px; }

        /* Table */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 0.88rem; }
        thead th { background: #f8fafc; padding: 10px 14px; text-align: left; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.8px; color: var(--text-muted); font-weight: 600; border-bottom: 1px solid var(--border); }
        tbody td { padding: 12px 14px; border-bottom: 1px solid var(--border); vertical-align: middle; }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #f8fafc; }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 6px; padding: 8px 16px; border-radius: 8px; font-size: 0.85rem; font-weight: 600; text-decoration: none; border: none; cursor: pointer; transition: all 0.2s; }
        .btn-sm { padding: 5px 12px; font-size: 0.8rem; }
        .btn-primary { background: var(--primary); color: #0f172a; }
        .btn-primary:hover { background: var(--primary-dark); color: #fff; }
        .btn-danger { background: rgba(239,68,68,0.1); color: var(--danger); border: 1px solid rgba(239,68,68,0.2); }
        .btn-danger:hover { background: var(--danger); color: #fff; }
        .btn-secondary { background: #f1f5f9; color: var(--text); border: 1px solid var(--border); }
        .btn-secondary:hover { background: #e2e8f0; }
        .btn-warning { background: rgba(245,158,11,0.1); color: var(--warning); border: 1px solid rgba(245,158,11,0.2); }
        .btn-warning:hover { background: var(--warning); color: #fff; }

        /* Forms */
        .form-group { margin-bottom: 18px; }
        .form-label { display: block; font-size: 0.83rem; font-weight: 600; color: var(--text); margin-bottom: 6px; }
        .form-control {
            width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: 8px;
            font-size: 0.9rem; color: var(--text); background: #fff; transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(45,212,191,0.12); }
        textarea.form-control { resize: vertical; min-height: 100px; }
        .form-text { font-size: 0.75rem; color: var(--text-muted); margin-top: 4px; }
        .is-invalid { border-color: var(--danger) !important; }
        .invalid-feedback { color: var(--danger); font-size: 0.78rem; margin-top: 4px; }

        /* Alerts */
        .alert { padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; font-size: 0.88rem; font-weight: 500; }
        .alert-success { background: rgba(34,197,94,0.1); color: #16a34a; border: 1px solid rgba(34,197,94,0.2); }
        .alert-danger  { background: rgba(239,68,68,0.1); color: #dc2626; border: 1px solid rgba(239,68,68,0.2); }

        /* Badge */
        .badge { display: inline-block; padding: 3px 10px; border-radius: 999px; font-size: 0.72rem; font-weight: 600; }
        .badge-teal { background: rgba(45,212,191,0.12); color: var(--primary-dark); }
        .badge-blue { background: rgba(59,130,246,0.12); color: #2563eb; }

        /* Thumbnail */
        .thumb { width: 44px; height: 44px; object-fit: cover; border-radius: 8px; border: 1px solid var(--border); }
        .thumb-placeholder { width: 44px; height: 44px; border-radius: 8px; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #cbd5e1; border: 1px solid var(--border); }

        /* Pagination */
        .pagination { display: flex; gap: 4px; margin-top: 20px; justify-content: center; }
        .pagination .page-link { padding: 6px 12px; border-radius: 6px; border: 1px solid var(--border); color: var(--text); text-decoration: none; font-size: 0.83rem; transition: all 0.2s; }
        .pagination .page-link:hover, .pagination .active .page-link { background: var(--primary); color: #0f172a; border-color: var(--primary); }

        /* Image preview */
        .img-preview { max-height: 100px; max-width: 200px; border-radius: 8px; margin-top: 8px; border: 1px solid var(--border); }
    </style>
    @stack('styles')
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-logo">
        <div class="brand">DEV<span>SEAS</span></div>
        <small>Admin Panel</small>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-section-label">Main</div>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span class="icon"><i class="fas fa-chart-line"></i></span> Dashboard
        </a>
        <div class="nav-section-label">Catalogue</div>
        <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <span class="icon"><i class="fas fa-tags"></i></span> Categories
        </a>
        <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <span class="icon"><i class="fas fa-flask"></i></span> Products
        </a>
        <div class="nav-section-label">Communication</div>
        <a href="{{ route('admin.inquiries.index') }}" class="{{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
            <span class="icon"><i class="fas fa-envelope"></i></span> Inquiries
        </a>
    </nav>
    <div class="sidebar-footer">
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit"><i class="fas fa-right-from-bracket"></i> Logout</button>
        </form>
    </div>
</aside>

<!-- Main -->
<div class="main-wrapper">
    <header class="topbar">
        <div class="topbar-title">@yield('title', 'Dashboard')</div>
        <div class="topbar-right">
            <span style="font-size:0.82rem; color: var(--text-muted);">Welcome, {{ auth()->user()->name }}</span>
            <div class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
        </div>
    </header>

    <main class="page-content">
        @if(session('success'))
            <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger"><i class="fas fa-circle-exclamation"></i> {{ session('error') }}</div>
        @endif

        @yield('content')
    </main>
</div>

@stack('scripts')
</body>
</html>
