<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">
    <style>
        .my_hero_section{
            background-image: url("{{ asset('img/hero_image123.jpg') }}");
            height: 320px;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            margin-top: 2px;
        }

        .msg{
            width: 60%;
            height: 50px;
            color: green;
            text-align: center;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-left: 19%;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }

        .msg_address_stored{
            width: 80%;
            height: 50px;
            color: green;
            text-align: center;
            font-size: 20px;
            border-radius: 6px;
            padding: 8px 0 0 25px;
            font-weight: 700;
            background: white;
            position: relative;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-left: 10%;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }
        #popup-btn_address_stored{
            height: 80%;
            margin-bottom: 8px;
            width: 30px;
            padding-bottom: 4px;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            background: rgba(0,0,0,.2);
            font-size: 20px;
            font-weight: 700;
            margin-left: 2%;
            cursor: pointer;
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
            margin-bottom: 40px;
            margin-left: 20%;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }
        .payment_done_main_msg{
            margin-top: 15px;
        }
        
        #popup-btn{
            height: 80%;
            margin-bottom: 8px;
            width: 30px;
            padding-bottom: 4px;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            background: rgba(0,0,0,.2);
            margin-left: 20%;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        #go-gotocart-btn{
            height: 80%;
            margin-bottom: 8px;
            width: 150px;
            border: 1px solid rgba(0,0,0,.2);
            border-radius: 6px;
            background: rgba(0,0,0,.2);
            margin-left: 4%;
            font-size: 20px;
            font-weight: 700;
            cursor: pointer;
        }

        #nothing_to_show_here_img{
            height: 500px;
            border-radius: 20px;
            border: 1px solid rgba(0,0,0,.2);
            box-shadow: 5px 5px 5px rgba(0,0,0,.2);
            margin-top: 20px;
        }
        .containeranjali h2{
            margin-top: 20px;
            margin-bottom: 10px;
            text-align: center;
            font-size: 28px;
            color: #454545;
            font-weight: 800;
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
        .searched_data_not_available_text{
            text-align: center; 
            margin-top: 20px; 
            color: #454545;
        }
    </style>
</head>
<body class = "active">

@include('website_menu')

    <!-- @if(session('customer_session'))
        <div id="preloader">
            <img src="{{ asset('img/ecomm_preloader.gif') }}" alt="Loading...">
        </div>
    @elseif(session('seller_session'))
        <div id="preloader">
            <img src="{{ asset('img/ecomm_preloader.gif') }}" alt="Loading...">
        </div>
    @elseif(session('admin_session'))
        <div id="preloader">
            <img src="{{ asset('img/ecomm_preloader.gif') }}" alt="Loading...">
        </div>
    @else
        <div id="preloader">
            <img src="{{ asset('img/ecomm_preloader.gif') }}" alt="Loading...">
        </div>
    @endif -->


<!-- ============================================================================================================= -->

<div class="my_hero_section">
    <div class="hero_msg">
        <p>A Warm Welcome To All Of You In Our Family, Your Presence Is Our Priority! &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Click Here To Get To Know Us</a></p>
    </div>
</div>

<!-- ============================================================================================================= -->
<section class="teachers">
   <h1 class="heading" style = "margin-top: 20px; margin-bottom: -10px;">Categories !</h1>
</section>

<div id = "my_small_boxes" class = "section_he_bhai">
    <a href="#">
        <div class="my_category_box">
            <img src="{{ asset('img/product_category/1.png') }}" style = "height: 80px;" alt="category section image">
            <h6>Mobiles & Tablets</h6>
        </div>
    </a>

    <a href="#">
        <div class="my_category_box">
            <img src="{{ asset('img/product_category/2.png') }}" style = "height: 80px;" alt="category section image">
            <h6>Fashion</h6>
        </div>
    </a>

    <a href="#">
        <div class="my_category_box">
            <img src="{{ asset('img/product_category/1.png') }}" style = "height: 80px;" alt="category section image">
            <h6>Beauty Picks</h6>
        </div>
    </a>
    
    <a href="#">
        <div class="my_category_box">
            <img src="{{ asset('img/product_category/1.png') }}" style = "height: 80px;" alt="category section image">
            <h6>TV & Electronics</h6>
        </div>
    </a>

    <a href="#">
        <div class="my_category_box">
            <img src="{{ asset('img/product_category/1.png') }}" style = "height: 80px;" alt="category section image">
            <h6>Furniture</h6>
        </div>
    </a>

    <a href="#">
        <div class="my_category_box">
            <img src="{{ asset('img/product_category/1.png') }}" style = "height: 80px;" alt="category section image">
            <h6>Grocery</h6>
        </div>
    </a>
    
    <a href="#">
        <div class="my_category_box">
            <img src="{{ asset('img/product_category/1.png') }}" style = "height: 80px;" alt="category section image">
            <h6>Home & Kitchen</h6>
        </div>
    </a>
</div>

<!-- ===================================================== Dispaly Products ======================================================== -->

<section class="teachers">
   <h1 class="heading" style = "margin-top: 20px; margin-bottom: 30px;">Products !</h1>
</section>

<div class="image_chec2k">
    <img src="{{ asset('img/2nd_banner.jpg') }}" id = "second_banner" alt="2nd banner">
</div>
<div class="under_line"></div>

<section class="teachers">
    <div class="search-tutor" style = "margin-top: 20px; border: 1px solid rgba(0,0,0,.2); box-shadow: 5px 5px 5px rgba(0,0,0,.2);">
        <input type="text" id="searchBox2" name="search_box" placeholder="Search Product..." required maxlength="200" oninput="filterproducts()">
        <button class="fas fa-search" name="search_tutor"></button>
    </div>
</section>

@if(Session()->has('prodect_added_in_cart'))

    <div class="msg" id="msg1">
        {{session()->get('prodect_added_in_cart')}}
        <button type="button" onclick = "redirectOnCart()" id="go-gotocart-btn" >GO TO CART</button>
        <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn" >X</button>
    </div>

@endif

@if(Session()->has('address_stored'))

    <div class="msg_address_stored" id="msg1">
        {{session()->get('address_stored')}}
        <button type="button" onclick = "document.getElementById('msg1').style.display = 'none';" id="popup-btn_address_stored" >X</button>
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

<!-- ============================================================================================================= -->

<div class="all_product_image_container" style = "margin-bottom : 30px;">
<h1 id = "noDataMessage2" class = "searched_data_not_available_text"></h1>
    @if(count($all_products) > 0)
        @foreach($all_products as $index => $each_product)
            <div class="product-card class_for_search_box" data-product-id="{{ $each_product->id }}">
                <a href="{{ route('product', $each_product->id) }}" target="_blank" class="">
                    <div class="product-front-image">
                        <div class="front-image">
                            <img src="{{ asset('storage/' . $each_product->product_main_image) }}" class="img-fluid" alt="">
                        </div>

                        <div class="owl-slider">
                            <div id="carousel3" class="owl-carousel product-slider">
                                @foreach($each_product->product_other_images as $image)
                                    <div class="product-image">
                                        <img src="{{ asset('storage/' . $image) }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </a>

                <div class="product-details">
                    <p class="brand_desc">PRODUCT | {{$each_product->product_name}}</p>
                    <div class="brand-name"><p>BRAND &bull; {{$each_product->product_brand}}</p></div>

                    <div class="price-info-section">
                        <span class="cut-off-price-dim">Actual Price :&nbsp;</span>
                        <div class="cut-off-price">&#8377;{{$each_product->discount_price}}</div>
                    </div>

                    <div class="price-info-section">
                        <span class="cut-off-price-dim2">Discount Price :&nbsp;</span>
                        <div class="price">&#8377;{{$each_product->product_price}}</div>
                    </div>

                    <div class="buy_cart_container">
                        @if(in_array($each_product->id, $userCartProducts))
                            <button class="cart_btn add-to-cart-button" onclick = "window.location.href = '/customer_cart_page'">Go To Cart</button>
                        @else
                            <button class="cart_btn add-to-cart-button" id="add-to-cart-button-{{ $index }}" onclick="show_lightbox({{ $index }})">Add To Cart</button>
                        @endif

                        @if(isset($customer_data))    
                            @if(isset($address_stored))
                                    @if($address_stored == true)
                                        <button class="Buy_Now_btn" id="add-to-cart-button2-{{ $index }}" onclick="show_lightbox2({{ $index }})">Buy Now</button>   
                                    @else
                                        <a href="{{ route('go_to_store_customer_address_page', $customer_data->id) }}"><button class="Buy_Now_btn">Buy Now</button></a>
                                    @endif
                            @endif                 
                        @else
                            <a href="{{ route('for_apply_middleware_on_payment_button') }}"><button class="Buy_Now_btn">Buy Now</button></a>
                        @endif

                    </div>
                </div>
            </div>

            <!-- -------------------------------- -->
            <div class="add_to_cart_light_box_container_try" id="lightbox2-{{ $index }}">
                <div class="ligth_box_close_btn" onclick="closing_lightbox2({{ $index }})">
                    <i class="fa-solid fa-xmark"></i>
                </div>

                <div class="product-card" style="width: 30%; padding-bottom: 20px;">
                    <a href="#" target="_blank" class="">
                        <div class="product-front-image">
                            <div class="front-image">
                                <img src="{{ asset('storage/' . $each_product->product_main_image) }}" class="img-fluid" alt="">
                            </div>

                            <div class="owl-slider">
                                <div id="carousel3" class="owl-carousel product-slider">
                                    @foreach($each_product->product_other_images as $image)
                                        <div class="product-image">
                                            <img src="{{ asset('storage/' . $image) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="product_info_space">
                    <div class="l_box_product_details">
                        <br>
                        <div class="l_box_product_name">PRODUCT | {{ $each_product->product_name }}</div>
                        <div class="l_box_product_brand">BRAND &bull; {{ $each_product->product_brand }}</div>
                        <div class="l_box_product_title">{{ $each_product->product_title }}</div>
                        <div class="l_box_product_description">{{ $each_product->product_description }}</div>

                        <div class="price-info-section">
                            <span class="cut-off-price-dim" style="color: #18191A; font-weight: 700;">Actual Price :&nbsp;</span>
                            <div class="cut-off-price">&#8377;{{$each_product->discount_price}}</div>
                        </div>

                        <div class="price-info-section">
                            <span class="cut-off-price-dim" style="color: #18191A; font-weight: 700; margin-bottom : 10px;">Discount Price :&nbsp;</span>
                            <div class="price" style="font-weight: 600;">&#8377;{{$each_product->product_price}}</div>
                        </div>
                    </div>

                    <form action="{{ route('adding_product_to_cart_from_customer_for_buy_now', $each_product->id) }}" method="post">
                        @csrf
                        <div class="product_qunitityyyy">
                            <span id = "quntity_label">Product Quntity To Order</span><input type="number" name="product_quantity_ordered_by_customer" id="product_quntity_to_add_in_cart" value = "1" min = "1">
                        </div>

                        <div class="buy_cart_container">
                            <button type="submit" class="cart_btn123">
                                Buy Now
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- -------------------------------------- -->

            <div class="add_to_cart_light_box_container" id="lightbox-{{ $index }}">
                <div class="ligth_box_close_btn" onclick="closing_lightbox({{ $index }})">
                    <i class="fa-solid fa-xmark"></i>
                </div>

                <div class="product-card" style="width: 30%; padding-bottom: 20px;">
                    <a href="#" target="_blank" class="">
                        <div class="product-front-image">
                            <div class="front-image">
                                <img src="{{ asset('storage/' . $each_product->product_main_image) }}" class="img-fluid" alt="">
                            </div>

                            <div class="owl-slider">
                                <div id="carousel3" class="owl-carousel product-slider">
                                    @foreach($each_product->product_other_images as $image)
                                        <div class="product-image">
                                            <img src="{{ asset('storage/' . $image) }}" alt="">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="product_info_space">
                    <div class="l_box_product_details">
                        <br>
                        <div class="l_box_product_name">PRODUCT | {{ $each_product->product_name }}</div>
                        <div class="l_box_product_brand">BRAND &bull; {{ $each_product->product_brand }}</div>
                        <div class="l_box_product_title">{{ $each_product->product_title }}</div>
                        <div class="l_box_product_description">{{ $each_product->product_description }}</div>

                        <div class="price-info-section">
                            <span class="cut-off-price-dim" style="color: #18191A; font-weight: 700;">Actual Price :&nbsp;</span>
                            <div class="cut-off-price">&#8377;{{$each_product->discount_price}}</div>
                        </div>

                        <div class="price-info-section">
                            <span class="cut-off-price-dim" style="color: #18191A; font-weight: 700; margin-bottom : 10px;">Discount Price :&nbsp;</span>
                            <div class="price" style="font-weight: 600;">&#8377;{{$each_product->product_price}}</div>
                        </div>
                    </div>

                    <form action="{{ route('adding_product_to_cart_from_customer', $each_product->id) }}" method="post">
                        @csrf
                        <div class="product_qunitityyyy">
                            <span id = "quntity_label">Product Quntity </span><input type="number" name="product_quantity_ordered_by_customer" id="product_quntity_to_add_in_cart" value = "1" min = "1">
                        </div>

                        <div class="buy_cart_container">
                            <button type="submit" class="cart_btn123">
                                ADD TO CART <i class="fas fa-cart-plus" style="margin-left: 20px;"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        @endforeach
    @else
        <div class="containeranjali">
            <img src="{{ asset('img/nothing_to_show_here.png') }}" id="nothing_to_show_here_img" alt="nothing to show here">
            <h2>No any product uploaded yet</h2>
        </div>
    @endif
</div>

@if(session('showAdminLoginAlert'))
    <script>
        alert('To access further pages, please login first \nDo Not Mess With Administration Area ... 😠');
        {!! session()->forget('showAdminLoginAlert') !!}
    </script>
@endif

<!-- <section class="contact">
    
    <h2 style = "margin-top : 450px">Anjali Patel</h2>

</section> -->

@include('website_footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/main_initial_page.js') }}"></script> 

