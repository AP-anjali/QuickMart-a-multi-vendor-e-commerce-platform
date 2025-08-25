<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Team Member Login</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/seller_login_page.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">

        @if(session('showLoginAlert'))
                <script>
                    alert('To access further pages, please login first');
                    {!! session()->forget('showLoginAlert') !!}
                </script>
        @endif
        
        <div class="login-link">
            <div class="logo">
                <i class='bx bxs-objects-vertical-bottom'></i>
                <span class="text">QUICKMART</span>
            </div>
            <p class="side-big-headning" style = "white-space: nowrap; text-align: center;">Not Applied Yet ?</p>
            <p class="primary-bg-text">In order to login, First You have to <br> apply For Delivery Job</p>
            <a href="{{ route('delivery_team_application_page') }}" class="loginbtn">Apply Now</a>
        </div>

        <div class="signup-form-container">
            @csrf
            <p class="big-headning">Login to Your Delivery Team Account</p>
            <div class="progress-bar">
                <div class="stage">
                    <p class="tool-tip" style = "margin-left : -30px;">Phone No. Verification</p>
                    <p class="stageno stageno-1" style = "margin-left : -30px;">1</p>
                </div>
                <div class="stage">
                    <p class="tool-tip" style = "white-space: nowrap; margin-left : 70px;">Username & Password Verification</p>
                    <p class="stageno stageno-3" style = "margin-left: 70px;">2</p>
                </div>
            </div>
            
            <form action="{{ route('delivery_team_member_login_form_phone_no_submission_route') }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
                @csrf
                <?php
                    $mno=old('phone_no');
                    if(Session::has('phone_no'))
                    {
                        $mno=Session::get('phone_no');
                    }
                ?>
                <div class="login-form-contents">
                    <div class="login-stage-1-content">
                        <div class="text-fields phone_no" id = "phone_num">
                            <label for="phone_no"><i class='bx bx-phone-call' style='color:#6487cb'></i></label>
                            <input type="text" name="phone_no" id="phone_no" value="{{ $mno }}" placeholder="Phone number with +91" required>
                        </div>
                        <input type="submit" value = "Send OTP" class = "nextpage" id = "sendOtpButton">
                    </div>
                </div>
            </form>
            <form action="{{ route('delivery_team_member_login_otp_verification_route') }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="d_id" value="{{ isset($d_id)?$d_id:'' }}">
                    <div class="text-fields otp" id = "otpotp">
                        <label for="otp"><i class='bx bxs-check-shield' style='color:#6487cb'></i></label>
                        <input type="text" name="otp" id="otp" placeholder="Enter Received OTP" required>
                    </div>
                    <input type="submit" value = "Verify" class = "nextpage" id = "verifyButton">
            </form>
        </div>
        
    </div>
</body>
<script src="{{ asset('js/seller_login_page.js') }}"></script>
<script>
        // Function to display OTP sent alert
        function showOtpSentAlert(phoneNumber) {
            alert('OTP has been sent to ' + phoneNumber);
        }

        // Check if the 'otp_sent' flash message exists and display the alert
        @if(session('otp_sent'))
            var phoneNumber = @json(Session::get('phone_no'));
            showOtpSentAlert(phoneNumber);
        @endif

        document.addEventListener('DOMContentLoaded', function() {
            var textFields = document.querySelectorAll('.text-fields input');

            textFields.forEach(function(input) {
                input.addEventListener('focus', function() {
                    this.parentElement.style.borderColor = '#696cff';
                });

                input.addEventListener('blur', function() {
                    this.parentElement.style.borderColor = ''; 
                });
            });
        });
    </script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>