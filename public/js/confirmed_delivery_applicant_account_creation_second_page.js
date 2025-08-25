let signUpContent = document.querySelector(".signup-form-container"),
stagebtn1b = document.querySelector(".stagebtn1b"),
stagebtn2a = document.querySelector(".stagebtn2a"),
stagebtn2b = document.querySelector(".stagebtn2b"),
stagebtn3a = document.querySelector(".stagebtn3a"),
stagebtn3b = document.querySelector(".stagebtn3b"),
previouspage = document.querySelector(".previouspage"),
signUpContent1 = document.querySelector(".stage1-content"),
signUpContent2 = document.querySelector(".stage2-content");

signUpContent2.style.display = "none"
previouspage.style.display = "none"

document.querySelector(".stageno-1").innerText = "✔";
document.querySelector(".stageno-1").style.backgroundColor = "#52ec61";

function validateStage1() {
    // Validate stage 1 fields here
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (username === "" || password === "" || confirm_password === "") {
        alert("Please fill in all required fields in Stage 1");
        return false;
    }

    return true;
}


function stage1to2(){
    if (validateStage1()) {
        signUpContent1.style.display = "none";
        signUpContent2.style.display = "block";
        document.querySelector(".stageno-2").innerText = "✔";
        document.querySelector(".stageno-2").style.backgroundColor = "#52ec61";
    }
}

function stage2to1(){
    signUpContent1.style.display = "block"
    signUpContent2.style.display = "none"
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