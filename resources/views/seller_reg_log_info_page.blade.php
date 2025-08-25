<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Seller login & registration</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/seller_reg_log_info_page.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="cover">
        <div class="header-text"><h1>Steps for Registration</h1></div>
        <div class="boxes" id="box1"><b><u>Step 1 : Personal Details</u></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In First Step you have to fill up your personal details... Like "name", "phone number", and "Address"</div>
        <div class="boxes" id="box2"><b><u>Step 2 : Username & Password Creation</u></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In Second Step you have to create your own "username" and "password" for your Account</div>
        <div class="boxes" id="box3"><b><u>Step 3 : Business Details</u></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In Third Step you have to fill up your Business details... Like "name", "phone number", and "Address" for transactions</div>
        <div class="boxes" id="box4"><b><u>Step 4 : Banking Details</u></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In Fourth Step you have to fill up your Banking details... Like "name", "phone number", and "Address" for transactions</div>
    </div>


    <div class="goback" style="margin-top: 20px;">
        <br>
        <button onclick="exit()">Exit</button>
    </div>

    <div class="continue" style="margin-top: 20px;">
        <br>
        <button onclick="next_page()">Continue</button>
    </div>

    <script src="{{ asset('js/seller_reg_log_info_page.js') }}"></script>
    <script>
        function exit(){
            window.location.href = "{{ route('home') }}";
        }

        function next_page(){
            window.location.href = "{{ route('lrs') }}";
        }
    </script>
</body>
</html>