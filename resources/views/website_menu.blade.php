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

<header class="header">
   
   <section class="flex">

      <a href="{{ route('main_initial_page') }}" class="logo" style = "font-family: 'poppins', sans-serif;">QUICKMART</a>

      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search here..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>

      <div class="icons">

            @if(session('customer_session'))
               <a class = "menuitem" onclick = "toggleSubMenu()">
                  <div id="menu-btn1" class="fas" style = "width : 130px; font-family: 'poppins', sans-serif; font-size: 17px; font-weight:700; margin-right : 20px;">
                     <i class='bx bxs-user' id= "test1"></i>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account
                  </div>
               </a>

               <a onclick="confirmCustomerLogout()" class = "menuitem">
                  <div id="menu-btn" class="fas" style = "width : 110px; font-family: 'poppins', sans-serif; font-size: 16px; font-weight:600; margin-right : 20px;">
                     <i class='bx bx-trending-up' id= "test2"></i>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout
                  </div>
               </a>

               <a href="{{ route('customer_cart_page') }}" class = "menuitem">
                  <div class="fas fa-solid fa-cart-plus" style = "font-size:22px; margin-right : 10px;"></div>
               </a>
            @elseif(session('seller_session'))
               <a href="{{ route('main_seller_dashboard') }}" class = "menuitem">
                  <div id="menu-btn1" class="fas" style = "width : 130px; font-family: 'poppins', sans-serif; font-size: 17px; font-weight:700; margin-right : 20px;">
                     <i class='bx bxs-user' id= "test1"></i>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard
                  </div>
               </a>

               <a onclick="confirmSellerLogout()" class = "menuitem">
                  <div id="menu-btn" class="fas" style = "width : 110px; font-family: 'poppins', sans-serif; font-size: 16px; font-weight:600; margin-right : 20px;">
                     <i class='bx bx-trending-up' id= "test2"></i>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout
                  </div>
               </a>

            @elseif(session('employee_session'))
            <a href="{{ route('main_employee_dashboard') }}" class = "menuitem">
               <div id="menu-btn1" class="fas" style = "width : 130px; font-family: 'poppins', sans-serif; font-size: 17px; font-weight:700; margin-right : 20px;">
                  <i class='bx bxs-user' id= "test1"></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard
               </div>
            </a>

            <a onclick="confirmEmployeeLogout()" class = "menuitem">
               <div id="menu-btn" class="fas" style = "width : 110px; font-family: 'poppins', sans-serif; font-size: 16px; font-weight:600; margin-right : 20px;">
                  <i class='bx bx-trending-up' id= "test2"></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout
               </div>
            </a>

            @elseif(session('delivery_team_member_session'))
            <a href="{{ route('main_delivery_team_member_dashboard') }}" class = "menuitem">
               <div id="menu-btn1" class="fas" style = "width : 130px; font-family: 'poppins', sans-serif; font-size: 17px; font-weight:700; margin-right : 20px;">
                  <i class='bx bxs-user' id= "test1"></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard
               </div>
            </a>

            <a onclick="confirmDeliveryTeamMemberLogout()" class = "menuitem">
               <div id="menu-btn" class="fas" style = "width : 110px; font-family: 'poppins', sans-serif; font-size: 16px; font-weight:600; margin-right : 20px;">
                  <i class='bx bx-trending-up' id= "test2"></i>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout
               </div>
            </a>

            @elseif(session('admin_session'))
               <a href="{{ route('main_admin_dashboard') }}" class = "menuitem">
                  <div id="menu-btn1" class="fas" style = "width : 130px; font-family: 'poppins', sans-serif; font-size: 17px; font-weight:700; margin-right : 20px;">
                     <i class='bx bxs-user' id= "test1"></i>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard
                  </div>
               </a>

               <a onclick="confirmAdminLogout()" class = "menuitem">
                  <div id="menu-btn" class="fas" style = "width : 110px; font-family: 'poppins', sans-serif; font-size: 16px; font-weight:600; margin-right : 20px;">
                     <i class='bx bx-trending-up' id= "test2"></i>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logout
                  </div>
               </a>

            @else
               
               <a href="{{ route('customers_first_window') }}" class = "menuitem">
                  <div id="menu-btn1" class="fas" style = "width : 130px; font-family: 'poppins', sans-serif; font-size: 17px; font-weight:700; margin-right : 20px;">
                     <i class='bx bxs-user' id= "test1"></i>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Customers
                  </div>
               </a>

               <a href="{{ route('sellers_first_window') }}" class = "menuitem">
                  <div id="menu-btn" class="fas" style = "width : 110px; font-family: 'poppins', sans-serif; font-size: 16px; font-weight:600; margin-right : 20px;">
                     <i class='bx bx-trending-up' id= "test2"></i>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sellers
                  </div>
               </a>

               <a href="{{ route('customer_cart_page') }}" class = "menuitem">
                  <div class="fas fa-solid fa-cart-plus" style = "font-size:22px; margin-right : 10px;"></div>
               </a>
            @endif

         <div id="toggle-btn" class="fas fa-sun" style = "font-size:22px;"></div>
      </div>
   </section>

   @if(isset($customer_data))
      <div class="sub-menu-wrap" id = "customer_account_sub_menu">
         <!-- <div class="topi_arrow_container">
            <i class="fa-solid fa-caret-up"></i>
         </div> -->
         <div class="sub-menu">
               <div class="user-info">
                  <img src="{{ asset('storage/' . $customer_data->profile_pic) }}" alt="User Profile Pic">
                  <h3>{{ $customer_data->name }}</h3>
               </div>
               <hr>

               <a href="{{ route('customer_account', $customer_data->id) }}" class="sub-menu-link">
                  <img src="{{ asset('img/customer_account/profile.png') }}" alt="User Profile Pic">
                  <p>Edit Profile</p>
                  <span><i class="fa-solid fa-angle-right"></i></span>
               </a>

               <a href="{{ route('customer_orders_page') }}" class="sub-menu-link">
                  <img src="{{ asset('img/customer_account/package-regular-24 (1).png') }}" alt="User Profile Pic">
                  <p>Orders</p>
                  <span><i class="fa-solid fa-angle-right"></i></span>
               </a>

               <a href="" class="sub-menu-link">
                  <img src="{{ asset('img/customer_account/setting.png') }}" alt="User Profile Pic">
                  <p>Settings & privacy</p>
                  <span><i class="fa-solid fa-angle-right"></i></span>
               </a>

               <a href="" class="sub-menu-link">
                  <img src="{{ asset('img/customer_account/help.png') }}" alt="User Profile Pic">
                  <p>Help & Support</p>
                  <span><i class="fa-solid fa-angle-right"></i></span>
               </a>

               <a onclick="confirmCustomerLogout()" class="sub-menu-link">
                  <img src="{{ asset('img/customer_account/logout.png') }}" alt="User Profile Pic">
                  <p>Logout</p>
                  <span><i class="fa-solid fa-angle-right"></i></span>
               </a>
         </div>
      </div>
   @endif
</header>

<!-- custom js file link  -->
<script src="{{ asset('js/main_initial_page.js') }}"></script>  
</body>
</html>