<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Applicant Account Creation</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/confirmed_employee_account_creation_page.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login-link" id = "loginLink">
            <div class="logo">
                <i class='bx bxs-objects-vertical-bottom'></i>
                <span class="text">QUICKMART</span>
            </div>
            <p class="side-big-headning" style = "text-align: center; white-space: nowrap;">Delivery Partner Account</p>
            <p class="primary-bg-text">Now You have to Create Your <br> Delivery Partner Account <br> For Further Rights ...!</p>
            <a onclick="window.close();" class="loginbtn">Exit</a>
        </div>
        <form action="{{ route('delivery_applicant_account_creation_second_step_submission_route', $delivery_applicant_id) }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
            @csrf
            <p class="big-headning">Create Delivery Partner Account</p>
            <div class="social-media-platform">
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
            </div>
            <div class="progress-bar">
                <div class="stage">
                    <p class="tool-tip" style = "white-space : nowrap;">Verify Confirmation Code</p>
                    <p class="stageno stageno-1">1</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Username & password</p>
                    <p class="stageno stageno-2">2</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Account Creation</p>
                    <p class="stageno stageno-3">3</p>
                </div>
            </div>
            <div class="signup-form-content">
                <div class="stage1-content">
                    <div class="button-container">
                        <div class="text-fields username" style = "width: 290px;">
                            <label for="username"><i class='bx bxs-user' style='color:#6487cb'></i></label>
                            <input type="text" name="username" id="username" placeholder="Create Own Username" required>
                        </div>
                        <div class="text-fields password" style = "width: 290px;">
                            <label for="password"><i class='bx bxs-key' style='color:#6487cb' ></i></label>
                            <input type="password" name="password" id="password" placeholder="Create Own Password" required>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields confirm_password khaskao">
                            <label for="confirm_password"><i class='bx bxs-check-shield' style='color:#6487cb' ></i></label>
                            <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter Password Again" required>
                        </div>
                    </div> 
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previouspage stagebtn1a">
                        <input type="button" value="Next" class="nextpage stagebtn1b" onclick = "stage1to2()" style = "margin-left: -20px; margin-top: 20px;">
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
                        <input type="submit" value="Create Account" class="nextpage stagebtn2b">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="{{ asset('js/confirmed_delivery_applicant_account_creation_second_page.js') }}"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>