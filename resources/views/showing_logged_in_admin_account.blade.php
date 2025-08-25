<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $admin_data->admin_name }} | ADMIN</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">
   <style>
        .msg{
            width: 40%;
            height: 50px;
            color: green;
            text-align: center;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-left: 28%;
            margin-top: 30px;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }

        #popup-btn{
            height: 80%;
            margin-bottom: 8px;
            width: 30px;
            padding-bottom: 4px;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            background: rgba(0,0,0,.2);
            margin-left: 10%;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .msg2{
            width: 50%;
            height: 50px;
            color: #FF474C;
            text-align: center;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-left: 25%;
            margin-top: 50px;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }
        #popup-btn2{
            height: 80%;
            margin-bottom: 8px;
            color: #FF474C;
            width: 30px;
            padding-bottom: 4px;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            background: rgba(0,0,0,.2);
            margin-left: 10%;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .msg3{
            width: 80%;
            height: 50px;
            color: #663a82;
            text-align: center;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-left: 10%;
            margin-top: 50px;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }
        #popup-btn3{
            height: 80%;
            margin-bottom: 8px;
            color: #663a82;
            width: 30px;
            padding-bottom: 4px;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            background: rgba(0,0,0,.2);
            margin-left: 9%;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .eye_icon{
            width: 25px;
            cursor: pointer;
            margin: 0 0 0 80px;
        }
   </style>
</head>
<body class = "active">

@include('website_menu')

<script>
    console.log("checking script !");
    function checkFormChanges(){
        let name = "{{ $admin_data->admin_name }}";
        let email = "{{ $admin_data->admin_email }}";
        let phone_no = "{{ $admin_data->admin_phone_no }}";
        let address = "{{ $admin_data->admin_address }}";
        let original_profile_pic = "{{ $admin_data->profile_pic }}";

        let username = "{{ $admin_data->username }}";
        let confirm_password = "{{ $admin_data->password }}";


        let input_name = document.getElementById('name').value;
        let input_email = document.getElementById('email').value;
        let input_phone_no = document.getElementById('phone_no').value;
        let input_address = document.getElementById('address').value;
        let new_profile_pic = document.getElementById('fileInput').files[0];

        let input_username = document.getElementById('username').value;
        let input_confirm_password = document.getElementById('confirm_password').value;       

        let reset_btn_slot = document.getElementById('id_for_enable_desable_reset_btn');
        let save_changes_btn_slot = document.getElementById('id_for_enable_desable_save_changes_btn');

        if(input_name === name && input_email === email &&  input_phone_no === phone_no &&  input_address === address && (!new_profile_pic || new_profile_pic.name === original_profile_pic)
        && input_username === username && input_confirm_password === confirm_password) {
            console.log("Badhu Barabar chhe");
            reset_btn_slot.classList.add("disabled_due_to_same_data");
            save_changes_btn_slot.classList.add("disabled_due_to_same_data");
        }
        else {
            console.log("Kasu barabar nathi");
            reset_btn_slot.classList.remove("disabled_due_to_same_data");
            save_changes_btn_slot.classList.remove("disabled_due_to_same_data");
        }
    }

    window.addEventListener('DOMContentLoaded', (event) => {
        const msg1 = document.getElementById('msg1');
        if (msg1) {
            const scrollPosition = msg1.offsetTop - 120;
            window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
        }
    });

    window.addEventListener('DOMContentLoaded', (event) => {
        const secured_data_that_need_user_verification = document.getElementById('secured_data_that_need_user_verification');
        if (secured_data_that_need_user_verification) {
            const scrollPosition = secured_data_that_need_user_verification.offsetTop - 120;
            window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
        }
    });

    window.addEventListener('DOMContentLoaded', (event) => {
        const email_verification_form_that_will_be_dispalyed_when_an_email_has_been_sent = document.getElementById('email_verification_form_that_will_be_dispalyed_when_an_email_has_been_sent');
        if (email_verification_form_that_will_be_dispalyed_when_an_email_has_been_sent) {
            const scrollPosition = email_verification_form_that_will_be_dispalyed_when_an_email_has_been_sent.offsetTop - 120;
            window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
        }
    });
</script>

