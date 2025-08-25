<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>QUICKMART | ABOUT US</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">
   <style>
        #main-pic{
            margin-left: 10%;
            margin-top: 5px;
        }
        .clg_logo{
            height: 180px;
        }
        .bpccs{
            margin-left: 65%;
        }
        .about_text{
            font-size: 14px;
            padding : 0 50px;
            color: #454545;
        }
        .about_text h1{
            text-align: justify;
            margin-top: 35px;
        }
   </style>
</head>
<body class = "active">

@include('website_menu')


<section class="contact">

    <div class="customer_account_second_part_main_container" id = "secured_data_that_need_user_verification_for_account_deletion">
        <img src="{{ asset('img/anjali_pics/KSV.png') }}" alt="KSV" class = "clg_logo">
        <img src="{{ asset('img/anjali_pics/BPCCS.png') }}" alt="BPCCS" class = "clg_logo bpccs">

        <div class="about_text">

            <h1>Welcome to [QUICKMART], an innovative multi-vendor e-commerce platform designed to redefine the online shopping experience. Our project caters to a diverse range of users, including administrators, sellers, customers, delivery personnel, and employees. Each user plays a crucial role in creating a seamless and efficient marketplace where buyers and sellers can connect and transact effortlessly.</h1>

            <h1><span style = "text-decoration: underline;">Administrator:</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; As the backbone of the platform, administrators oversee the entire operation, ensuring smooth functionality and user satisfaction. They manage user accounts, monitor transactions, handle disputes, and maintain the integrity of the marketplace. With a focus on transparency and security, administrators work tirelessly to uphold the platform's reputation and trustworthiness.</h1>

            <h1><span style = "text-decoration: underline;">Seller:</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sellers are the lifeblood of our marketplace, offering a wide array of products and services to our discerning customers. Whether they are independent artisans, small businesses, or established brands, sellers have the opportunity to showcase their offerings to a global audience. Our platform provides sellers with robust tools and resources to manage their inventory, track sales, and connect with potential buyers.</h1>

            <h1><span style = "text-decoration: underline;">Customer:</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; At [QUICKMART], customer satisfaction is paramount. Our user-friendly interface and seamless shopping experience ensure that customers can browse, purchase, and track their orders with ease. From personalized recommendations to secure payment options, we strive to exceed customer expectations at every touchpoint. With a vast selection of products and competitive prices, customers can find everything they need conveniently on our platform.</h1>

            <h1><span style = "text-decoration: underline;">Delivery Personnel:</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Delivery personnel play a crucial role in fulfilling orders and ensuring timely delivery to customers. Equipped with our advanced logistics system, delivery boys efficiently manage their routes, optimize delivery schedules, and provide real-time updates to customers. Their dedication and reliability ensure that orders reach customers safely and on time, enhancing the overall shopping experience.</h1>

            <h1><span style = "text-decoration: underline;">Employee:</span> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Behind the scenes, our dedicated team of employees works tirelessly to support and enhance the platform's functionality. Their collective efforts contribute to the success and growth of [QUICKMART], making it a premier destination for online shopping.</h1>

            <h1>Together, our diverse community of users forms the foundation of [QUICKMART], shaping it into a dynamic and thriving marketplace. Join us on this journey as we revolutionize the way people shop</h1>

            <h1 style = "font-size: 16px; color: #878787; text-align: center;">MADE WITH &#10084; BY ANJALI PATEL</h1>
        </div>

    </div>

    <div class="customer_account_main_container">
        <img src="{{ asset('img/anjali_pics/name.png') }}" alt="photo" id = "main-pic">
        <h1 style = "font-size: 16px; color: #878787; text-align: center; margin-top: 20px;">anjalipatel3074@gmail.com <span style = "margin-left: 20px;">|</span> <span style = "margin-left: 20px;">+917046106554</span> </h1>
    </div>

</section>

@include('website_footer')

<script src="{{ asset('js/main_initial_page.js') }}"></script> 
</body>
</html>