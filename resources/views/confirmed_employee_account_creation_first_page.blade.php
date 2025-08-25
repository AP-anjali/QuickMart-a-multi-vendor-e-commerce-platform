<!-- confirmed_employee_account_creation_first_page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Account Creation</title>
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
            <p class="side-big-headning" style = "text-align: center;">Employee Account</p>
            <p class="primary-bg-text">Now You have to Create Your Employee Account For <br> Further Rights ...!</p>
            <a onclick="window.close();" class="loginbtn">Exit</a>
        </div>
        <form id = "first_form" action="{{ route('employee_account_creation_first_step_submission_route') }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
            @csrf
            <p class="big-headning">Create Employee Account</p>
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
                        <div class="text-fields phone_no">
                            <label for="phone_no"><i class='bx bx-phone-call' style='color:#6487cb'></i></label>
                            <input type="text" name="phone_no" id="phone_no" placeholder="Applied Phone Number" required>
                        </div>
                        <div class="text-fields email">
                            <label for="email"><i class='bx bx-envelope' style='color:#6487cb'></i></label>
                            <input type="text" name="email" id="email" placeholder="Applied Email address" required>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields bank_account_number">
                            <label for="account_number"><i class='bx bxs-bank' style='color:#6487cb'></i></label>
                            <input type="text" name="account_number" id="account_number" placeholder="Applied Account Number" required>
                        </div>
                        <div class="text-fields confirmation_code">
                            <label for="confirmation_code"><i class='bx bxs-check-shield' style='color:#6487cb' ></i></label>
                            <input type="text" name="confirmation_code" id="confirmation_code" placeholder="Enter Confirmation Code" required>
                        </div>
                    </div>
                    <div class="pagination-btns">
                        <input type="submit" value="Verify" class="nextpage stagebtn1b">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="{{ asset('js/confirmed_employee_account_creation_page.js') }}"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>