@extends('main_admin_dashboard_layout')

@section('title')
<title>User Management</title>
@endsection

@section('style')
<style>
     #Users{
        /* width: 220px; */
        border-left : 6px solid #305d72;
        background: #B7C9E2;
        border-radius: 4px;
    } 

    #Customers{
        border: 2px solid #3d5ee1;
        border-radius: 8px;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "poppins", sans-serif;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        background-color: #f5f5f9;
    }
    .container{
        width: 80%;
        margin: 6% auto;
        /* margin: 9px; */
        position: relative;
        /* bottom: 10px; */
        display: flex;
        height: 623px;
        /* height: 565px; */
        box-shadow: 0 12px 18px rgba(54, 176, 138, 0.005);
        border-radius: 6px;
        background: #FFF;
    }
    .login-link{
        background-color: #696cff;
        /* background-image: url('bg-shapes.svg'); */
        background-position: bottom left;
        background-repeat: no-repeat;
        width: 35%;
        /* width: 400px; */
        padding: 3%;
    }
    .signup-form-container{
        width: 70%;
        max-width: 700px;
        padding: 3% 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .logo{
        font-weight: 600;
        color: #FFF;
    }
    .side-big-headning{
        font-weight: 800;
        color: #FFF;
        font-size: 1.6rem;
        margin: 46% 0 5%;
    }
    .primary-bg-text{
        color: #eff0ff;
        font-weight: 500;
        text-align: center;
    }
    a.loginbtn{
        text-decoration: none;
        color: #FFF;
        width: 70%;
        font-weight: 500;
        display: inline-block;
        margin: 7% 15%;
        text-align: center;
        border: 2px solid #eff0ff;
        border-radius: 24px;
        padding: 3% 0;
    }
    a.loginbtn:hover{
        color: #696cff;
        background-color: #FFF;
    }
    .big-headning{
        font-weight: 900;
        font-size: 2rem;
        color: #696cff;
    }
    .social-media-platform{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .social-media-platform a{
        color: #1a1d86;
        text-decoration: none;
        border-radius: 50%;
        display: inline-flex;
        border: 1px solid #e0e3e2;
        margin: 12%;
        padding: 13%;
    }
    .progress-baranjali{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 4% 0;
        width: 90%;
    }
    .progress-baranjali .stage{
        width: 30%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .progress-baranjali .tool-tip{
        color: #1a1d86;
        font-weight: 600;
    }
    .stageno{
        margin: 6% 0;
        padding: 2% 7%;
        border-radius: 50%;
        background-color: #f5f5f9;
    }

    .button-container{
        display: flex;
        align-items: center;
        margin: 4% 0;
    }
    .text-fields{
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        padding: 2%;
        margin: 0 2%;
        width: 46%;
        border-radius: 4px;
        color: #84848d;
    }
    input{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        /* width: 400%; */
        margin-left: 4%;
        padding-left: 15px;
        font-size: 1rem;
    }
    .signup-form-content{
        width: 100%;
        padding: 0 3%;
    }
    .text-fields.name::after{
        content: 'Name';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.email::after{
        content: 'Email Address';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.phone_no::after{
        content: 'Phone Number';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.address::after{
        content: 'Address';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.username::after{
        content: 'Create Username';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.password::after{
        content: 'Create Password';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.confirm_password::after{
        content: 'Password Again';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .khaskao{
        margin-top: 10px;
        margin-left: 170px;
        width: 290px;
    }
    .text-fields.business_name::after{
        content: 'Business Name';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.business_type::after{
        content: 'Business Type';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -260px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    #my_list{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        font-size: 1rem;
    }
    .text-fields.business_type select {
        padding-left: 20px; 
    }
    .text-fields.business_strength::after{
        content: 'Business Strength';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -260px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    #my_list2{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        font-size: 1rem;
    }
    .text-fields.business_strength select {
        padding-left: 20px; 
    }
    .text-fields.product_category::after{
        content: 'Product Category';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -260px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    #my_list3{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        font-size: 1rem;
    }
    .text-fields.product_category select {
        padding-left: 20px; 
    }
    .text-fields.gst_number::after{
        content: 'GST Number';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.business_description::after{
        content: 'Business Description';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.bank_name::after{
        content: 'Bank Name';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.bank_branch::after{
        content: 'Bank Branch';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.account_holder_name::after{
        content: 'Account Holder Name';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.account_number::after{
        content: 'Account Number';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -220px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    .text-fields.account_type::after{
        content: 'Account Type';
        background-color: #fff;
        position: relative;
        padding: 0 4%;
        left: -270px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }
    #my_list4{
        border: none;
        outline: none;
        background: inherit;
        color: #84848d;
        margin-top: 4px;
        font-size: 1rem;
    }
    .text-fields.account_type select {
        padding-left: 5px; 
    }
    .file_uploader{
        display: flex;
        width: 300px;
        align-items: center;
        margin-left: 14px;
        height: 60px;
        border-radius: 4px;
        border: 1px solid #ccc;
        color: #84848d;
        padding: 2%;
    }

    .file_uploader_heading{
        background-color: #FFF;
        position: relative;
        left: -280px;
        color: #696cff;
        top: -28px;
        white-space: nowrap;
    }

    #proof_of_bank_account_ownership{
        cursor: pointer;
    }
    /* ========================================================================= */

    /* ========================================================================= */
    .pagination-btns{
        display: flex;
        justify-content: center;
        margin: 3% 0;
        padding: 0 4%;
    }
    .nextpage, .previouspage{
        background-color: #8789ff;
        color: #FFF;
        width: 45%;
        cursor: pointer;
        padding: 2%;
        margin: 20px;
        font-weight: 500;
        font-size: 1rem;
        border-radius: 4px;
        border: none;
        outline: none;
    }
    .nextpage:hover, .previouspage:hover{
        background-color: #696cff;
    }
    .tc-container input{
        width: 4%;
        margin-left: 4%;
        accent-color: #696cff;
    }
    .tc a{
        text-decoration: none;
        color: #696cff;
    }
    .tc a:hover{
        color: #1a1d86;
    }
    label.tc{
        margin-left: 4%;
    }

    .msg{
        width: 50%;
        height: 50px;
        color: green;
        font-size: 20px;
        border-radius: 6px;
        padding: 8px 0 0 25px;
        background: white;
        border: 1px solid rgba(0,0,0,.2);
        box-shadow: 5px 5px 5px rgba(0,0,0,.2);
        margin-top: 20px;
        margin-left: 20px;
        align-items: center;
        justify-content: center;
    }

    #popup-btn{
        height: 80%;
        margin-bottom: 8px;
        width: 30px;
        padding-bottom: 4px;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: 6px;
        background: rgba(0,0,0,.2);
        margin-left: 33%;
    }

    .page-wrapper{
        /* overflow-x: auto; */
        overflow: auto;
    }

    ::-webkit-scrollbar {
        width: 9px;
        height: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background-color: #929292;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #B7C9E2;
    }

    ::-webkit-scrollbar-thumb:hover {
        background-color: #454545;
    }
</style>
@endsection

@section('body')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <!-- <div>Hello From main_admin_dashboard_page_for_updating_customer_record_from_admin</div><br> -->

            @if(Session()->has('message'))

                    <div class="msg" id="msg1">
                        {{session()->get('message')}}
                        <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
                    </div>

            @endif

            <div class="container">
                <div class="login-link" id = "loginLink">
                    <div class="logo">
                        <i class='bx bxs-objects-vertical-bottom'></i>
                        <span class="text">QUICKMART</span>
                    </div>
                    <p class="side-big-headning" style = "text-align: center;">Customer User<br>Record Updation</p>
                    <p class="primary-bg-text">Update Customer user record<br>With all the required Information</p>
                    <a onclick = "return confirm('Are You sure to Exit from the Customer record updation page');" href="{{ route('main_admin_dashboard_show_customers_page') }}" class="loginbtn">Exit</a>
                </div>
                <form action="{{ route('updating_customer_user_record_from_admin_page_form_submission', $customer_record_to_update->id) }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
                    @csrf
                    <p class="big-headning">Update Customer Account</p>
                    <div class="social-media-platform">
                        <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                        <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                        <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                    </div>
                    <div class="progress-baranjali">
                        <div class="stage">
                            <p class="tool-tip">Personal Information</p>
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
                                    <input type="text" name="name" id="name" value = "{{ $customer_record_to_update->name }}" required>
                                </div>
                                <div class="text-fields email">
                                    <label for="email"><i class='bx bx-envelope' style='color:#6487cb'></i></label>
                                    <input type="text" name="email" id="email" value = "{{ $customer_record_to_update->email }}" required>
                                </div>
                            </div>
                            <div class="button-container">
                                <div class="text-fields phone_no">
                                    <label for="phone_no"><i class='bx bx-phone-call' style='color:#6487cb'></i></label>
                                    <input type="text" name="phone_no" id="phone_no" value = "{{ $customer_record_to_update->phone_no }}" required>
                                </div>
                                <div class="text-fields address">
                                    <label for="address"><i class='bx bxl-periscope' style='color:#6487cb' ></i></label>
                                    <input type="text" name="address" id="address" value = "{{ $customer_record_to_update->address }}" required>
                                </div>
                            </div>
                            <div class="pagination-btns">
                                <input type="button" value="Previous" class="previouspage stagebtn1a">
                                <input type="button" value="Next" class="nextpage stagebtn1b" onclick = "stage1to2()">
                            </div>
                        </div>
                        <div class="stage2-content">
                            <div class="tc-container">
                                <label for="tc" class="tc" style="white-space: nowrap;">
                                    <input type="checkbox" name="tc" id="tc" required>
                                    By submitting your details, you agree to the <a href="#">terms and conditions</a>
                                </label>
                            </div>
                            <br>
                            <div class="pagination-btns">
                                <input type="button" value="Previous" class="previouspage stagebtn2a" onclick = "stage2to1()">
                                <input type="submit" value="Update" class="nextpage stagebtn2b">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    let signUpContent = document.querySelector(".signup-form-container"),
    stagebtn1b = document.querySelector(".stagebtn1b"),
    stagebtn2a = document.querySelector(".stagebtn2a"),
    stagebtn2b = document.querySelector(".stagebtn2b"),
    previouspage = document.querySelector(".previouspage"),
    signUpContent1 = document.querySelector(".stage1-content"),
    signUpContent2 = document.querySelector(".stage2-content");

    signUpContent2.style.display = "none"
    previouspage.style.display = "none"

    function validateStage1() {
        // Validate stage 1 fields here
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone_no").value;
        var address = document.getElementById("address").value;

        if (name === "" || email === "" || phone === "" || address === "") {
            alert("Please fill in all required fields in Stage 1");
            return false;
        }

        if (phone.length !== 13) {
            alert("Contry code is required with the phone number\n\nInvalid Mobile Number... please Count the digit or try again with contry code (+91)");
            return false;
        }

        return true;
    }


    function stage1to2(){
        if (validateStage1()) {
            signUpContent1.style.display = "none";
            signUpContent2.style.display = "block";
            document.querySelector(".stageno-1").innerText = "✔";
            document.querySelector(".stageno-1").style.backgroundColor = "#52ec61";
        }
    }

    function stage2to1(){
        signUpContent1.style.display = "block"
        signUpContent2.style.display = "none"
    }

</script>
@endsection