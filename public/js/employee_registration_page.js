let signUpContent = document.querySelector(".signup-form-container"),
stagebtn1b = document.querySelector(".stagebtn1b"),
stagebtn2a = document.querySelector(".stagebtn2a"),
stagebtn2b = document.querySelector(".stagebtn2b"),
stagebtn3a = document.querySelector(".stagebtn3a"),
stagebtn3b = document.querySelector(".stagebtn3b"),
previouspage = document.querySelector(".previouspage"),
signUpContent1 = document.querySelector(".stage1-content"),
signUpContent2 = document.querySelector(".stage2-content"),
signUpContent3 = document.querySelector(".stage3-content"),
signUpContent4 = document.querySelector(".stage4-content"),
signUpContent5 = document.querySelector(".stage5-content");

signUpContent2.style.display = "none"
signUpContent3.style.display = "none"
signUpContent4.style.display = "none"
signUpContent5.style.display = "none"
previouspage.style.display = "none"

function validateStage1() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone_no").value;
    var address = document.getElementById("address").value;
    var gender = document.getElementById("gender").value;
    var date_of_birth = document.getElementById("date_of_birth").value;
    var photo = document.getElementById("photo").files;
    var Aadharcard = document.getElementById("Aadharcard").files;


    if (name === "" || email === "" || phone === "" || address === "" || gender === "Select gender" || date_of_birth === "" || photo.length === 0 || Aadharcard.length === 0) {
        alert("Please fill in all required fields in Stage 1");
        return false;
    }

    if (phone.length !== 13) {
        alert("Contry code is required with the phone number\n\nInvalid Mobile Number... please Count the digit or try again with contry code (+91)");
        return false;
    }

    return true;
}

function validateStage2() {
    var percentage_of_twelve = document.getElementById("percentage_of_twelve").value;
    var proof_of_percentage_of_twelve = document.getElementById("proof_of_percentage_of_twelve").files;
    var confirmation_of_computer_knowlege = document.getElementById("confirmation_of_computer_knowlege").checked;

    if (percentage_of_twelve === "" || proof_of_percentage_of_twelve.length === 0 || !confirmation_of_computer_knowlege) {
        alert("Please fill in all required fields in Stage 2");
        return false;
    }

    return true;
}

function validateStage3() {
    var bank_name = document.getElementById("bank_name").value;
    var bank_branch = document.getElementById("bank_branch").value;
    var bank_ifsc_code = document.getElementById("bank_ifsc_code").value;
    var bank_micr_code = document.getElementById("bank_micr_code").value;
    var account_holder_name = document.getElementById("account_holder_name").value;
    var account_number = document.getElementById("account_number").value;
    var account_type = document.getElementById("my_list4").value;
    var proof_of_bank_account_ownership = document.getElementById("proof_of_bank_account_ownership").value;

    if (bank_name === "" || bank_branch === "" || bank_ifsc_code === "" || bank_micr_code === "" || account_holder_name === "" || account_number === "" || account_type === "" || proof_of_bank_account_ownership === "") {
        alert("Please fill in all required fields in Stage 3");
        return false;
    }

    if (bank_micr_code.length !== 9) {
        alert("The MICR Code Of Your Account Must be of 9 Digit..., Please Try Again");
        return false;
    }

    if (bank_ifsc_code.length !== 11) {
        alert("The IFSC Code Of Your Account Must be of 11 Character..., Please Try Again");
        return false;
    }

    return true;
}

function validateStage4() {
    var experience_job = document.getElementById("experience_job").value;
    var experience_job_workplace = document.getElementById("experience_job_workplace").value;
    var experience_job_duration = document.getElementById("experience_job_duration").value;
    var proof_of_experience = document.getElementById("proof_of_experience");

    if (experience_job === "" || experience_job_workplace === "" || experience_job_duration === "" || !proof_of_experience.files || proof_of_experience.files.length === 0) {
        alert("Please fill in all required fields in Stage 4");
        return false;
    }

    return true;
}

