<!-- employee_login_page_second_step -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/seller_login_page.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login-link">
            <div class="logo">
                <i class='bx bxs-objects-vertical-bottom'></i>
                <span class="text">QUICKMART</span>
            </div>
            <p class="side-big-headning" style = "white-space: nowrap; text-align: center;">Not Applied Yet ?</p>
            <p class="primary-bg-text">In order to login, First You have to <br> apply For Employeement</p>
            <a href="{{ route('employee_application_page') }}" class="loginbtn">Apply Now</a>
        </div>
        <div class="signup-form-container">
            <p class="big-headning">Login to Your Employee Account</p>
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
            
            <form action="{{ route('employee_login_form_un_ps_submission_route', $employee->id) }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
                @csrf
                <div class="login-form-contents">
                    <div class="login-stage-1-content">
                        <div class="text-fields username" id = "phone_num" style = "margin-top:60px;">
                            <label for="username"><i class='bx bxs-user' style='color:#6487cb'></i></label>
                            <input type="text" name="employee_username" id="username" placeholder="Your Account Username" required>
                        </div>
                        <div class="text-fields passwordest" id = "phone_num">
                            <label for="password"><i class='bx bxs-key' style='color:#6487cb'></i></label>
                            <input type="password" name="employee_password" id="password" placeholder="Your Account Password" required>
                            <img src="{{ asset('img/eye-close.png') }}" alt="eye-pic" class = "eye_icon" id = "eyeIcon">
                        </div>
                        <input type="submit" value = "Login" class = "nextpage" id = "userLoginButton">
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</body>
<script>
    document.querySelector(".stageno-1").innerText = "✔";
    document.querySelector(".stageno-1").style.backgroundColor = "#52ec61";

    let eye_icon = document.getElementById("eyeIcon");
    let password = document.getElementById("password");

    eye_icon.onclick = function (){
        if(password.type == "password"){
            password.type = "text";
            // eye_icon.src = "{{ asset('img/eye-open.png') }}";
            eye_icon.src = "{{ asset('img/blue_eye_open_icon.png') }}";
        }else{
            password.type = "password";
            eye_icon.src = "{{ asset('img/eye-close.png') }}";
        }
    }

</script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>