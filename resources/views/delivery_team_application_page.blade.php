<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Job Application</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/delivery_team_registration_page.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
        <div class="login-link" id = "loginLink">
            <div class="logo">
                <i class='bx bxs-objects-vertical-bottom'></i>
                <span class="text">QUICKMART</span>
            </div>
            <p class="side-big-headning" style = "text-align: center; align-items:center; justify-content: center; margin-top: 170px;">Already Confirmed?</p>
            <p class="primary-bg-text">To keep track on your dashboard, please login with your personal info</p>
            <a href="{{ route('delivery_team_member_login_page_first_step') }}" class="loginbtn">Login</a>
        </div>
        <form action="{{ route('delivery_team_application_form_submission_route') }}" method = "post" class="signup-form-container" enctype="multipart/form-data">
            @csrf
            <p class="big-headning">Apply For Delivery Job</p>
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
                    <p class="tool-tip" style = "white-space: nowrap;">Vehicle Info</p>
                    <p class="stageno stageno-2">2</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Banking Info</p>
                    <p class="stageno stageno-3">3</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Experience Info</p>
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
                    <div class="button-container">
                        <div class="text-fields gender">
                        <label for="gender"><i class='bx bx-male-female' style='color:#6487cb'></i></i></label>
                            <select name="gender" id="gender" required>
                                <option value="" selected disabled>Select gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="text-fields date_of_birth">
                            <label for="date_of_birth"><i class='bx bx-calendar' style='color:#6487cb'></i></label>
                            <input type="date" name="date_of_birth" id="date_of_birth" required>
                        </div>
                    </div>
                    <div class="button-container">

                        <div class="file_uploaderphoto">
                            <label for="photo"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                            <input type="file" name="photo" id="photo" required>
                        </div>
                        <div class="file_uploader_headingphoto">Photo</div>

                        <div class="file_uploaderaadharcard">
                            <label for="Aadharcard"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                            <input type="file" name="Aadharcard" id="Aadharcard" required>
                        </div>
                        <div class="file_uploader_headingadgarcard">Aadharcard</div>
                    </div>
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previouspage stagebtn1a">
                        <input type="button" value="Next" class="nextpage stagebtn1b" onclick = "stage1to2()">
                    </div>
                </div>
                <div class="stage2-content">
                    <div class="button-container">
                        <div class="file_uploaderpercentage">
                            <label for="vehicle_rc_book"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                            <input type="file" name="vehicle_rc_book" id="vehicle_rc_book" required>
                        </div>
                        <div class="file_uploader_headingadgpercentage">Vehicle RC Book</div>
                        <div class="file_uploaderpercentage" style = "margin-left : -120px;">
                            <label for="vehicle_puc"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                            <input type="file" name="vehicle_puc" id="vehicle_puc" required>
                        </div>
                        <div class="file_uploader_headingadgpercentage">Vehicle PUC</div>
                    </div>

                    <div class="button-container">
                        <div class="file_uploaderpercentage">
                            <label for="vehicle_licence"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                            <input type="file" name="vehicle_licence" id="vehicle_licence" required>
                        </div>
                        <div class="file_uploader_headingadgpercentage">Vehicle Licence</div>
                        <div class="file_uploaderpercentage" style = "margin-left : -120px;">
                            <label for="vehicle_insurance"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                            <input type="file" name="vehicle_insurance" id="vehicle_insurance" required>
                        </div>
                        <div class="file_uploader_headingadgpercentage">Vehicle Insurance</div>
                    </div>
                    
                    <div class="pagination-btns">
                        <input type="button" value="Previous" class="previouspage stagebtn2a" onclick = "stage2to1()">
                        <input type="button" value="Next" class="nextpage stagebtn2b" onclick = "stage2to3()">
                    </div>
                </div>
                <div class="stage3-content">
                    <div class="button-container">
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
                                    <option value="" selected disabled>Select Account Type</option>
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
                        <input type="button" value="Previous" class="previouspage stagebtn3a" onclick = "stage3to2()">
                        <input type="button" value="Next" class="nextpage stagebtn3b" onclick = "stage3to4()">
                    </div>
                </div>
                <div class="stage4-content">
                    <div class="button-container" style = "margin-top: -5px;">
                        <div class="text-fields experience_job" >
                            <label for="experience_job"><i class='bx bxs-bank' style='color:#6487cb'></i></label>
                            <input type="text" name="experience_job" id="experience_job" placeholder="Your Past Job">
                        </div>
                        <div class="text-fields experience_job_workplace" >
                            <label for="experience_job_workplace"><i class='bx bxs-doughnut-chart ' style='color:#6487cb'></i></label>
                            <input type="text" name="experience_job_workplace" id="experience_job_workplace" placeholder="Past Place Of Job">
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields experience_job_duration" >
                            <label for="experience_job_duration"><i class='bx bxs-check-shield' style='color:#6487cb'></i></label>
                            <input type="text" name="experience_job_duration" id="experience_job_duration" placeholder="Job Duration, Ex: 3years">
                        </div>
                        <div class="file_uploaderexperience">
                            <label for="proof_of_experience"><i  class='bx bxs-folder-open' style='color:#6487cb'></i></label>
                            <input type="file" name="proof_of_experience" id="proof_of_experience">
                        </div>
                        <div class="file_uploader_headingadgexperience">Proof Of Experience</div>                        
                    </div>
                    <div class="button-container" style="margin-top: 50px; text-align: center; align-items: center; justify-content: center; margin-right: 320px; ">
                        <div class="custome-text-fields other_educational_details">
                            <textarea name="experience_description" id="experience_description" placeholder="Past Experience Description...!" style="width: 290px !important; height: 120px !important;"></textarea>
                        </div>
                    </div> 
                    <div class="file_uploader_headingexperience">Experience Description *</div>

                        <input type="button" value="No Experience [Skip]" class="nextpage stagebtn4b" id ="no_experience" onclick = "noexperience()">

                    <div class="pagination-btns" style = "margin-top: -30px;">
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
<script src="{{ asset('js/delivery_team_registration_page.js') }}"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</html>