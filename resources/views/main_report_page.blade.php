<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>QUICKMART | Report us</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_contact_page.css') }}">

</head>
<body class = "active">

@include('website_menu')

<section class="contact">

   <div class="row">

      <div class="image">
         <img src="{{ asset('img/contact-img.svg') }}" alt="">
      </div>

      <form action="https://formsubmit.co/anjalipatel3074@gmail.com" method="POST">
         <h3>report your problem</h3>
         <input type="text" placeholder="Enter your name" name="name" required maxlength="50" class="box">
         <input type="email" placeholder="Enter your email" name="email" required maxlength="50" class="box">
         <input type="text" placeholder="Enter your phone number" name="number" required maxlength="50" class="box">
         <input type="text" placeholder="Enter Subject" name="subject" required maxlength="50" class="box">
         <textarea name="msg" class="box" placeholder="Enter your message" required maxlength="1000" cols="30" rows="10"></textarea>
         <input type="hidden" name="_captcha" value="false">
         <input type="hidden" name="_cc" value="nidhipatelnp1111@gmail.com">
         <input type="hidden" name="_next" value="{{ url(route('captcha_verification_page')) }}">
         <input type="hidden" name="_template" value="table">
         <input type="submit" value="Send Message" class="inline-btn" name="submit">
      </form>

   </div>

   <div class="box-container">

      <div class="box">
         <i class="fas fa-phone"></i>
         <h3>Phone number</h3>
         <a href="tel:1234567890">+917046106554</a>
         <a href="tel:1112223333">+918140732865</a>
      </div>
      
      <div class="box">
         <i class="fas fa-envelope"></i>
         <h3>Email address</h3>
         <a href="mailto:anjalipatel3074@gmail.com">anjalipatel3074@gmail.com</a>
         <a href="mailto:ramesh.inst1@gmail.com">ramesh.inst1@gmail.com</a>
      </div>

      <div class="box">
         <i class="fas fa-map-marker-alt"></i>
         <h3>Address</h3>
         <a href="#">Pethapur | 382610 | Gandhinagar, Gujarat | India</a>
      </div>

   </div>

</section>

@include('website_footer')

<script src="{{ asset('js/main_contact_page.js') }}"></script>
 </body>
</html>