<script>

    var noDataMessage2 = document.getElementById('noDataMessage2');
    noDataMessage2.style.display = "none";

    function filterproducts() 
    {
        var input2, filter2, pdfs, productContainer, productName, productBrand, j, txtValue2;
        input2 = document.getElementById('searchBox2');
        filter2 = input2.value.toUpperCase();
        productContainer = document.querySelectorAll('.product-card.class_for_search_box');
        var matchingProductsExist = false; 

        for (j = 0; j < productContainer.length; j++) {
            productName = productContainer[j].querySelector(".brand_desc").textContent.toUpperCase();
            productBrand = productContainer[j].querySelector(".brand-name p").textContent.toUpperCase();
            
            if (productName.indexOf(filter2) > -1 || productBrand.indexOf(filter2) > -1) {
                productContainer[j].style.display = "";
                matchingProductsExist = true; 
            } else {
                productContainer[j].style.display = "none";
            }
        }

        if (!matchingProductsExist) {
            if (noDataMessage2) {
                noDataMessage2.style.display = "block";
                noDataMessage2.innerText = 'Sorry, no data available for "' + input2.value + '"';
            }
        } else {
            if (noDataMessage2) {
                noDataMessage2.style.display = "none";
            }
        }
    }
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type = "text/javascript">


    function show_lightbox(index) {
        var lightboxId = "#lightbox-" + index;
        var add_to_cart_light_box_container = document.querySelector(lightboxId);

        if (add_to_cart_light_box_container) {
            add_to_cart_light_box_container.classList.add("light_box_active");
        } else {
            console.log("Lightbox container not found for index:", index);
        }
    }

    function closing_lightbox(index) {
        var lightboxId = "#lightbox-" + index;
        var add_to_cart_light_box_container_for_close = document.querySelector(lightboxId);

        if (add_to_cart_light_box_container_for_close) {
            add_to_cart_light_box_container_for_close.classList.remove("light_box_active");
        } else {
            console.log("Lightbox container not found for index:", index);
        }
    }

    // --------------------------
    function show_lightbox2(index) {
        var lightboxId2 = "#lightbox2-" + index;
        var add_to_cart_light_box_container_try = document.querySelector(lightboxId2);

        if (add_to_cart_light_box_container_try) {
            add_to_cart_light_box_container_try.classList.add("light_box_active");
        } else {
            console.log("Lightbox container not found for index:", index);
        }
    }

    function closing_lightbox2(index) {
        var lightboxId2 = "#lightbox2-" + index;
        var add_to_cart_light_box_container_try_for_close = document.querySelector(lightboxId2);

        if (add_to_cart_light_box_container_try_for_close) {
            add_to_cart_light_box_container_try_for_close.classList.remove("light_box_active");
        } else {
            console.log("Lightbox container not found for index:", index);
        }
    }
    // ----------------------

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

    window.addEventListener('DOMContentLoaded', (event) => {
        const msg1 = document.getElementById('msg1');
        if (msg1) {
            // msg1.scrollIntoView({ behavior: 'smooth' });
            // msg1.scrollIntoView({ behavior: 'smooth', block: 'start' });

            const scrollPosition = msg1.offsetTop - 120;
            window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
        }
    });

    function redirectOnCart()
    {
        var routeUrl = "{{ route('customer_cart_page') }}"; 
        window.location.href = routeUrl;
    }
</script> 
</body>
</html>