<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Seller Complated Orders</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">
   <style>
        #nothing_to_show_here_img{
            height: 500px;
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-top: 20px;
        }

        .container h2{
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
            font-size: 28px;
            color: #454545;
        }

        .msg{
            width: 35%;
            text-align: center;
            height: 50px;
            color: green;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-left: 32%;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }

        .msgTry{
            width: 30%;
            text-align: center;
            height: 50px;
            color: green;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-left: 32%;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }

        .msg_buy{
            width: 80%;
            text-align: center;
            height: 50px;
            color: green;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            margin-top: 30px;
        }

        #popup-btn{
            height: 80%;
            margin-bottom: 8px;
            width: 30px;
            padding-bottom: 4px;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            background: rgba(0,0,0,.2);
            margin-left: 12%;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        .msg2{
            width: 90%;
            text-align: center;
            height: 50px;
            color: green;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-left: 5%;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        #popup-btn2{
            height: 80%;
            margin-bottom: 8px;
            width: 30px;
            padding-bottom: 4px;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            background: rgba(0,0,0,.2);
            margin-left: 12%;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }


        #product_link_in_name{
            color: #212121;
            font-weight: 600;
            transition: 0.1s all ease;
        }

        #product_link_in_name:hover{
            text-decoration: underline;
        }

        #line_between_products{
            width: 90%;
            margin: auto;
            background: #454545;
            height: 2px;
        }
        .razorpay-payment-button {
            padding: 10px 30px;
            margin-top: 10px;
            margin-left: 5%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            background: #9370DB;
            color: white;
            white-space: nowrap;
            border-radius: 0.5rem;
        }

        .paymet_done_msg_image{
            margin-top: 10px;
            height: 100px;
        }

        .payment_done_msg_container{
            background: pink;
            width: 60%;
            height: 250px;
            color: green;
            text-align: center;
            font-size: 20px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-bottom: 20px;
            margin-top: 40px;
            margin-left: 20%;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }
        .payment_done_main_msg{
            margin-top: 15px;
        }

        .flipped-icon {
            transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform-origin: center;
            -webkit-transform-origin: center;
        }
    </style>
</head>
<body class = "active">
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const id_for_close_btn = document.getElementById('id_for_close_btn');
        if (id_for_close_btn) {
            const scrollPosition = id_for_close_btn.offsetTop - 40;
            window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
        }
    });
</script>
@include('website_menu')

<section class="contact">

<section class="teachers">
   <h1 class="heading" style = "margin-top: 20px; margin-bottom: 30px;">Your Complated Order Records !</h1>
