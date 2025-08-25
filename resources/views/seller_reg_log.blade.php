<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Seller login & registration</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/style1.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="cover">
        <span class="trikon-bg"></span>
        <span class="trikon-bg2"></span>

        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21;">Login</h2>
            <form action="generateS" method="post">
                @csrf
                <?php
                    $mno=old('phone_no');
                    if(Session::has('phone_no'))
                    {
                        $mno=Session::get('phone_no');
                    }
                ?>
                <div class="input-box animation" style="--i:1; --j:22;">
                    <input type="text" name="phone_no" id="myInput3" placeholder="Mobile Number with country code" value="{{ $mno }}" onfocus="showPlaceholder3()"  required>
                    <label>Mobile No.</label>
                    <i class='bx bxs-phone'></i>
                    <center><br><button type="submit" id="send_otp" class="otpbtn animation" style="--i:3; --j:24;" <?php if (session('otp_sent')) echo 'disabled';?>>Send otp</button></center>
                </div>
            </form>
            <div class="notification" id="otpNotification">
                OTP has been sent successfully....!
            </div>
            <form action="/loginuserseller" method="post">
                @csrf
                <input type="hidden" name="s_id" value="{{ isset($s_id)?$s_id:'' }}">
                <div class="input-box animation" style="--i:2; --j:23;">
                    <input type="text" name="otp" id="myInput4" placeholder="Enter OTP sent on your mobile no" onfocus="showPlaceholder4()" required>
                    <label>OTP</label>
                    <i class='bx bxs-check-shield'></i>
                </div>
                <button type="submit" class="loginbtn animation" style="--i:3; --j:24;">Login</button>
                <div class="link animation" style="--i:4; --j:25;">
                    <p>Don't have an Account? <a href="#" class="register-link">Sign Up</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2><br>
            <p class="animation" style="--i:1; --j:21;">Shope the world <br>from your Screen</p><br>
            <!-- <p class="animation" style="--i:2; --j:22;"><u>Unlocking Savings <br>and styles</u></p> -->
        </div>

        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
            <form action="datainsertseller" method="post">
                @csrf
                <div class="input-box animation" style="--i:18; --j:1;">
                    <input type="text" name="name" id="myInput" placeholder="Enter Your Full Name" value="{{ old('name') }}" onfocus="showPlaceholder()" required>
                    <label>Name</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:3;">
                    <input type="text" name="phone_no" id="myInput1" placeholder="Mobile Number with country code" value="{{ old('phone_no') }}" onfocus="showPlaceholder1()" required>
                    <label>Mobile No.</label>
                    <i class='bx bxs-phone'></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="text" name="address" id="myInput2" placeholder="Enter Your Full Address" value="{{ old('address') }}" onfocus="showPlaceholder2()" required>
                    <label>Address</label>
                    <i class='bx bxs-home'></i>
                </div>
                <button type="submit" class="loginbtn animation" style="--i:21; --j:4;">Sign Up</button>
                <div class="link animation" style="--i:22; --j:5;">
                    <p>Already have an Account? <a href="#" class="login-link">Login</a></p>
                </div>
            </form>
        </div>
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Welcome!</h2><br>
            <p class="animation" style="--i:18; --j:1;"><u>Shop Smartly...</u></p>
            <p class="animation" style="--i:19; --j:2;"><br>Brands you love,<br>at the prices<br>you'll love even more!</p>
        </div>
    </div>

    <div class="goback" style="margin-top: 20px;">
        <br>
        <a href="{{ route('seller_reg_log_info_page') }}">&lt;&lt;&nbsp;Go Back</a>
    </div>

    <script src="{{ asset('js/script.js') }}"></script>

<script>
    if ('{{ session('otp_sent') }}' && '{{ session('otp_sent_at') }}' && '{{ now()->diffInSeconds(session('otp_sent_at')) }}' < 100) {
        var otpNotification = document.getElementById('otpNotification');
        otpNotification.style.display = 'block';

        setTimeout(function() {
            otpNotification.style.display = 'none';
        }, 100000);
    }
</script>

</body>
</html>