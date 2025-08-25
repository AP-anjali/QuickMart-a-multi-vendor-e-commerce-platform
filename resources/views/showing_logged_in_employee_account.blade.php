<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $employee_data->name }} | Profile</title>
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
        let name = "{{ $employee_data->name }}";
        let email = "{{ $employee_data->email }}";
        let phone_no = "{{ $employee_data->phone_no }}";
        let address = "{{ $employee_data->address }}";

        let gender = "{{ $employee_data->gender }}";
        let date_of_birth = "{{ $employee_data->date_of_birth }}";
        let photo = "{{ $employee_data->photo }}";
        let Aadharcard = "{{ $employee_data->Aadharcard }}";

        let original_profile_pic = "{{ $employee_data->profile_pic }}";

        let username = "{{ $employee_data->employee_username }}";
        let confirm_password = "{{ $employee_data->employee_confirm_password }}";

        let bank_name = "{{ $employee_data->bank_name }}";
        let bank_branch = "{{ $employee_data->bank_branch }}";
        let bank_ifsc_code = "{{ $employee_data->bank_ifsc_code }}";
        let bank_micr_code = "{{ $employee_data->bank_micr_code }}";
        let account_holder_name = "{{ $employee_data->account_holder_name }}";
        let account_number = "{{ $employee_data->account_number }}";
        let account_type = "{{ $employee_data->account_type }}";
        let original_bank_document = "{{ $employee_data->proof_of_bank_account_ownership }}";

        let input_name = document.getElementById('name').value;
        let input_email = document.getElementById('email').value;
        let input_phone_no = document.getElementById('phone_no').value;
        let input_address = document.getElementById('address').value;

        let input_gender = document.getElementById('gender').value;
        let input_date_of_birth = document.getElementById('date_of_birth').value;
        let input_photo = document.getElementById('photo').files[0];
        let input_Aadharcard = document.getElementById('Aadharcard').files[0];

        let new_profile_pic = document.getElementById('fileInput').files[0];

        let input_username = document.getElementById('username').value;
        let input_confirm_password = document.getElementById('confirm_password').value;

        let input_bank_name = document.getElementById('bank_name').value;
        let input_bank_branch = document.getElementById('bank_branch').value;
        let input_bank_ifsc_code = document.getElementById('bank_ifsc_code').value;
        let input_bank_micr_code = document.getElementById('bank_micr_code').value;
        let input_account_holder_name = document.getElementById('account_holder_name').value;
        let input_account_number = document.getElementById('account_number').value;
        let input_account_type = document.getElementById('my_list4').value;
        let new_bank_document = document.getElementById('proof_of_bank_account_ownership').files[0];
        
        let reset_btn_slot = document.getElementById('id_for_enable_desable_reset_btn');
        let save_changes_btn_slot = document.getElementById('id_for_enable_desable_save_changes_btn');

        if(input_name === name && input_email === email &&  input_phone_no === phone_no &&  input_address === address 
        && input_gender === gender &&  input_date_of_birth === date_of_birth  
        && (!new_profile_pic || new_profile_pic.name === original_profile_pic)
        && (!input_photo || input_photo.name === photo)
        && (!input_Aadharcard || input_Aadharcard.name === Aadharcard)
        && input_username === username && input_confirm_password === confirm_password
        && input_account_type === account_type
        && input_bank_name === bank_name && input_bank_branch === bank_branch && input_bank_ifsc_code === bank_ifsc_code && input_bank_micr_code === bank_micr_code && input_account_holder_name === account_holder_name && input_account_number === account_number
        && (!new_bank_document || new_bank_document.name === original_bank_document)) {
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

    @if(Session()->has('employee_record_to_update'))
        <div class="msg" id="msg1">
            {{session()->get('employee_record_to_update')}}
            <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
        </div>
    @endif


    <div class="customer_account_main_container">

        <form action="{{ route('updating_employee_user_record_from_employee_page_form_submission', $employee_data->id) }}" method = "post" enctype="multipart/form-data" id="accountDetailsForm">
            @csrf
            <div class="Account_Details_heading">
                <h2>Account Details</h2>
            </div>

            <div class="customer_account_image_slot_container">
                <img src="{{ asset('storage/' . $employee_data->profile_pic) }}" alt="User Profile Pic">
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
                        <input type="text" name="name" id="name" value = "{{ $employee_data->name }}" placeholder="Your full name" required oninput="checkFormChanges()">
                    </div>
                    <div class="text-fields email">
                        <label for="email"><i class='bx bx-envelope bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="email" id="email" value = "{{ $employee_data->email }}" placeholder="Your Email Address" required oninput="checkFormChanges()">
                    </div>
                </div>

                <div class="button-container">
                    <div class="text-fields phone_no">
                        <label for="phone_no"><i class='bx bx-phone-call bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="phone_no" id="phone_no" value = "{{ $employee_data->phone_no }}" placeholder="Phone number with +91" required oninput="checkFormChanges()">
                    </div>
                    <div class="text-fields address123">
                        <label for="address"><i class='bx bxl-periscope bx-md' style='color:#6487cb' ></i></label>
                        <input type="text" name="address" id="address" value = "{{ $employee_data->address }}" placeholder="Your Business address" required oninput="checkFormChanges()">
                    </div>
                </div>

                <div class="button-container">
                    <div class="text-fields gender">
                        <label for="gender"><i class='bx bx-male-female bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="gender" id="gender" value = "{{ $employee_data->gender }}" placeholder="Your Gender" required oninput="checkFormChanges()">
                    </div>
                    <div class="text-fields date_of_birth">
                        <label for="date_of_birth"><i class='bx bx-calendar bx-md' style='color:#6487cb' ></i></label>
                        <input type="date" name="date_of_birth" id="date_of_birth" value = "{{ $employee_data->date_of_birth }}" placeholder="Your Date Of Birth" required oninput="checkFormChanges()" style = "padding-right: 55px;">
                    </div>
                </div>

                @if(Session::has('verification_code_correct'))
                    <div id="secured_data_that_need_user_verification">
                        <div class="button-container">
                            <div class="file_uploader">
                                <label for="photo"><i  class='bx bxs-folder-open bx-md' style='color:#6487cb'></i></label>
                                <input type="file" name="photo" id="photo" onchange="checkFormChanges();">
                            </div>
                            <div class="file_uploader_heading">Photo</div>

                            <div class="file_uploader" style = "margin-left: -30px;">
                                <label for="Aadharcard"><i  class='bx bxs-folder-open bx-md' style='color:#6487cb'></i></label>
                                <input type="file" name="Aadharcard" id="Aadharcard" onchange="checkFormChanges();">
                            </div>
                            <div class="file_uploader_heading">Aadharcard</div>
                        </div>

                        <div class="button-container" style = "margin-left: 10px;">
                            <div class = "customer_account_current_bank_document_btn" style = "margin: 0 60px;">
                                <a href = "{{ route('showing_photo_to_employee_for_account', $employee_data->id) }}" target = "_blank">CURRENT PHOTO</a>
                            </div>

                            <div class = "customer_account_current_bank_document_btn" style = "margin: 0 60px;">
                                <a href = "{{ route('showing_aadharcard_to_employee_for_account', $employee_data->id) }}" target = "_blank">CURRENT AADHARCARD</a>
                            </div>
                        </div>

                        <!-- ----------------------- -->

                        <div class="Account_Details_heading_Personal_Information" style = "margin-top: 50px;">
                            <h2>Banking Information</h2>
                        </div>
                            
                        <div class="button-container">
                            <div class="text-fields bank_name" >
                                <label for="bank_name"><i class='bx bxs-bank bx-md' style='color:#6487cb'></i></label>
                                <input type="text" name="bank_name" id="bank_name" value = "{{ $employee_data->bank_name }}" required oninput="checkFormChanges()">
                            </div>
                            <div class="text-fields bank_branch" >
                                <label for="bank_branch"><i class='bx bxs-doughnut-chart bx-md' style='color:#6487cb'></i></label>
                                <input type="text" name="bank_branch" id="bank_branch" value = "{{ $employee_data->bank_branch }}" required oninput="checkFormChanges()">
                            </div>
                        </div>
                        <div class="button-container">
                            <div class="text-fields bank_ifsc_code" >
                                <label for="bank_ifsc_code"><i class='bx bxs-bank bx-md' style='color:#6487cb'></i></label>
                                <input type="text" name="bank_ifsc_code" id="bank_ifsc_code" value="{{ $employee_data->bank_ifsc_code }}" placeholder="Bank Accont IFSC Code" required oninput="checkFormChanges()">
                            </div>
                            <div class="text-fields bank_micr_code" >
                                <label for="bank_micr_code"><i class='bx bxs-doughnut-chart bx-md' style='color:#6487cb'></i></label>
                                <input type="text" name="bank_micr_code" id="bank_micr_code" value="{{ $employee_data->bank_micr_code }}" placeholder="Bank Accont MICR Code" required oninput="checkFormChanges()">
                            </div>
                        </div>
                        <div class="button-container">
                            <div class="text-fields account_holder_name">
                                <label for="account_holder_name"><i class='bx bxs-user bx-md' style='color:#6487cb'></i></label>
                                <input type="text" name="account_holder_name" id="account_holder_name" value = "{{ $employee_data->account_holder_name }}" required oninput="checkFormChanges()">
                            </div>
                            <div class="text-fields account_number">
                                <label for="account_number"><i class='bx bxs-add-to-queue bx-md' style='color:#6487cb'></i></label>
                                <input type="text" name="account_number" id="account_number" value = "{{ $employee_data->account_number }}" required oninput="checkFormChanges()">
                            </div>
                        </div>
                        <div class="button-container">
                            <div class="text-fields account_type">
                                <label for="account_type"><i class='bx bxs-grid bx-md' style='color:#6487cb'></i></i></label>
                                <select name="account_type" id="my_list4" required onchange="checkFormChanges()">
                                    <option value="{{ $employee_data->account_type }}" selected>{{ $employee_data->account_type }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                    <option value="Savings Account">Savings Account</option>
                                    <option value="Checking Account">Checking Account</option>
                                    <option value="Certificate of Deposit Account">Certificate of Deposit Account</option>
                                    <option value="Money Market Account">Money Market Account</option>
                                </select>
                            </div>

                            <div class="file_uploader">
                                <label for="proof_of_bank_account_ownership"><i  class='bx bxs-folder-open bx-md' style='color:#6487cb'></i></label>
                                <input type="file" name="proof_of_bank_account_ownership" id="proof_of_bank_account_ownership" onchange="checkFormChanges();">
                            </div>
                            <div class="file_uploader_heading">Proof of Bank Account Ownership</div>
                        </div>

                        <div class="button-container" style = "margin-top: -30px;">
                            <div class = "customer_account_current_bank_document_btn">
                                <a href = "{{ route('showing_proof_of_bank_account_ownership_to_employee_for_account', $employee_data->id) }}" target = "_blank">CURRENT PROOF OF BANK ACCOUNT OWNERSHIP</a>
                            </div>
                        </div>

                        <!-- ------------------------------------ -->
                            <!-- ---------------------------------------- -->
                            <div class="Account_Details_heading_Personal_Information" style = "margin-top: 50px;">
                                <h2>Username & Password Information</h2>
                            </div>

                            <div class="button-container">
                                <div class="text-fields username">
                                    <label for="username"><i class='bx bxs-user bx-md' style='color:#6487cb'></i></label>
                                    <input type="text" name="employee_username" id="username" value = "{{ $employee_data->employee_username }}" placeholder="Create Own Username" required oninput="checkFormChanges()">
                                </div>

                                <div class="text-fields confirm_password">
                                    <label for="confirm_password"><i class='bx bxs-key bx-md' style='color:#6487cb' ></i></label>
                                    <input type="password" name="employee_confirm_password" id="confirm_password" value = "{{ $employee_data->employee_confirm_password }}" placeholder="Enter Password" required oninput="checkFormChanges()">
                                    <img src="{{ asset('img/eye-close.png') }}" alt="eye-pic" class = "eye_icon" id = "eyeIconIMG">
                                </div>
                            </div>

                            <!-- ---------------------------------------- -->
                            
                            <!-- ================ -->
                            <!-- ================ -->
                                
                            <div class="button-container customer_account_creation_info_slot" style = "margin-top: 60px;">
                                <div class = "customer_account_creation">
                                    <h2>Account Created At &nbsp;| </h2>
                                </div>
                                <div class = "customer_account_creation_date">
                                    <h2><?php echo date("d/m/Y, h:i:s A", strtotime($employee_data->created_at)); ?></h2>
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
                <button class = "user_email_verification_btn" onclick = "goToRouteToSentVerificationCode({{ $employee_data->id }})" style="{{ Session::has('mail_has_been_sent_to_user') ? 'pointer-events: none; opacity: 0.5;' : '' }}">EMAIL VERIFICATION</button>
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
                    <form action="{{ route('verifying_employee_email_verification_code_form_submission', $employee_data->id) }}" method = "post">
                        @csrf
                        <div class="email_text_box_container">
                            <div class="email_v_text">We have sent a verification code on <span class = "users_mail">"{{ $employee_data->email }}"</span></div>
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
                        <a onclick = "return confirm('Are You Sure To Delete Your Account !');" href = "{{ route('deleting_employee_account_from_employee', $employee_data->id) }}" id="deleteButton">DELETE ACCOUNT</a>
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

    let eye_icon = document.getElementById("eyeIconIMG");
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
        var redirecting_route = "/sending_email_for_verify_employee_user/" + userID;
        window.location.href = redirecting_route;
    }
</script>
</body>
</html>