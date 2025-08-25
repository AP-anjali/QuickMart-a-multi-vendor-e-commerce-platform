<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/seller_registration_page.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login-link" id = "loginLink">
            <div class="logo">
                <i class='bx bxs-objects-vertical-bottom'></i>
                <span class="text">QUICKMART</span>
            </div>
            <p class="side-big-headning" style = "text-align: center;">Already a member?</p>
            <p class="primary-bg-text">To keep track on your dashboard, please login with your personal info</p>
            <a href="{{ route('seller_login_page') }}" class="loginbtn">Login</a>
        </div>
        <form action="{{ route('seller_registration_form_submission_route') }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
            @csrf
            <p class="big-headning">Create Account</p>
            <div class="social-media-platform">
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
                <a href="#"><i class='bx bx-sm bxs-objects-vertical-bottom'></i></a>
            </div>
            <div class="progress-bar">
                <div class="stage">
                    <p class="tool-tip">Personal Info</p>
                    <p class="stageno stageno-1">1</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Un & Ps</p>
                    <p class="stageno stageno-2">2</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Business Info</p>
                    <p class="stageno stageno-3">3</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Banking Info</p>
                    <p class="stageno stageno-4">4</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Submission</p>
                    <p class="stageno stageno-5">5</p>
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
                        <input type="button" value="Previous" class="previouspage stagebtn2a" onclick = "stage2to1()">
                        <input type="button" value="Next" class="nextpage stagebtn2b" onclick = "stage2to3()">
                    </div>
                </div>
                <div class="stage3-content">
                    <div class="button-container">
                        <div class="text-fields business_name" style = "width: 290px;">
                            <label for="business_name"><i class='bx bxs-bank' style='color:#6487cb'></i></label>
                            <input type="text" name="business_name" id="business_name" placeholder="Your Business Name" required>
                        </div>
                        <div class="text-fields business_type" style = "width: 290px;">
                            <label for="business_type"><i class='bx bx-objects-vertical-bottom' style='color:#6487cb'></i></i></label>
                            <select name="business_type" id="my_list" required>
                                <option value="" selected disabled>Select Business Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <option value="retail">Retail</option>
                                <option value="wholesale">Wholesale</option>
                                <option value="manufacturing">Manufacturing</option>
                            </select>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields business_strength" style = "width: 290px;">
                            <label for="business_strength"><i class='bx  bxs-check-shield' style='color:#6487cb'></i></i></label>
                            <select name="business_strength" id="my_list2" required>
                                <option value="" selected disabled>Select Business Strength&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <option value="Individual Seller">Individual Seller</option>
                                <option value="Partnership">Partnership</option>
                                <option value="Corporation">Corporation</option>
                            </select>
                        </div>
                        <div class="text-fields product_category" style = "width: 290px;">
                            <label for="product_category"><i class='bx bx-copy-alt' style='color:#6487cb'></i></i></label>
                            <select name="product_category" id="my_list3" required>
                                <option value="" selected disabled>Select Product Category&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <option value="Electronics">Electronics</option>
                                <option value="Clothes">Clothes</option>
                                <option value="Cosmetics">Cosmetics</option>
                                <option value="Multiple Products">Multiple Products</option>
                                <option value="Other....">Other....</option>
                            </select>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields gst_number" style = "width: 290px;">
                            <label for="gst_number"><i class='bx bx-bolt-circle' style='color:#6487cb'></i></i></label>
                            <input type="text" name="gst_number" id="gst_number" placeholder="Product GST Number" required>
                        </div>
                        <div class="text-fields business_description" style = "width: 290px;">
                            <label for="business_description"><i class='bx bxl-unity' style='color:#6487cb'></i></i></label>
                            <input type="text" name="business_description" id="business_description" placeholder="About Your Business" required>
                        </div>
                    </div>
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previouspage stagebtn3a" onclick = "stage3to2()">
                        <input type="button" value="Next" class="nextpage stagebtn3b" onclick = "stage3to4()">
                    </div>
                </div>
                <div class="stage4-content">
                    <div class="button-container" style = "margin-top: -5px;">
                        <div class="text-fields bank_name" >
                            <label for="bank_name"><i class='bx bxs-bank' style='color:#6487cb'></i></label>
                            <input type="text" name="bank_name" id="bank_name" placeholder="Your Bank Name" required>
                        </div>
                        <div class="text-fields bank_branch" >
                            <label for="bank_branch"><i class='bx bxs-doughnut-chart ' style='color:#6487cb'></i></label>
                            <input type="text" name="bank_branch" id="bank_branch" placeholder="Branch of Bank" required>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields bank_ifsc_code" >
                            <label for="bank_ifsc_code"><i class='bx bxs-check-shield' style='color:#6487cb'></i></label>
                            <input type="text" name="bank_ifsc_code" id="bank_ifsc_code" placeholder="Bank Account IFSC Code" required>
                        </div>
                        <div class="text-fields bank_micr_code" >
                            <label for="bank_micr_code"><i class='bx bxs-check-shield' style='color:#6487cb'></i></label>
                            <input type="text" name="bank_micr_code" id="bank_micr_code" placeholder="Bank Account MICR Code" required>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields account_holder_name">
                            <label for="account_holder_name"><i class='bx bxs-user' style='color:#6487cb'></i></label>
                            <input type="text" name="account_holder_name" id="account_holder_name" placeholder="Name of Account Owner" required>
                        </div>
                        <div class="text-fields account_number">
                            <label for="account_number"><i class='bx bxs-add-to-queue' style='color:#6487cb'></i></label>
                            <input type="text" name="account_number" id="account_number" placeholder="Bank Account Number" required>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields account_type">
                            <label for="account_type"><i class='bx bxs-grid' style='color:#6487cb'></i></i></label>
                            <select name="account_type" id="my_list4" required>
                                <option value="" selected disabled>Select Account Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                <option value="Savings Account">Savings Account</option>
                                <option value="Checking Account">Checking Account</option>
                                <option value="Certificate of Deposit Account">Certificate of Deposit Account</option>
                                <option value="Money Market Account">Money Market Account</option>
                            </select>
                        </div>
                        <div class="file_uploader">
                            <label for="proof_of_bank_account_ownership"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                            <input type="file" name="proof_of_bank_account_ownership" id="proof_of_bank_account_ownership" required>
                        </div>
                        <div class="file_uploader_heading">Proof of Bank Account Ownership</div>
                    </div>
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previouspage stagebtn4a" onclick = "stage4to3()">
                        <input type="button" value="Next" class="nextpage stagebtn4b" onclick = "stage4to5()">
                    </div>
                </div>
                <div class="stage5-content">
                    <div class="tc-container">
                        <label for="tc" class="tc">
                            <input type="checkbox" name="tc" id="tc" required>
                            By submitting your details, you agree to the <a href="#">terms and conditions</a>
                        </label>
                    </div>
                    <br>
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previouspage stagebtn5a" onclick = "stage5to4()">
                        <input type="submit" value="Submit" class="nextpage stagebtn5b">
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="{{ asset('js/seller_registration_page.js') }}"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>