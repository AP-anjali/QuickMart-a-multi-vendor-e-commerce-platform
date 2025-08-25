<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact To Applicant</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_contact_page.css') }}">

</head>
<body class = "active">

<section class="teachers">
   <h1 class="heading" style = "margin-top: 20px; margin-bottom: 30px;">Contact To The "{{ $application_to_contact->name }}" Through MAIL !</h1>
</section>

<section class="contact" style = "margin-top: -150px;">

   <div class="row">

      <div class="image">
         <img src="{{ asset('img/contact-img.svg') }}" alt="">
      </div>

      <form action="https://formsubmit.co/{{ $application_to_contact->email }}" method="POST">
         <h3>Contact To Specific Applicant</h3>
         <input type="text" placeholder="Enter Subject" name="subject" value = "In The Context Of Delivery Job In QUICKMART" required maxlength="50" class="box">
         <textarea name="msg" class="box" placeholder="Enter your message" required maxlength="1000" cols="30" rows="10">Hey There ...! You are in the semifinal stage for delivery job in quickmart, if you have interest further in this, then come at our office(Address in the contact us page) tomorrow with all the required documents and vehicle also, Thank You So Much !</textarea>
         <input type="hidden" name="_captcha" value="false">
         <input type="hidden" name="_cc" value="nidhipatelnp1111@gmail.com">
         <input type="hidden" name="_next" value="{{ url(route('main_employee_dashboard_mail_sent_successfully_to_the_delivery_boy_for_contact', $application_to_contact->id)) }}">
         <input type="hidden" name="_template" value="table">
         <input type="button" onclick = "exit_from_contacting_delivery_applicant()" style = "margin-right: 10px; width: 177.97px;" value="Exit" class="inline-btn">
         <input type="hidden" value="{{ $employee_session->id }}" name="emp_id">
         <input type="submit" value="Send Message" class="inline-btn">
      </form>

   </div>

</section>

<script src="{{ asset('js/main_contact_page.js') }}"></script>
<script>
    function exit_from_contacting_delivery_applicant(){
        window.location.replace("/main_employee_dashboard/main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page");
    }
</script>
 </body>
</html>