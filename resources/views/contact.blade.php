<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/menustyle.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .l{
            margin:-70px 0 0 50px;
        }
        .link a{
            color:#540000;
            text-decoration:none;
            font-size:32px;
        }
        .link a:hover{
            /* color:#0ef; */
            text-decoration:underline;
            text-shadow: 0 0 30px #540000;
            /* font-size:34px; */
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"><i><a href="#">QUICKMART</a></i></div>
            <ul class="menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ route('lrc') }}">Sign In/Sign Up</a></li>
                <li><a href="{{ route('seller_login_page') }}">Join as a Seller</a></li>
                <li><a href="{{ route('delivery_team_info_page') }}">Delivery Team</a></li>
                <li><a href="{{ route('help') }}">Help&nbsp;<i class='bx bx-question-mark'></i></a></li>
            </ul>
        </div>
    </nav>

    <div class="aadu">
        <span class="one animate-left l">Contact Us On : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+91 7046106554</span><br><br>
        <span class="one animate-left">E-mail Address : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;anjalipatel@gmail.com</span><br><br>
        <span class="one animate-left link">Linkedin ID : <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.linkedin.com/in/anjali-patel-a95996264">www.linkedin.com/in/anjali-patel-a95996264</a></span>
    </div>
    <img id="sliding-image" class="contact" src="{{ asset('img/contact.png') }}" alt="photu he bhai" style="margin:-350px 0 0 800px; border-bottom:2px solid #540000;">
    <script>
        window.addEventListener('load', function () {
            var img = document.getElementById('sliding-image');
            img.style.animation = 'slideDown 1s ease-in-out';
        });
    </script>

    <script>
        window.addEventListener('load', function () {
            var spans = document.querySelectorAll('.animate-left');
            spans.forEach(function (span) {
                span.style.animation = 'slideLeft 1s ease-in-out';
            });
        });
    </script>
</body>
</html>