<section class="contact"> <!-- customer_account -->

    @if(Session()->has('admin_record_to_update'))
        <div class="msg" id="msg1">
            {{session()->get('admin_record_to_update')}}
            <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
        </div>
    @endif


    <div class="customer_account_main_container">

        <form action="{{ route('updating_admin_user_record_from_admin_page_form_submission', $admin_data->id) }}" method = "post" enctype="multipart/form-data" id="accountDetailsForm">
            @csrf
            <div class="Account_Details_heading">
                <h2>Admin Account Details</h2>
            </div>

            <div class="customer_account_image_slot_container">
                <img src="{{ asset('storage/' . $admin_data->profile_pic) }}" alt="User Profile Pic">
                <div class="custom-file-upload">
                    <input type="file" name = "profile_pic" id="fileInput" onchange="showFileName(this); checkFormChanges();" />
                    <label for="fileInput" class="custom-button">UPLOAD NEW PHOTO</label>
                    <span id="fileName"></span>
                </div>
            </div>
            <hr>

            <div class="users_info_container">
                <div class="Account_Details_heading_Personal_Information">
                    <h2>Basic Personal Information</h2>
                </div>
                <div class="button-container">
                    <div class="text-fields name">
                        <label for="name"><i class='bx bx-user-circle bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="admin_name" id="name" value = "{{ $admin_data->admin_name }}" placeholder="Your full name" required oninput="checkFormChanges()">
                    </div>
                    <div class="text-fields email">
                        <label for="email"><i class='bx bx-envelope bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="admin_email" id="email" value = "{{ $admin_data->admin_email }}" placeholder="Your Email Address" required oninput="checkFormChanges()">
                    </div>
                </div>

                <div class="button-container">
                    <div class="text-fields phone_no">
                        <label for="phone_no"><i class='bx bx-phone-call bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="admin_phone_no" id="phone_no" value = "{{ $admin_data->admin_phone_no }}" placeholder="Phone number with +91" required oninput="checkFormChanges()">
                    </div>
                    <div class="text-fields address">
                        <label for="address"><i class='bx bxl-periscope bx-md' style='color:#6487cb' ></i></label>
                        <input type="text" name="admin_address" id="address" value = "{{ $admin_data->admin_address }}" placeholder="Your Business address" required oninput="checkFormChanges()">
                    </div>
                </div>

                @if(Session::has('verification_code_correct'))
                    <div id="secured_data_that_need_user_verification">
                        <!-- ---------------------------------------- -->
                        <div class="Account_Details_heading_Personal_Information" style = "margin-top: 15px;">
                            <h2>Username & Password Information</h2>
                        </div>

                        <div class="button-container">
                            <div class="text-fields username">
                                <label for="username"><i class='bx bxs-user bx-md' style='color:#6487cb'></i></label>
                                <input type="text" name="username" id="username" value = "{{ $admin_data->username }}" placeholder="Create Own Username" required oninput="checkFormChanges()">
                            </div>

                            <div class="text-fields confirm_password">
                                <label for="confirm_password"><i class='bx bxs-key bx-md' style='color:#6487cb' ></i></label>
                                <input type="password" name="password" id="confirm_password" value = "{{ $admin_data->password }}" placeholder="Enter Password" required oninput="checkFormChanges()">
                                <img src="{{ asset('img/eye-close.png') }}" alt="eye-pic" class = "eye_icon" id = "eyeIcon">
                            </div>
                        </div>

                        <!-- ================ -->
                        <!-- ================ -->
                            
                        <div class="button-container customer_account_creation_info_slot" style = "margin-top: 60px;">
                            <div class = "customer_account_creation">
                                <h2>Account Created At &nbsp;| </h2>
                            </div>
                            <div class = "customer_account_creation_date">
                                <h2><?php echo date("d/m/Y, h:i:s A", strtotime($admin_data->created_at)); ?></h2>
                            </div>
                        </div>

                        <div class="change_reset_btn_slot">
                            <div class="button-container">
                                <div class = "customer_account_save_changes disabled_due_to_same_data" id = "id_for_enable_desable_save_changes_btn">
                                    <button onclick = "return confirm('Are You Sure To Update Your Profile Data !');" type="submit">SAVE CHANGES</button>
                                </div>
                                <div class = "customer_account_reset disabled_due_to_same_data" id = "id_for_enable_desable_reset_btn">
                                    <a onclick = "location.reload();" id="resetButton">RESET</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </form>

        <!-- ============================= email verification (start) ============================= -->
        <div class="users_info_container">

            <div class="verify_user_for_secured_data" style="{{ Session::has('verification_code_correct') ? 'display: none;' : '' }}">
                <h2>Verify your self, for further secured information</h2>
                <button class = "user_email_verification_btn" onclick = "goToRouteToSentVerificationCode({{ $admin_data->id }})" style="{{ Session::has('mail_has_been_sent_to_user') ? 'pointer-events: none; opacity: 0.5;' : '' }}">EMAIL VERIFICATION</button>
            </div>

            @if(Session()->has('verification_code_incorrect'))
                <div class="msg2" id="msg1">
                    {{session()->get('verification_code_incorrect')}}
                    <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn2" >X</button>
                </div>
            @endif

            @if(Session()->has('verification_code_expires'))
                <div class="msg3" id="msg1">
                    {{session()->get('verification_code_expires')}}
                    <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn3" >X</button>
                </div>
            @endif

            @if(Session::has('mail_has_been_sent_to_user'))
                <div id="email_verification_form_that_will_be_dispalyed_when_an_email_has_been_sent">
                    <form action="{{ route('verifying_admin_email_verification_code_form_submission', $admin_data->id) }}" method = "post">
                        @csrf
                        <div class="email_text_box_container">
                            <div class="email_v_text">We have sent a verification code on <span class = "users_mail">"{{ $admin_data->admin_email }}"</span></div>
                            <div class="button-container">
                                <div class="text-fields-hehe verification_code">
                                    <label for="address"><i class='bx bx-check-shield bx-md' style='color:#6487cb' ></i></label>
                                    <input type="text" name="varification_code" placeholder="Enter verification code" required>
                                </div>
                                <button type="submit" class = "user_email_VERIFY_btn">VERIFY</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
        </div>
        <!-- ============================= email verification (end) ============================= -->

    </div>

    @if(Session::has('verification_code_correct'))
        <div class="customer_account_second_part_main_container" id = "secured_data_that_need_user_verification_for_account_deletion">
            <div class="Account_Details_heading">
                <h2>Delete Account</h2>
                <div class="tc-container">
                    <label for="tc" class="tc checkbox_container_hehe">
                        <input type="checkbox" name="tc" id="tc" required>
                        <span style = "color: #454545; font-weigth: 600; font-size: 17px;">I confirm my account deletion [By checking the checkbox, you agree on the deletion of your all records]</span>
                    </label>
                </div>
            </div>

            <div class="change_reset_btn_slot">
                <div class="button-container">
                    <div class = "customer_account_deletion_btn disabled_due_to_checkbox_data" id = "id_for_enable_desable_delete_account_btn">
                        <a onclick = "return confirm('Are You Sure To Delete Your Account !');" href = "{{ route('deleting_admin_account_from_admin', $admin_data->id) }}" id="deleteButton">DELETE ACCOUNT</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</section>

