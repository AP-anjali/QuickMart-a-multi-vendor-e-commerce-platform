<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SCOREASY | Feedback</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">
   <style>
        .searched_data_not_available_text{
            text-align: center; 
            margin-top: 20px; 
            color: #454545;
        }

        .container h2{
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
            font-size: 28px;
            color: #454545;
        }
        .container{
            background: pink;
            border-radius: 8px;
            margin: 0 200px;
            padding-top: 20px;
            padding-bottom: 10px;
            text-align: center;
        }

        #nothing_to_show_here_img{
            height: 500px;
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-top: 20px;
        }
    </style>
</head>
<body class = "active">

@include('website_menu')

    <section class="teachers">
        <h1 class="heading" style = "margin-top: 45px; margin-bottom: -30px;">Hello, "{{$customer_session->name}}"</h1>
    </section>

    <div id="feedback_form_body">

        <img src="{{ asset('img/feedback_page_img_without_bg.png') }}" alt="Feedback Image">

        <div class="wrapperanjali">
            <h1>How would you rate to <b>QUICKMART</b> ?</h1>
            <form action="{{ route('customer_feedback_form_submission', $customer_session->id) }}" method = "post">
                @csrf
                <div class="rating">
                    <input type="number" name="rating" hidden>
                    <i class='bx bx-star star' style="--i: 0;"></i>
                    <i class='bx bx-star star' style="--i: 1;"></i>
                    <i class='bx bx-star star' style="--i: 2;"></i>
                    <i class='bx bx-star star' style="--i: 3;"></i>
                    <i class='bx bx-star star' style="--i: 4;"></i>
                </div>
                <textarea name="feedback" cols="30" rows="5" placeholder="Your Feedback..." id = "feedback_textarea" required></textarea>
                <div class="btn-group">
                    <button type="submit" class="btnAnjali submit" onclick = "checkRating()" >Submit</button>
                    <button class="btnAnjali cancel" onclick = "window.location.href = '/'" >Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <section class="contact">

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

<script src="{{ asset('js/feedback_page.js') }}"></script>
<script>

    function checkRating()
    {
        const form = document.querySelector('.wrapperanjali form');

        form.addEventListener('submit', function(event) {
            const rating = document.querySelector('input[name="rating"]').value;
            if (rating === '') {
                event.preventDefault();
                alert('Please select a star rating !');
            }
        });
    }

</script>
@include('website_footer')
</body>
</html>
<!-- ========================================================================================================= -->
