<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Verification</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/admin_verify_un_ps.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="cover">
        <span class="trikon-bg"></span>

        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21;">Admin Login</h2>
            <form action="{{ route('admin_un_ps_verification_method') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-box animation" style="--i:1; --j:22;">
                    <input type="text" name="username" id="myInput1" placeholder="Enter Your Username" onfocus="showPlaceholder1()" required>
                    <label>Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23;">
                    <input type="password" name="password" id="myInput2" placeholder="Enter Your password" onfocus="showPlaceholder2()" required>
                    <label>password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="loginbtn animation" style="--i:3; --j:24;">Login</button>
                <div class="link animation" style="--i:4; --j:25;">
                    <p style="margin-left: 2px;">Don't have username and password? <a href="{{ route('home') }}" class="register-link">Exit</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2><br>
            <p class="animation" style="--i:1; --j:21;">To learning environment...</p><br>
            <p class="animation" style="--i:2; --j:22;">Unlocking Power</p>
        </div>
    </div>

    <script src="{{ asset('js/admin_verify_un_ps.js') }}"></script>

</body>
</html>