<nav class="sidebar">
        <header id="sticky">
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('img/logo69.jpg') }}" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name"><a href="{{ route('seller_dashboard') }}">QUICKMART</a></span>
                    <span class="profession">Seller Dashboard</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search-alt-2 icon'></i>
                    <input type="text" placeholder="Search...">
                </li>
                <ul class="menu-links">
                    <li class="nav-links" id="Dashboard">
                        <a href="{{ route('seller_dashboard') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Products">
                        <a href="{{ route('seller_show_product_page') }}">
                            <i class='bx bx-list-check icon' ></i>
                            <span class="text nav-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-links" id="add-new-product">
                        <a href="{{ route('seller_add_new_product_page') }}">
                            <i class='bx bxs-add-to-queue icon' ></i>
                            <span class="text nav-text">Add New Product</span>
                        </a>
                    </li>
                    <li class="nav-links" id="update-product">
                        <a href="{{ route('seller_update_product_page') }}">
                            <i class='bx bx-revision icon' ></i>
                            <span class="text nav-text">Update Product</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Orders">
                        <a href="{{ route('seller_orders_page') }}">
                            <i class='bx bx-package icon' ></i>
                            <span class="text nav-text">Orders</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Feedbacks">
                        <a href="{{ route('seller_feedback_page') }}">
                            <i class='bx bx-bookmark-heart icon' ></i>
                            <span class="text nav-text">Feedbacks</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Notifications">
                        <a href="{{ route('seller_notification_page') }}">
                            <i class='bx bxs-bell-ring icon' ></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Profile">
                        <a href="{{ route('seller_profile_page') }}">
                            <i class='bx bx-user-pin icon' ></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Settings">
                        <a href="{{ route('seller_settings_page') }}">
                            <i class='bx bxs-cog icon' ></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Help">
                        <a href="{{ route('seller_help_page') }}">
                            <i class='bx bx-help-circle icon' ></i>
                            <span class="text nav-text">Help</span>
                        </a>
                    </li>
                    <li class="nav-links" id="about-us">
                        <a href="{{ route('seller_about_us_page') }}">
                            <i class='bx bxs-widget icon' ></i>
                            <span class="text nav-text">About Us</span>
                        </a>
                    </li>
                    <li class="nav-links" id="contact-us">
                        <a href="{{ route('seller_contact_us_page') }}">
                            &nbsp;&nbsp;&nbsp;<i class='bx bx-envelope icont' ></i>
                            <i class='bx bxl-linkedin-square icont' ></i>
                            <i class='bx bx-phone-call icont' ></i>
                            <span class="text nav-text">&nbsp;&nbsp;Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="mode">
                    <div class="moon-sun">
                        <i class='bx bx-moon icon moon'></i>
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                <li class="">
                    <a href="{{ route('seller_logout') }}">
                        <i class='bx bx-log-out-circle icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>