<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{ $customer_to_store_address->name }} | Address Details</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   <link rel="stylesheet" href="{{ asset('cssfiles/main_initial_page.css') }}">
</head>
<body class = "active">

@include('website_menu')

<section class="contact">

<section class="teachers">
   <h1 class="heading" style = "margin-top: 20px; margin-bottom: 30px;">Hello {{ $customer_to_store_address->name }}, we may need your specific address details ! <span style = "font-size: 20px; margin-left: 15px;">[just Once]</span></h1>
</section>


    <form action="{{ route('storing_customer_address_form_submission', $customer_to_store_address->id) }}" method = "post">
        @csrf
        <div class="customer_address_form_container">
            <div class="heading_container">
                <h1>Address Details</h1>
            </div>

            <div class="address_info_container">
                <div class="button-container">
                    <div class="text-fields country">
                        <label for="country"><i class="fa-solid fa-earth-africa" style='color:#696cff'></i></label>
                        <input type="text" name="country" id="country" placeholder="Your country name" required>
                    </div>
                    <div class="text-fields state">
                        <label for="state"><i class="fa-solid fa-globe" style='color:#696cff'></i></label>
                        <input type="text" name="state" id="state" placeholder="Your state name" required>
                    </div>
                </div>

                <div class="button-container">
                    <div class="text-fields city">
                        <label for="city"><i class="fa-solid fa-city" style='color:#696cff'></i></label>
                        <input type="text" name="city" id="city" placeholder="Your city name" required>
                    </div>
                    <div class="text-fields area_or_village">
                        <label for="area_or_village"><i class="fa-solid fa-layer-group" style='color:#696cff'></i></label>
                        <input type="text" name="area_or_village" id="area_or_village" placeholder="Your area or village name" required>
                    </div>
                </div>

                <div class="button-container">
                    <div class="text-fields pincode">
                        <label for="pincode"><i class="fa-solid fa-shield-halved" style='color:#696cff'></i></label>
                        <input type="text" name="pincode" id="pincode" placeholder="Your address pincode" required>
                    </div>
                    <div class="text-fields landmark">
                        <label for="landmark"><i class="fa-solid fa-building-shield" style='color:#696cff'></i></label>
                        <input type="text" name="landmark" id="landmark" placeholder="Your address landmark" required>
                    </div>
                </div>

                <div class="button-container">
                    <div class="text-fields full_address" style = "width : 100%;">
                        <label for="full_address"><i class="fa-solid fa-house-chimney-user" style='color:#696cff'></i></label>
                        <input type="text" name="full_address" id="full_address" placeholder="Your full address" style = "width: 350%;" required>
                    </div>
                </div>

                <div class="storing_customer_data_btns">
                    <button class="storing_customer_data_btn" onclick = "window.history.back();"><h1>EXIT</h1></button>
                    <button class="storing_customer_data_btn" type="submit"><h1>SUBMIT</h1></button>
                </div>
            </div>
        </div>
    </form>
    

    
</section>
@include('website_footer')

<script src="{{ asset('js/main_initial_page.js') }}"></script>  
</body>
</html>