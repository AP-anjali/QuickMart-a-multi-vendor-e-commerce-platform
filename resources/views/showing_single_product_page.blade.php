<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{$product_to_display->product_title}}</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">
   <style>
        .small-img-col{
            margin: 10px 5px;
            cursor: pointer;
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

<div class="very_tired">
    <section class = "showing_single_product_page_container my-5 pt-5">
        <div class = "row">
            <div>
                <div class = "small-img-group">
                    <div class = "small-img-col">
                        <img src="{{ asset('storage/' . $product_to_display-> product_main_image) }}" style = "box-shadow: 1px 3px 10px rgba(0,0,0,0.2); width: 102.5px; height: 123px; object-fit: contain;" class = "small-img">
                    </div>

                    @foreach($product_to_display->product_other_images as $image)
                        <div class = "small-img-col">
                            <img src="{{ asset('storage/' . $image) }}" class = "small-img"  style = "box-shadow: 1px 3px 10px rgba(0,0,0,0.2); width: 102.5px; height: 123px; object-fit: contain;" >
                        </div>
                    @endforeach

                </div>
            </div>
            <div class = "col-lg-5 col-md-12 col-12">
                <a href="#"><img src="{{ asset('storage/' . $product_to_display-> product_main_image) }}" id = "main_image" class = "img-fluid" style = "box-shadow: 1px 3px 10px rgba(0,0,0,0.2); height: 450px; width:375px; object-fit: contain;" alt="product images"></a>
            </div>
        
            <div class = "col-lg-5 col-md-12 col-12" style = "margin-left: -50px; margin-top: 4%;">
                <div class="product-details">
                    <p class="brand_desc">PRODUCT | {{ $product_to_display-> product_name}}</p>
                    <div class="brand-name">BRAND &bull; {{$product_to_display->product_brand}}</div>

                    <div class="price-info-section">
                        <span class="cut-off-price-dim">Actual Price :&nbsp;</span>
                        <div class="cut-off-price">&#8377;{{$product_to_display->discount_price}}</div>
                    </div>

                    <div class="price-info-section">
                        <span class="cut-off-price-dim2">Discount Price :&nbsp;</span>
                        <div class="price">&#8377;{{$product_to_display->product_price}}</div>
                    </div>
                    <br><br>
                    <div class="pdesc">Product Details</div>
                    <div class="pdesc_con">{{$product_to_display->product_description}}</div>


                    <form id="productForm" action="{{ route('adding_product_to_cart_from_customer', $product_to_display->id) }}" method="post">
                        @csrf
                        <div class="product_qunitityyyy2">
                            <span id = "quntity_label">Product Quntity </span><input type="number" name="product_quantity_ordered_by_customer" id="product_quntity_to_add_in_cart" value = "1" min = "1">
                        </div>

                        <div class="buy_cart_container">

                            @if(in_array($product_to_display->id, $userCartProducts))
                                <a href = "{{ route('customer_cart_page') }}" class="cart_btn1234" style = "width: 55%; text-align: center; padding-top: 6px; text-decoration: none;">Go To Cart</a>
                            @else
                                <button class="cart_btn1234" style = "width: 55%;" id="addToCartBtn">Add To Cart <i class="fas fa-cart-plus" style="margin-left: 10px;"></i></button>
                            @endif

                            <button class="cart_btn1234" style = "width: 35%;" id="buyNowBtn">Buy Now</button>
                            
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </section>
</div>


<script>

    document.getElementById('buyNowBtn').addEventListener('click', function () {
            document.getElementById('productForm').action = "{{ route('adding_product_to_cart_from_customer_for_buy_now', $product_to_display->id) }}"; // Replace 'buy_now_route' with your actual route
            document.getElementById('productForm').submit();
        });

    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('addToCartBtn').addEventListener('click', function () {
            document.getElementById('productForm').action = "{{ route('adding_product_to_cart_from_customer', $product_to_display->id) }}";
            document.getElementById('productForm').submit();
        });
    });
</script>
<!-- ===================================================== Dispaly Other Products ======================================================== -->

<section class="teachers">
   <h1 class="heading" style = "margin-top: 20px; margin-bottom: 30px;">Other Products !</h1>
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

<div class="all_product_image_container">
<h1 id = "noDataMessage2" class = "searched_data_not_available_text"></h1>
    @if(count($other_products) > 0)
        @foreach($other_products as $index => $each_product)
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
            <h2>Sorry, nothing to show here at the moment</h2>
        </div>
    @endif
</div>
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
<script>
    var main_image = document.getElementById('main_image');
    var small_img = document.getElementsByClassName('small-img');

    small_img[0].style.border = '2px solid black';

    small_img[0].onclick = function(){
        main_image.src = small_img[0].src;
    }

    function removeBorderFromSmallImages() {
        for (var i = 0; i < small_img.length; i++) {
            small_img[i].style.border = 'none';
        }
    }

    function setImageAndBorder(index) {
        main_image.src = small_img[index].src;
        removeBorderFromSmallImages();
        small_img[index].style.border = '2px solid black';
    }

    for (var i = 0; i < small_img.length; i++) {
        small_img[i].onclick = (function(index) {
            return function() {
                setImageAndBorder(index);
            };
        })(i);
    }
</script>
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