<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $customer_data->name }} | Profile</title>
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
            width: 90%;
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
            margin-left: 5%;
            margin-top: 30px;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }
   </style>
</head>
<body class = "active">

@include('website_menu')

<script>
    function checkFormChanges(){
        let name = "{{ $customer_data->name }}";
        let email = "{{ $customer_data->email }}";
        let phone_no = "{{ $customer_data->phone_no }}";
        let address = "{{ $customer_data->address }}";
        let original_profile_pic = "{{ $customer_data->profile_pic }}";

        let input_name = document.getElementById('name').value;
        let input_email = document.getElementById('email').value;
        let input_phone_no = document.getElementById('phone_no').value;
        let input_address = document.getElementById('address').value;
        let new_profile_pic = document.getElementById('fileInput').files[0];

        let reset_btn_slot = document.getElementById('id_for_enable_desable_reset_btn');
        let save_changes_btn_slot = document.getElementById('id_for_enable_desable_save_changes_btn');

        if(input_name === name && input_email === email &&  input_phone_no === phone_no &&  input_address === address && (!new_profile_pic || new_profile_pic.name === original_profile_pic)) {
            // console.log("Badhu Barabar chhe");
            reset_btn_slot.classList.add("disabled_due_to_same_data");
            save_changes_btn_slot.classList.add("disabled_due_to_same_data");
        }
        else {
            // console.log("Kasu barabar nathi");
            reset_btn_slot.classList.remove("disabled_due_to_same_data");
            save_changes_btn_slot.classList.remove("disabled_due_to_same_data");
        }
    }

    function checkFormChanges2(){
        let country = "{{ $customer_address_data ? $customer_address_data->country : '' }}";
        let state = "{{ $customer_address_data ? $customer_address_data->state : '' }}";
        let city = "{{ $customer_address_data ? $customer_address_data->city : '' }}";
        let area_or_village = "{{ $customer_address_data ? $customer_address_data->area_or_village : '' }}";
        let pincode = "{{ $customer_address_data ? $customer_address_data->pincode : '' }}";
        let landmark = "{{ $customer_address_data ? $customer_address_data->landmark : '' }}";
        let full_address = "{{ $customer_address_data ? $customer_address_data->full_address : '' }}";

        let input_country = document.getElementById('country').value;
        let input_state = document.getElementById('state').value;
        let input_city = document.getElementById('city').value;
        let input_area_or_village = document.getElementById('area_or_village').value;
        let input_pincode = document.getElementById('pincode').value;
        let input_landmark = document.getElementById('landmark').value;
        let input_full_address = document.getElementById('full_address').value;

        let reset_btn_slot2 = document.getElementById('id_for_enable_desable_reset_btn2');
        let save_changes_btn_slot2 = document.getElementById('id_for_enable_desable_save_changes_btn2');

        if(input_country === country && input_state === state &&  input_city === city &&  input_area_or_village === area_or_village && input_pincode === pincode && input_landmark === landmark && input_full_address === full_address) {
            // console.log("Badhu Barabar chhe");
            reset_btn_slot2.classList.add("disabled_due_to_same_data");
            save_changes_btn_slot2.classList.add("disabled_due_to_same_data");
        }
        else {
            // console.log("Kasu barabar nathi");
            reset_btn_slot2.classList.remove("disabled_due_to_same_data");
            save_changes_btn_slot2.classList.remove("disabled_due_to_same_data");
        }
    }

    window.addEventListener('DOMContentLoaded', (event) => {
        const msg1 = document.getElementById('msg1');
        if (msg1) {
            const scrollPosition = msg1.offsetTop - 210;
            window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
        }
    });
</script>

