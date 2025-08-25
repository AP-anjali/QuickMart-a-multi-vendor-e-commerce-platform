<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- <title>Seller Dashboard</title> -->
    @yield("title")
    @yield("style")
    <link rel="shortcut icon" href="{{ asset('seller/assets/img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('seller/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('seller/assets/plugins/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('seller/assets/plugins/icons/flags/flags.css') }}">
    <link rel="stylesheet" href="{{ asset('seller/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('seller/assets/plugins/fontawesome/css/all.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('seller/assets/css/style.css')}}">

    <style>
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 99999999999;
        }

        .sidebar-inner {
            margin-top: 20px;
            border-right: 1px solid rgba(0,0,0,.2);
        }

        #logo_text:hover {
            color: black !important;
            text-decoration : underline;
        }

        #main_page_id{
            padding: 10px; 
            background: #F7F7FA; 
            color: #2C3E50; 
            border: 1px solid rgba(0,0,0,.2); 
            border-radius: 8px; 
            font-weight: 500;
            margin-right: 20px;
            transition: 0.1s all ease;
        }

        #main_page_id:hover{
            border: 1px solid #2C3E50;
            font-weight: 600;
        }

        #logout_menu{
            cursor: pointer;
            color: #6F6F6F;
        }

        #logout_menu:hover{
            color: #3d5ee1;
        }

        li span{
            font-weight: 500;
        }

        li a{
            font-weight: 500;
        }

        .submenu ul li a{
            margin-top: 5px;
        }

    </style>
</head>

<body>

    @include('main_seller_dashboard_header_layout')
    @include('main_seller_dashboard_sidebar_layout')

    @yield('body')

    <script src="{{ asset('seller/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('seller/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('seller/assets/js/feather.min.js') }}"></script>
    <script src="{{ asset('seller/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('seller/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('seller/assets/plugins/apexchart/chart-data.js') }}"></script>
    <script src="{{ asset('seller/assets/js/script.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @yield("script")
</body>

</html>