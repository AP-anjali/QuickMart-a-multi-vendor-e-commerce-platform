<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Customer Cart</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
            width: 40%;
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
        .razorpay-container .razorpay-payment-button {
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

        .razorpay-container .razorpay-payment-button:hover {
            background: #2c3e50;
        }

        .razorpay_container_second .razorpay-payment-button {
            background-color: #FF474C;
            font-size: 18px;
            padding: 10px 22px;
            margin-left: 53%;
            margin-top: 10px;
            color: white;
            font-weight: 700;
            cursor: pointer;
        }

        .razorpay_container_second .razorpay-payment-button:hover {
            background: #2c3e50;
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


    @if(Session()->has('address_stored'))

        <div class="msg2" id="msg1">
            {{session()->get('address_stored')}}
            <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn2" >X</button>
        </div>

    @endif

    @if(Session()->has('payment_done'))
        <div class="payment_done_msg_container" id="msg1">
            <div class="payment_done_box_close_btn" onclick = "document.getElementById('msg1').style.display = 'none';">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <img src="{{ asset('img/404-tick.png') }}" class = "paymet_done_msg_image" alt="">
            <h3 class = "payment_done_main_msg">{{session()->get('payment_done')}}</h3>
            <h3 class = "payment_done_main_msg"><span style = "color: #454545;">&#10084; THANK YOU &#10084;</span></h3>
        </div>
    @endif

    @if(Session()->has('payment_done_dana_done_done'))
        <div class="payment_done_msg_container" id="msg1">
            <div class="payment_done_box_close_btn" onclick = "document.getElementById('msg1').style.display = 'none';">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <img src="{{ asset('img/404-tick.png') }}" class = "paymet_done_msg_image" alt="">
            <h3 class = "payment_done_main_msg">{{session()->get('payment_done_dana_done_done')}}</h3>
            <h3 class = "payment_done_main_msg"><span style = "color: #454545;">&#10084; THANK YOU &#10084;</span></h3>
        </div>
    @endif

<section class="teachers">
   <h1 class="heading" style = "margin-top: 20px; margin-bottom: 30px;">Cart Products !</h1>
</section>


    @if(Session()->has('message'))

        <div class="msg" id="msg1">
            {{session()->get('message')}}
            <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
        </div>

    @endif

    <div class="all_product_image_container" style = "padding-left: 20px;">

        @php
            $total_price_without_discount = 0;
            $total_price_with_discount = 0;
        @endphp

        @if(count($all_cart_data_of_logged_in_user) > 0)
            @foreach($all_cart_data_of_logged_in_user as $index => $each_product)


                @if(isset($added_product_id) && isset($prodect_added_in_cart_for_buy_now))

                    @if($prodect_added_in_cart_for_buy_now !== null && $added_product_id !== null)
                        @if($each_product->id == $added_product_id)
                            <div class="msg_buy" id="id_for_close_btn">
                                {{ $prodect_added_in_cart_for_buy_now }}
                                <button type="button" onclick="document.getElementById('id_for_close_btn').style.display = 'none';" id="popup-btn">X</button>
                            </div>
                        @endif
                    @endif

                @endif

                <div style = "width: 100%;">
                    <div class="product-card" data-product-id="{{ $each_product->id }}" style = "width: 30%; padding-bottom: 20px;">
                        <a href="{{ route('product', $each_product->product->id) }}" target="_blank" class="">
                            <div class="product-front-image">
                                <div class="front-image">
                                    <img src="{{ asset('storage/' . $each_product->product->product_main_image) }}" class="img-fluid" alt="">
                                </div>

                                <div class="owl-slider">
                                    <div id="carousel3" class="owl-carousel product-slider">
                                        @foreach($each_product->product->product_other_images as $image)
                                            <div class="product-image">
                                                <img src="{{ asset('storage/' . $image) }}" alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="product-details" style = "position : absolute; margin-left: 380px; margin-top: -280px;">
                            <p class="brand_desc"><a href="{{ route('product', $each_product->product->id) }}" target = "_blank" id = "product_link_in_name">PRODUCT | {{$each_product->product->product_name}}</a></p>
                            <div class="brand-name">BRAND &bull; {{$each_product->product->product_brand}}</div>

                            <div class="price-info-section" style = "margin-top: 15px;">
                                <span class="cut-off-price-dim">Actual Price :&nbsp;</span>
                                <div class="cut-off-price">&#8377;{{$each_product->product->discount_price}}</div>
                            </div>

                            <div class="price-info-section">
                                <span class="cut-off-price-dim">Discount Price :&nbsp;</span>
                                <div class="price">&#8377;{{$each_product->product->product_price}}</div>
                            </div>

                            <div class="price-info-section" style = "margin-top: 15px;">
                                <span class="cut-off-price-dim">Quntity Added :&nbsp;</span>
                                <div class="price" style = "color: #878787;">{{$each_product->product_quantity_ordered_by_customer}}</div>
                            </div>

                            <div class="price-info-section" style = "margin-top: 10px;">

                                <span class="cut-off-price-dim">Total Price [without discount] :&nbsp;</span>
                                <div class="price" style = "color: #878787;">&#8377;{{$each_product->total_price_of_product_with_all_quantities_without_discount}}</div>

                                <span class="cut-off-price-dim" style = "margin-left: 30px;">|</span>
                                <span class="cut-off-price-dim" style = "margin-left: 30px;">Total Price [with discount] :&nbsp;</span>
                                <div class="price" style = "color: #878787;">&#8377;{{$each_product->total_price_of_product_with_all_quantities_with_discount}}</div>
                            </div>

                            <div class="buy_cart_container">
                                <a onclick="return confirm('Are You Sure To Remove Product With Name : {{$each_product->product->product_name}} From Cart !')" href="{{ route('removing_product_from_cart_by_customer', $each_product->id) }}"><button class="cart_btn add-to-cart-button">Remove From Cart</button></a>

                                @if(isset($address_stored))
                                    @if($address_stored == true)
                                        <form action="{{ route('payment_of_single_item_products_by_customer_from_cart', $each_product->id) }}" method="POST" class="razorpay-container">
                                            @csrf
                                            <input type="hidden" id="product_id" name="product_id" value="{{ $each_product->product->id }}">
                                            <input type="hidden" id="seller_id" name="seller_id" value="{{ $each_product->product->seller_id }}">
                                            <input type="hidden" id="product_quantity" name="product_quantity" value="{{ $each_product->product_quantity_ordered_by_customer }}">

                                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                    data-key="{{ env('RAZORPAY_API_KEY') }}"
                                                    data-amount="{{$each_product->total_price_of_product_with_all_quantities_with_discount * 100}}"
                                                    data-buttontext="Buy Now"
                                                    data-name="QUICKMART"
                                                    data-description="An online shopping platform"
                                                    data-image=""
                                                    data-prefill.name="Anjali Patel"
                                                    data-prefill.email="anjalipatel3074@gmail.com"
                                                    data-theme.color="#8e44ad">
                                            </script>
                                        </form>
                                    @else
                                        <a href="{{ route('go_to_store_customer_address_page', $each_product->customer->id) }}"><button class="Buy_Now_btn">Buy Now</button></a>
                                    @endif
                                @endif


                            </div>
                        </div>
                    </div>
                    <br>
                    <div id = "line_between_products"></div>
                </div>

                @php
                    $total_price_without_discount += $each_product->total_price_of_product_with_all_quantities_without_discount;

                    $total_price_with_discount += $each_product->total_price_of_product_with_all_quantities_with_discount;
                @endphp

            @endforeach

            <div class = "cart_total_price_container">
                <div class="center_heading_box">TOTAL AMOUNT</div>
                <div class="total_price_without_discount">Total Price [without discount] <span>&#8377;{{$total_price_without_discount}}</span></div>
                <div class="total_price_with_discount">Total Price [with discount] <span>&#8377;{{$total_price_with_discount}}</span></div>

                @if(isset($address_stored))
                    @if($address_stored == true)
                        <form action="{{ route('payment_of_multiple_item_products_by_customer_from_cart') }}" method="POST" class="razorpay_container_second">
                            @csrf
                            
                            @foreach($all_cart_data_of_logged_in_user as $each_product)
                                <input type="hidden" name="products[{{$each_product->id}}][product_id]" value="{{ $each_product->product->id }}">
                                <input type="hidden" name="products[{{$each_product->id}}][seller_id]" value="{{ $each_product->product->seller_id }}">
                                <input type="hidden" name="products[{{$each_product->id}}][product_price]" value="{{ $each_product->product->product_price * $each_product->product_quantity_ordered_by_customer }}">
                                <input type="hidden" name="products[{{$each_product->id}}][product_quantity]" value="{{ $each_product->product_quantity_ordered_by_customer }}">
                            @endforeach

                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RAZORPAY_API_KEY') }}"
                                    data-amount="{{$total_price_with_discount * 100}}"
                                    data-buttontext="Place An Order"
                                    data-name="QUICKMART"
                                    data-description="An online shopping platform"
                                    data-image=""
                                    data-prefill.name="Anjali Patel"
                                    data-prefill.email="anjalipatel3074@gmail.com"
                                    data-theme.color="#8e44ad">
                            </script>
                        </form>
                    @else
                        <a href="{{ route('go_to_store_customer_address_page', $each_product->customer->id) }}"><button class="Buy_Now_btn">Place An Order</button></a>
                    @endif
                @endif

            </div>
        @else
            <div class="container">
                <img src="{{ asset('img/nothing_to_show_here.png') }}" id="nothing_to_show_here_img" alt="nothing to show here">
                <h2>No any product added yet</h2>
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