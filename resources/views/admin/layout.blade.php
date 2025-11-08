<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FitLife.id</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            width: 230px;
            height: 100vh;
            background-color: #f2f8f6;
            position: fixed;
            left: 0;
            top: 0;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 8px;
        }
        .sidebar a.active, .sidebar a:hover {
            background-color: #4CAF50;
            color: white;
        }
        .content {
            margin-left: 250px;
            padding: 30px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-success fw-bold mb-4">FitLife.id</h4>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin') ? 'active' : '' }}">🏠 Dashboard</a>
        <a href="{{ route('admin.menu.index') }}" class="{{ request()->is('admin/menu*') ? 'active' : '' }}">🥗 Menu Sehat</a>
        <a href="{{ route('admin.artikel.index') }}" class="{{ request()->is('admin/artikel*') ? 'active' : '' }}">📰 Artikel</a>
        <a href="{{ route('admin.users.index') }}" class="{{ request()->is('admin/users*') ? 'active' : '' }}">👤 Pengguna</a>
        <a href="{{ url('/logout') }}" class="text-danger mt-3 d-block">🚪 Log Out</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <footer class="text-center mt-4">
        <small class="text-muted">© 2025 FitLife.id - Admin Panel</small>
    </footer>
</body>
</html>
