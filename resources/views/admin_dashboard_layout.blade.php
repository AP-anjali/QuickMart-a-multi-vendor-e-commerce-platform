<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Admin Dashboard</title> -->
    @yield("title")
    @yield("style")
    <link rel="stylesheet" href="{{ asset('cssfiles/admin_dashboard.css') }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    @include('admin_dashboard_sidebar_layout')

    @include('admin_dashboard_uppar-menu_layout')

    @yield('body')

    <script src="{{ asset('js/admin_dashboard.js') }}"></script>
    
</body>
</html>