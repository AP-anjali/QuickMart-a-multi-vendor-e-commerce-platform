<!-- <h1>Hello customer_registration_page</h1> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/customer_registration_page.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login-link" id = "loginLink">
            <div class="logo">
                <i class='bx bxs-objects-vertical-bottom'></i>
                <span class="text">QUICKMART</span>
            </div>
            <p class="side-big-headning">Already a member?</p>
            <p class="primary-bg-text">To keep track on your dashboard, please login with your personal info</p>
            <a href="{{ route('customer_login_page') }}" class="loginbtn">Login</a>
        </div>
        <form action="{{ route('customer_registration_form_submission_route') }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
            @csrf
            <p class="big-headning">Create Account</p>
            <div class="social-media-platform">
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
            </div>
            <div class="progress-bar">
                <div class="stage">
                    <p class="tool-tip">Registartion</p>
                    <p class="stageno stageno-1">1</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Submission</p>
                    <p class="stageno stageno-2">2</p>
                </div>
            </div>
            <div class="signup-form-content">
                <div class="stage1-content">
                    <div class="button-container">
                        <div class="text-fields name">
                            <label for="name"><i class='bx bx-user-circle' style='color:#6487cb'></i></label>
                            <input type="text" name="name" id="name" placeholder="Your full name" required>
                        </div>
                        <div class="text-fields email">
                            <label for="email"><i class='bx bx-envelope' style='color:#6487cb'></i></label>
                            <input type="text" name="email" id="email" placeholder="Your email address" required>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields phone_no">
                            <label for="phone_no"><i class='bx bx-phone-call' style='color:#6487cb'></i></label>
                            <input type="text" name="phone_no" id="phone_no" placeholder="Phone number with +91" required>
                        </div>
                        <div class="text-fields address">
                            <label for="address"><i class='bx bxl-periscope' style='color:#6487cb' ></i></label>
                            <input type="text" name="address" id="address" placeholder="Your Business address" required>
                        </div>
                    </div>
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previouspage stagebtn1a">
                        <input type="button" value="Next" class="nextpage stagebtn1b" onclick = "stage1to2()">
                    </div>
                </div>
                <div class="stage2-content">
                    <div class="tc-container">
                        <label for="tc" class="tc">
                            <input type="checkbox" name="tc" id="tc" required>
                            By submitting your details, you agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                    <br>
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previouspage stagebtn2a" onclick = "stage2to1()">
                        <input type="submit" value="Submit" class="nextpage stagebtn2b">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="{{ asset('js/customer_registration_page.js') }}"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>