</section>

    @if(Session()->has('order_marked_as_Pending'))
        <div class="msg" id="msg1">
            {{session()->get('order_marked_as_Pending')}}
            <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
        </div>
    @endif


    <div class="all_product_image_container" style = "padding-left: 20px;">

        @if(count($all_order_data_of_logged_in_user) > 0)
            @foreach($all_order_data_of_logged_in_user as $index => $each_order)

                <div style = "width: 100%;">
                    <div class="product-card" data-product-id="{{ $each_order->id }}" style = "width: 30%; padding-bottom: 20px;">
                        <a href="{{ route('product', $each_order->product->id) }}" target="_blank" class="">
                            <div class="product-front-image">
                                <div class="front-image">
                                    <img src="{{ asset('storage/' . $each_order->product->product_main_image) }}" class="img-fluid" alt="">
                                </div>

                                <div class="owl-slider">
                                    <div id="carousel3" class="owl-carousel product-slider">
                                        @foreach($each_order->product->product_other_images as $image)
                                            <div class="product-image">
                                                <img src="{{ asset('storage/' . $image) }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="product-details" style = "position : absolute; margin-left: 380px; margin-top: -280px;">

                            <div class="price-info-section" style = "margin-top: 10px; margin-bottom: 10px;">
                                <p class="brand_desc" style = "font-size: 20px; font-weight: 700;">Product Details</p>
                            </div>

                            <p class="brand_desc"><a href="{{ route('product', $each_order->product->id) }}" target = "_blank" id = "product_link_in_name">PRODUCT | {{$each_order->product->product_name}}</a></p>
                            <div class="brand-name">BRAND &bull; {{$each_order->product->product_brand}}</div>

                            <div class="price-info-section" style = "margin-top: 15px;">
                                <span class="cut-off-price-dim">Actual Price :&nbsp;</span>
                                <div class="cut-off-price">&#8377;{{$each_order->product->discount_price}}</div>
                            </div>

                            <div class="price-info-section">
                                <span class="cut-off-price-dim">Discount Price :&nbsp;</span>
                                <div class="price">&#8377;{{$each_order->product->product_price}}</div>
                            </div>

                            <div class="price-info-section" style = "margin-top: 15px;">
                                <span class="cut-off-price-dim">Quntity Ordered :&nbsp;</span>
                                <div class="price" style = "color: #878787;">{{$each_order->product_quantity}}</div>
                            </div>

                            <div class="price-info-section" style = "margin-top: 10px;">

                                <span class="cut-off-price-dim">Payment Amount :&nbsp;</span>
                                <div class="price" style = "color: #878787;">&#8377;{{$each_order->product_price}}</div>

                                <span class="cut-off-price-dim" style = "margin-left: 30px;">|</span>
                                <span class="cut-off-price-dim" style = "margin-left: 30px;">Order Placed At :&nbsp;</span>
                                <div class="price" style = "color: #878787;">{{$each_order->order_placed_date}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="main">

                        <ul>
                            <li>
                                <i class="icon uil uil-clipboard-notes"></i>
                                <div class="progress one {{ $each_order->is_order_placed == 1 ? 'active' : '' }}">
                                    <p>1</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Order Placed</p>
                            </li>
                            <li>
                                <i class="icon uil uil-cloud-check"></i>
                                <div class="progress two {{ $each_order->is_order_accepted == 1 ? 'active' : '' }}">
                                    <p>2</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Order Accepted</p>
                            </li>
                            <li>
                                <i class="icon uil uil-box"></i>
                                <div class="progress three {{ $each_order->is_order_packed == 1 ? 'active' : '' }}">
                                    <p>3</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Order Packed</p>
                            </li>
                            <li>
                                <i class="icon uil uil-truck flipped-icon"></i>
                                <div class="progress four {{ $each_order->is_order_shipped == 1 ? 'active' : '' }}">
                                    <p>4</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Order Shipped</p>
                            </li>
                            <li>
                                <i class="icon uil uil-map-marker"></i>
                                <div class="progress five {{ $each_order->is_order_delivered == 1 ? 'active' : '' }}">
                                    <p>5</p>
                                    <i class="uil uil-check"></i>
                                </div>
                                <p class="text">Order Delivered</p>
                            </li>
                        </ul>

                    </div>

                    <br>
                    <div id = "line_between_products"></div>
                </div>
            @endforeach
        @else
            <div class="container">
                <img src="{{ asset('img/nothing_to_show_here.png') }}" id="nothing_to_show_here_img" alt="nothing to show here">
                <h2>No any order complated yet</h2>
            </div>
        @endif
    </div>
    
</section>
@include('website_footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/main_initial_page.js') }}"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type = "text/javascript">
    var owl = $(".product-slider");
    owl.owlCarousel({
        loop: true,
        smartspeed: 500,
        dots: true,
        navs: false,
        lazyLoad: true,
        mouseDrag: false,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        responsiveClass: true,
        items:1,
    });

    $('.product-slider').on('mouseover', function(e){
        owl.trigger('play.owl.autoplay', [1400])
    });

    $('.product-slider').on('mouseleave', function(e){
        owl.trigger('stop.owl.autoplay', [1400])
    });
</script> 
</body>
</html>