<section class="contact"> <!-- customer_account -->

    @if(Session()->has('customer_account_updated'))
        <div class="msg" id="msg1">
            {{session()->get('customer_account_updated')}}
            <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
        </div>
    @endif

    <!-- ============================ customer account details [start] ============================ -->
    <div class="customer_account_main_container">

        <form action="{{ route('updating_customer_user_record_from_customer_page_form_submission', $customer_data->id) }}" method = "post" class="signup-form-container" enctype="multipart/form-data" id="accountDetailsForm">
            @csrf
            <div class="Account_Details_heading">
                <h2>Account Details</h2>
            </div>

            <div class="customer_account_image_slot_container">
                <img src="{{ asset('storage/' . $customer_data->profile_pic) }}" alt="User Profile Pic">
                <div class="custom-file-upload">
                    <input type="file" name = "profile_pic" id="fileInput" onchange="showFileName(this); checkFormChanges();" />
                    <label for="fileInput" class="custom-button">UPLOAD NEW PHOTO</label>
                    <span id="fileName"></span>
                </div>
            </div>
            <hr>

            <div class="users_info_container">
                <div class="button-container">
                    <div class="text-fields name">
                        <label for="name"><i class='bx bx-user-circle bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="name" id="name" value = "{{ $customer_data->name }}" placeholder="Your full name" required oninput="checkFormChanges()">
                    </div>

                    <div class="text-fields email">
                        <label for="email"><i class='bx bx-envelope bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="email" id="email" value = "{{ $customer_data->email }}" placeholder="Your Email Address" required oninput="checkFormChanges()">
                    </div>
                </div>

                <div class="button-container">
                    <div class="text-fields phone_no">
                        <label for="phone_no"><i class='bx bx-phone-call bx-md' style='color:#6487cb'></i></label>
                        <input type="text" name="phone_no" id="phone_no" value = "{{ $customer_data->phone_no }}" placeholder="Phone number with +91" required oninput="checkFormChanges()">
                    </div>
                    <div class="text-fields address">
                        <label for="address"><i class='bx bxl-periscope bx-md' style='color:#6487cb' ></i></label>
                        <input type="text" name="address" id="address" value = "{{ $customer_data->address }}" placeholder="Your Business address" required oninput="checkFormChanges()">
                    </div>
                </div>

                <div class="button-container customer_account_creation_info_slot">
                    <div class = "customer_account_creation">
                        <h2>Account Created At &nbsp;| </h2>
                    </div>
                    <div class = "customer_account_creation_date">
                        <h2><?php echo date("d/m/Y, h:i:s A", strtotime($customer_data->registration_date)); ?></h2>
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

        </form>
    </div>
    <!-- ============================ customer account details [end] ============================ -->

    <!-- ============================ customer address details [start] ============================ -->

    @if(Session()->has('address_stored'))
        <div class="msg2" id="msg1">
            {{session()->get('address_stored')}}
            <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
        </div>
    @endif


    <div class="customer_account_main_container">
        @if(isset($customer_address_data))
            <form action="{{ route('updating_customer_user_address_record_from_customer_page_form_submission', $customer_data->id) }}" method = "post">
                @csrf
                <div class="Account_Details_heading">
                    <h2>Address Details</h2>
                </div>

                <div class="users_info_container">
                    <div class="button-container">
                        <div class="text-fields country2">
                            <label for="country"><i class="fa-solid fa-earth-africa" style='color:#6487cb'></i></label>
                            <input type="text" name="country" id="country" value = "{{ $customer_address_data->country }}" placeholder="Your country name" required oninput="checkFormChanges2()">
                        </div>

                        <div class="text-fields state2">
                            <label for="state"><i class="fa-solid fa-globe" style='color:#6487cb'></i></label>
                            <input type="text" name="state" id="state" value = "{{ $customer_address_data->state }}" placeholder="Your state name" required oninput="checkFormChanges2()">
                        </div>
                    </div>

                    <div class="button-container">
                        <div class="text-fields city2">
                            <label for="city"><i class="fa-solid fa-city" style='color:#6487cb'></i></label>
                            <input type="text" name="city" id="city" value = "{{ $customer_address_data->city }}" placeholder="Your city name" required oninput="checkFormChanges2()">
                        </div>
                        <div class="text-fields area_or_village2">
                            <label for="area_or_village"><i class="fa-solid fa-layer-group" style='color:#6487cb'></i></label>
                            <input type="text" name="area_or_village" id="area_or_village" value = "{{ $customer_address_data->area_or_village }}" placeholder="Your address area" required oninput="checkFormChanges2()">
                        </div>
                    </div>

                    <div class="button-container">
                        <div class="text-fields pincode2">
                            <label for="pincode"><i class="fa-solid fa-shield-halved" style='color:#6487cb'></i></label>
                            <input type="text" name="pincode" id="pincode" value = "{{ $customer_address_data->pincode }}" placeholder="Your address pincode" required oninput="checkFormChanges2()">
                        </div>
                        <div class="text-fields landmark2">
                            <label for="landmark"><i class="fa-solid fa-building-shield" style='color:#6487cb'></i></label>
                            <input type="text" name="landmark" id="landmark" value = "{{ $customer_address_data->landmark }}" placeholder="Your address landmark" required oninput="checkFormChanges2()">
                        </div>
                    </div>

                    <div class="button-container">
                        <div class="text-fields full_address2" style = "width: 100%;">
                            <label for="full_address"><i class="fa-solid fa-house-chimney-user" style='color:#6487cb'></i></label>
                            <input type="text" name="full_address" id="full_address" value = "{{ $customer_address_data->full_address }}" placeholder="Your full address" style = "width: 350%;" required oninput="checkFormChanges2()">
                        </div>
                    </div>

                    <div class="button-container customer_account_creation_info_slot">
                        <div class = "customer_account_creation">
                            <h2>Address Saved At &nbsp;| </h2>
                        </div>
                        <div class = "customer_account_creation_date">
                            <h2><?php echo date("d/m/Y, h:i:s A", strtotime($customer_address_data->created_at)); ?></h2>
                        </div>
                    </div>

                    <div class="change_reset_btn_slot">
                        <div class="button-container">  <!-- disabled_due_to_same_data -->
                            <div class = "customer_account_save_changes disabled_due_to_same_data" id = "id_for_enable_desable_save_changes_btn2">
                                <button onclick = "return confirm('Are You Sure To Update Your Address Details !');" type="submit">SAVE CHANGES</button>
                            </div>
                            <div class = "customer_account_reset disabled_due_to_same_data" id = "id_for_enable_desable_reset_btn2">
                                <a onclick = "location.reload();" id="resetButton">RESET</a>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        @else
            <div class="Account_Details_heading">
                <h2>Address Details</h2>
            </div>

            <div class="users_info_container">
                <div class = "add_address_slot">
                    <h2 class = "not_added_the_address">You have not added an address yet !</h2>
                    <button class="add_address_btn" onclick = "goToAddressPage({{ $customer_data->id }})">ADD ADDRESS</button>
                </div>
            </div>
        @endif
    </div>
    <!-- ============================ customer address details [end] ============================ -->

    <!-- ============================ customer account deletion [start] ============================ -->
    <div class="customer_account_second_part_main_container">
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
                    <a onclick = "return confirm('Are You Sure To Delete Your Account !');" href = "{{ route('deleting_customer_account_from_customer', $customer_data->id) }}" id="deleteButton">DELETE ACCOUNT</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ customer account deletion [end] ============================ -->

</section>

@include('website_footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/main_initial_page.js') }}"></script> 
<script>
    
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

    function goToAddressPage(customer_id)
    {
        var redirecting_route = "/customer_address/" + customer_id;
        window.location.href = redirecting_route;    
    }
</script>
</body>
</html>