function stage4to5(){
    if (validateStage4()) {
        signUpContent1.style.display = "none";
        signUpContent3.style.display = "none";
        signUpContent2.style.display = "none";
        signUpContent4.style.display = "none";
        signUpContent5.style.display = "block";
        document.querySelector(".stageno-4").innerText = "✔";
        document.querySelector(".stageno-4").style.backgroundColor = "#52ec61";
    }
}

function validatenoexperience() {
    var experience_job = document.getElementById("experience_job").value;
    var experience_job_workplace = document.getElementById("experience_job_workplace").value;
    var experience_job_duration = document.getElementById("experience_job_duration").value;
    var experience_description = document.getElementById("experience_description").value;
    var proof_of_experience = document.getElementById("proof_of_experience").files;

    if (experience_job !== "" || experience_job_workplace !== "" || experience_description !== "" || experience_job_duration !== "" || proof_of_experience.length !== 0) {
        alert("Please empty all fields in this stage if you want to skip the Experience section");
        return false;
    } else {
        return true;
    }
}

function noexperience() {
    if (validatenoexperience()) {
        signUpContent1.style.display = "none";
        signUpContent3.style.display = "none";
        signUpContent2.style.display = "none";
        signUpContent4.style.display = "none";
        signUpContent5.style.display = "block";
        document.querySelector(".stageno-4").innerText = "✔";
        document.querySelector(".stageno-4").style.backgroundColor = "#52ec61";
    }
}


function stage1to2(){
    if (validateStage1()) {
        signUpContent1.style.display = "none";
        signUpContent3.style.display = "none";
        signUpContent2.style.display = "block";
        signUpContent4.style.display = "none";
        signUpContent5.style.display = "none";
        document.querySelector(".stageno-1").innerText = "✔";
        document.querySelector(".stageno-1").style.backgroundColor = "#52ec61";
    }
}

function stage2to1(){
    signUpContent1.style.display = "block"
    signUpContent3.style.display = "none"
    signUpContent2.style.display = "none"
    signUpContent4.style.display = "none"
    signUpContent5.style.display = "none"
}

function stage2to3(){
    if (validateStage2()) {
        signUpContent1.style.display = "none"
        signUpContent3.style.display = "block"
        signUpContent2.style.display = "none"
        signUpContent4.style.display = "none"
        signUpContent5.style.display = "none"
        document.querySelector(".stageno-2").innerText = "✔";
        document.querySelector(".stageno-2").style.backgroundColor = "#52ec61";
    }
}

function stage3to2(){
    signUpContent1.style.display = "none"
    signUpContent3.style.display = "none"
    signUpContent2.style.display = "block"
    signUpContent4.style.display = "none"
    signUpContent5.style.display = "none"
}

function stage3to4(){
    if (validateStage3()) {
        signUpContent1.style.display = "none"
        signUpContent3.style.display = "none"
        signUpContent2.style.display = "none"
        signUpContent4.style.display = "block"
        signUpContent5.style.display = "none"
        document.querySelector(".stageno-3").innerText = "✔";
        document.querySelector(".stageno-3").style.backgroundColor = "#52ec61";
    }
}

function stage4to3(){
    signUpContent1.style.display = "none"
    signUpContent3.style.display = "block"
    signUpContent2.style.display = "none"
    signUpContent4.style.display = "none"
    signUpContent5.style.display = "none"
}

function stage5to4(){
    signUpContent1.style.display = "none"
    signUpContent3.style.display = "none"
    signUpContent2.style.display = "none"
    signUpContent4.style.display = "block"
    signUpContent5.style.display = "none"
}

document.addEventListener('DOMContentLoaded', function() {
    var textFields = document.querySelectorAll('.text-fields input');

    textFields.forEach(function(input) {
        input.addEventListener('focus', function() {
            this.parentElement.style.borderColor = '#696cff';
        });

        input.addEventListener('blur', function() {
            this.parentElement.style.borderColor = ''; 
        });
    });
});