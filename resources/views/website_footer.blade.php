<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>contact us</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">

</head>
<body class = "active">

<div class="goToTopBtn" id="arrow_shower">
    <i class='bx bx-upload bx-flashing' id = "gototop"></i>
</div>


<footer class="footer"  id="stickyFooter">

    QUICKMART&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>An online-shopping Multi-vendor website !</span> 


</footer>

<footer class="my_footer_logo" id = "section_id2">
   <div class="my_footer_logo_content" id = "test32">
      <img src="{{ asset('img/footer_logo1.png') }}" style = "width : 270px; heigth : 220px;" alt="logo" id = "khiskona">
      <p style="text-align: justify;">The <b>QUICKMART</b> is one type of an Online Shopping System, where multiple types of users can perform their role...</p>

      <div class="my_footer_logo_icons">
         <a href="#"><i class='bx bxl-whatsapp'></i></a>
         <a onclick="window.open('//www.linkedin.com/in/anjali-patel-a95996264/', '_blank')" style = "cursor: pointer;"><i class='bx bxl-linkedin-square'></i></a>
         <a href="#"><i class='bx bxl-github' ></i></a>
         <a href="#"><i class='bx bxl-twitter'></i></a>
         <a href="mailto:anjalipatel3074@gmail.com"><i class='bx bxl-gmail'></i></a>
      </div>
   </div>
</footer>

<footer class="my_footer" id = "section_id">
   <div class="my_footer_content">
      <h4>Get to Know Us</h4>
      <li><a href="#">Quickmart Family</a></li>
      <li><a href="{{ route('main_about_page') }}">About Us</a></li>
      <li><a href="#">Site Map</a></li>
      <li><a href="#">Quickmart Services</a></li>
      <li><a href="#">Terms and Conditions</a></li>
   </div>

   <div class="my_footer_content">
      <h4>Connect with Us</h4>
      <li><a href="#">Twitter</a></li>
      <li style = "cursor: pointer;"><a onclick="window.open('//www.linkedin.com/in/anjali-patel-a95996264/', '_blank')">LinkedIn</a></li>
      <li><a href="{{ route('main_contact_page') }}">Contact Us</a></li>
      <li><a href="{{ route('sellers_feedback_page') }}">Feedback Form | Sellers</a></li>
      <li><a href="{{ route('customer_feedback_page') }}">Feedback Form | Customers</a></li>
      <li><a href="{{ route('employee_feedback_page') }}">Feedback Form | Employees</a></li>
      <li><a href="{{ route('delivery_team_member_feedback_page') }}">Feedback Form | Delivery Team</a></li>
   </div>

   <div class="my_footer_content">
      <h4>Make Money with Us</h4>
      <li><a href="{{ route('sellers_first_window') }}">Sell On Quickmart</a></li>
      <li><a href="{{ route('delivery_team_first_window') }}">Delivery Team</a></li>
      <li><a href="#">Advertise Your Products</a></li>
      <li><a href="#">Career Opportunities</a></li>
      <li><a href="{{ route('employees_first_window') }}">Employee Area</a></li>
   </div>

   <div class="my_footer_content">
      <h4>Let Us Help You</h4>
      <li><a href="#">Customer Support</a></li>
      <li><a href="#">Accessibility Assistance</a></li>
      <li><a href="#">Video Demonstrations</a></li>
      <li><a href="#">Updates</a></li>
      <li><a href="#">Help Center</a></li>
   </div>

   <div class="my_footer_content">
      <h4>Address Info</h4>
      <p style = "width : 200px">Pethapur village | 382610  Gandhinagar, Gujarat | India Telephone: <a href="tel:044-45614700" id = "telLink">044-45614700</a></p>
      <li><a href="#">Info About All Sections</a></li>
      <br><br>
      <p style = "font-size: 14px; color: #878787;"><b>MADE WITH &#10084; BY ANJALI PATEL</b></p>
   </div>
</footer>

<!-- custom js file link  -->
<script src="{{ asset('js/main_initial_page.js') }}"></script>

<script>
   window.onscroll = function() {
      stickyFooter();
   };

   function stickyFooter() {
      var myFooter = document.querySelector(".my_footer");
      var footer = document.getElementById("stickyFooter");
      var sticky = myFooter.offsetTop;

      if (window.pageYOffset >= sticky) {
         footer.classList.add("sticky");
      } else {
         footer.classList.remove("sticky");
      }
   }

   // Additional script to handle scrolling up
   var prevScrollpos = window.pageYOffset;

   window.onscroll = function() {
      var currentScrollPos = window.pageYOffset;

      if (prevScrollpos > currentScrollPos) {
         footer.classList.remove("sticky");
      }

      prevScrollpos = currentScrollPos;
   };

   let show_btn_element = document.getElementById("arrow_shower");
   let clicked_element = document.getElementById("gototop");

   clicked_element.style.display = "none";
   show_btn_element.style.display = "none";

   window.addEventListener('scroll', function(){
      if(pageYOffset > 550)
      {
         clicked_element.style.display = "inline";
         show_btn_element.style.display = "inline";
      }
      else
      {
         clicked_element.style.display = "none";
         show_btn_element.style.display = "none";
      }
   });

   show_btn_element.addEventListener('click', function(){
      // document.documentElement.scrollTop = 0;
      document.documentElement.scrollIntoView({ behavior: 'smooth' });
   });

</script>


   
</body>
</html>