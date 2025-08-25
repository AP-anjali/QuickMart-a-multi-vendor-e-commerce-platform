const cover = document.querySelector('.cover');
const registerlink = document.querySelector('.register-link');
const loginlink = document.querySelector('.login-link');

registerlink.onclick = () => {
    cover.classList.add('active');

}

loginlink.onclick = () => {
    cover.classList.remove('active');

}

function showPlaceholder() {
    var input = document.getElementById('myInput');
    input.value = ''; // Clear the input field
    input.placeholder = 'Enter Your Full Name'; // Show the placeholder text
  }

  function showPlaceholder1() {
    var input = document.getElementById('myInput1');
    input.value = ''; // Clear the input field
    input.placeholder = 'Mobile Number with country code'; // Show the placeholder text
  }

  function showPlaceholder2() {
    var input = document.getElementById('myInput2');
    input.value = ''; // Clear the input field
    input.placeholder = 'Enter Your Full Address'; // Show the placeholder text
  }

  function showPlaceholder3() {
    var input = document.getElementById('myInput3');
    input.value = ''; // Clear the input field
    input.placeholder = 'Mobile Number with country code'; // Show the placeholder text
  }

  function showPlaceholder4() {
    var input = document.getElementById('myInput4');
    input.value = ''; // Clear the input field
    input.placeholder = 'Enter OTP sent on your mobile no'; // Show the placeholder text
  }
