<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Captcha Verification</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/captcha_verification_page.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  </head>
  <body>
    <div class="container">
      <header>Captcha Verificaion</header>
      <div class="input_field captch_box">
        <input type="text" value="" disabled />
        <button class="refresh_button">
          <i class="fa-solid fa-rotate-right"></i>
        </button>
      </div>
      <div class="input_field captch_input">
        <input type="text" placeholder="Enter captcha" id="main_input" />
      </div>
      <div class="message">Entered captcha is correct</div>
      <div class="input_field button disabled">
        <button style = "font-size: 16px;">Submit Captcha</button>
      </div>
    </div>

    <script src="{{ asset('js/captcha_verification_page.js') }}"></script>
  </body>
</html>
