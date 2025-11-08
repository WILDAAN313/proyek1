<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | FitLife.id</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-success fw-bold mb-4">FitLife.id</h4>
        <a href="{{ route('admin.dashboard') }}" data-page="dashboard" class="{{ request()->is('admin') ? 'active' : '' }}">🏠 Dashboard</a>
        <a href="{{ route('admin.menu.index') }}" data-page="menu" class="{{ request()->is('admin/menu*') ? 'active' : '' }}">🥗 Menu Sehat</a>
        <a href="{{ route('admin.artikel.index') }}" data-page="artikel" class="{{ request()->is('admin/artikel*') ? 'active' : '' }}">📰 Artikel</a>
        <a href="{{ route('admin.users.index') }}" data-page="users" class="{{ request()->is('admin/users*') ? 'active' : '' }}">👤 Pengguna</a>
        <a href="{{ url('/logout') }}" class="text-danger mt-3">🚪 Log Out</a>
    </div>

    <div class="content">
        <div id="content-area">
            @yield('content')
        </div>
    </div>

   <script>
$(document).ready(function() {
    $('a[data-page]').click(function(e) {
        e.preventDefault();
        const url = $(this).attr('href');

        $('a[data-page]').removeClass('active');
        $(this).addClass('active');

        $('#content-area').html('<div class="text-center p-5">Loading...</div>');

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                              let content = $(response).find('#content-area').html() || response;
                $('#content-area').html(content);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                $('#content-area').html('<div class="text-danger p-5">Gagal memuat halaman.</div>');
            }
        });
    });
});
</script>

</body>
</html>
