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

    function validateStage2() {
        // Validate stage 2 fields here: username, password, confirm_password
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var confirm_password = document.getElementById("confirm_password").value;

        if (username === "" || password === "" || confirm_password === "") {
            alert("Please fill in all required fields in Stage 2");
            return false;
        }

        return true;
    }

    function validateStage3() {
        // Validate stage 3 fields here : business_name, gst_number, business_description
        var business_name = document.getElementById("business_name").value;
        var business_type = document.getElementById("my_list").value;
        var business_strength = document.getElementById("my_list2").value;
        var product_category = document.getElementById("my_list3").value;
        var gst_number = document.getElementById("gst_number").value;
        var business_description = document.getElementById("business_description").value;

        if (business_name === "" || business_type === "" || business_strength === "" || product_category === "" || gst_number === "" || business_description === "") {
            alert("Please fill in all required fields in Stage 3");
            return false;
        }

        return true;
    }

    function validateStage4() {
        // Validate stage 4 fields here : bank_name, bank_branch, account_holder_name, account_number, proof_of_bank_account_ownership
        var bank_name = document.getElementById("bank_name").value;
        var bank_branch = document.getElementById("bank_branch").value;
        var bank_ifsc_code = document.getElementById("bank_ifsc_code").value;
        var bank_micr_code = document.getElementById("bank_micr_code").value;
        var account_holder_name = document.getElementById("account_holder_name").value;
        var account_number = document.getElementById("account_number").value;
        var account_type = document.getElementById("my_list4").value;
        var proof_of_bank_account_ownership = document.getElementById("proof_of_bank_account_ownership").value;

        if (bank_name === "" || bank_branch === "" || bank_ifsc_code === "" || bank_micr_code === "" || account_holder_name === "" || account_number === "" || account_type === "" || proof_of_bank_account_ownership === "") {
            alert("Please fill in all required fields in Stage 4");
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

    function stage4to5(){
        if (validateStage4()) {
            signUpContent1.style.display = "none"
            signUpContent3.style.display = "none"
            signUpContent2.style.display = "none"
            signUpContent4.style.display = "none"
            signUpContent5.style.display = "block"
            document.querySelector(".stageno-4").innerText = "✔";
            document.querySelector(".stageno-4").style.backgroundColor = "#52ec61";
        }
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