<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Welcome !</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">

</head>
<body class = "active">

@include('website_menu')

<section class="teachers">

   <h1 class="heading" style = "margin-top: 40px">A friendly hello and a big welcome to everyone who has found their way to our website !</h1>
   <div class="box-container">
      <div class="box offer">
         <h3>New Employee</h3>
         <p>New User...?&nbsp;&nbsp;Welcome !<br>Click this "Get Started" button to <br><b>APPLY</b> for Employment in QUICKMART...<br>your journey begins here!<br><span style = "color: transparent;">.</span></p>
         <a href="{{ route('employee_application_page') }}" class="inline-btn">Get Started</a>
      </div>

      <img src="{{ asset('img/10808-removebg-preview.png') }}" alt="welcome image" style = "height: 250px; ">

      <div class="box offer">
         <h3>Account Already Created</h3>
         <p>Already Created An Account...?<br>Welcome Back !<br>Click "login" button to login in <br>your account and then you can <br> access your dashboard !</p>
         <a href="{{ route('employee_login_page_first_step') }}" class="inline-btn">Login</a>
      </div>

         <img src="{{ asset('img/678-removebg-preview.png') }}" alt="employee image" style = "height: 340px; margin-top: -20px;">

      <div class="box offer">
         <h3>Let us Help You</h3>
         <p>Don't Worry ... ! <br>If You Don't know how to Apply<br>for Employment in QUICKMART,<br>just click on the "Help" button to get <br>all the instration and guidance</p>
         <a href="#" class="inline-btn">help</a>
      </div>

      <img src="{{ asset('img/678-removebg-preview-copy.png') }}" alt="employee image" style = "height: 340px; margin-top: -20px; margin-left: 30px;">
   </div>

   <h1 class="heading" style = "margin-top: 50px">Feedbacks from Employees !</h1>
   <div class="box-container">
      <div class="box offer">
         <h3>Leave A Feedback</h3>
         <p>All the Employees can give feedback here<br>for the platform, and let others know<br>about your Working experience on <br>"QUICKMART"</p>
         <a href="{{ route('employee_feedback_page') }}" class="inline-btn">Feedback Form</a>
      </div>

      <div class="box offer">
         <h3>Contact US</h3>
         <p>How may we assist you..?<br>Here you can contact with us in the context of <br>Employee Application/Create Account/Login<br>issue, suggesion or help</p>
         <a href="{{ route('main_contact_page') }}" class="inline-btn">Mail Us</a>
      </div>
   </div>

   <!-- ------------------------ displaying feedbacks ---------------------------- -->
   <h1 class="heading" style = "margin-top: 50px; text-align: center; margin-left: 80px; margin-right: 80px; padding-bottom : 8px;">&#10084; Happy Employees &#10084;</h1>

   <section class="contact" style = "background: pink; padding-top: 1px; padding-bottom: 2.6rem; border-radius: 1.5rem;">

      <div class="box-container">

         @if(count($allEmployeeFeedbacks) > 0)
            @foreach($allEmployeeFeedbacks as $eachEmployeeFeedback)
               <div class="box">
                  <img src="{{ asset('storage/' . $eachEmployeeFeedback->employee->profile_pic)}}" alt="employee User Profile Pic" style = "height : 55px; border-radius: 50%;">

                  <br>
                  <div style = "margin-top: 10px;">
                     @for ($i = 0; $i < $eachEmployeeFeedback->rating; $i++)
                        <i class="fas fa-star" style="font-size: 20px; color: #FFBD13; margin-left: -3px;"></i>
                     @endfor
                  </div>


                  <h3 style = "margin-top: 0;">{{ $eachEmployeeFeedback->employee->name }}</h3>
                  <p>{{ $eachEmployeeFeedback->feedback }}</p>
               </div>   
            @endforeach
         @else
            <div style = "font-size: 22px; text-align: center; color: #454545; font-weight : 900;" >No Any Feedback Available Yet !</div>
         @endif

      </div>

   </section>

   <!-- -------------------------------------------------------------------------- -->

</section>

@include('website_footer')

<!-- custom js file link  -->
<script src="{{ asset('js/main_initial_page.js') }}"></script>  
</body>
</html>