@include('website_footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/main_initial_page.js') }}"></script> 
<script>
    
    let eye_icon = document.getElementById("eyeIcon");
    let c_password = document.getElementById("confirm_password");

    eye_icon.onclick = function (){
        if(c_password.type == "password"){
            c_password.type = "text";
            eye_icon.src = "{{ asset('img/blue_eye_open_icon.png') }}";
        }else{
            c_password.type = "password";
            eye_icon.src = "{{ asset('img/eye-close.png') }}";
        }
    }

    function showFileName(input) {
        var fileNameElement = document.getElementById('fileName');
        if (input.files && input.files.length > 0) {
            var filename = input.files[0].name;
            var extensionIndex = filename.lastIndexOf('.');
            var filenameWithoutExtension = filename.substring(0, extensionIndex);
            var extension = filename.substring(extensionIndex + 1);
            var displayedName;
            if (filenameWithoutExtension.length > 35) {
                var firstPart = filenameWithoutExtension.substring(0, 35);
                var lastPart = filenameWithoutExtension.substring(filenameWithoutExtension.length - 10);
                displayedName = firstPart + '.....' + lastPart;
            } else {
                displayedName = filenameWithoutExtension;
            }
            fileNameElement.innerHTML = '<h3>Selected File : "' + displayedName + '.' + extension + '"</h3>';
        } else {
            fileNameElement.innerHTML = '';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        var textFields = document.querySelectorAll('.text-fields input');

        textFields.forEach(function(input) {
            input.addEventListener('focus', function() {
                this.parentElement.style.border = '2px solid #696cff';
                this.parentElement.style.borderColor = '#696cff';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.border = '';
                this.parentElement.style.borderColor = ''; 
            });
        });
    });

    console.log("hi");

    let delete_account_btn_slot = document.getElementById('id_for_enable_desable_delete_account_btn');
    let checkbox = document.getElementById('tc');

    checkbox.addEventListener('change', function() {
        if (checkbox.checked) 
        {
            delete_account_btn_slot.classList.remove("disabled_due_to_checkbox_data");
            // console.log("checkbox is checked show button will be enabled");
        } 
        else 
        {
            delete_account_btn_slot.classList.add("disabled_due_to_checkbox_data");
            // console.log("checkbox is not checked show button will be disabled");
        }
    });

    function goToRouteToSentVerificationCode(userID)
    {
        var redirecting_route = "/sending_email_for_verify_admin_user/" + userID;
        window.location.href = redirecting_route;
    }
</script>
</body>
</html>