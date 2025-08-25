<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/menustyle.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
        <span class="one animate-left" style="margin:-100px 0 0 40px; font-size:32px;">Hey there, I'm <p style="display:inline; border-bottom: 1px solid #540000;">Anjali Patel</p>, and <br>I'm excited to introduce you to <br>this application named [QUICKMART]</span><br><br>
        <span class="one animate-left" style="font-size:28px;"><br>QUICKMART is an e-commerce application <br>dedicated to facilitate online sales and purchase activities<br>of number of products...</span>
    </div>
    <img id="sliding-image-a" class="contact" src="{{ asset('img/A.png') }}" alt="photu he bhai">
    <script>
        window.addEventListener('load', function () {
            var img = document.getElementById('sliding-image-a');
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