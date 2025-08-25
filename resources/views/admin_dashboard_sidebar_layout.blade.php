<nav class="sidebar">
        <header id="sticky">
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('img/logo69.jpg') }}" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name"><a href="{{ route('admin_dashboard') }}">QUICKMART</a></span>
                    <span class="profession">Admin Dashboard</span>
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
                        <a href="{{ route('admin_dashboard') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Users">
                        <a href="{{ route('admin_show_users_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Users</span>
                        </a>
                        <!-- <ul class="menu-links" id="users-sublist">
							<li><a href="">Sellers</a></li>
							<li><a href="">Customers</a></li>
							<li><a href="">Delivery boys</a></li>	
						</ul> -->
                    </li>
                    <li class="nav-links" id="Products">
                        <a href="{{ route('admin_show_products_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Categories">
                        <a href="{{ route('admin_show_categories_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Categories</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Add-New-Category">
                        <a href="{{ route('admin_add_new_category_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Add New Category</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Update-Category">
                        <a href="{{ route('admin_update_category_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Update Category</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Orders">
                        <a href="{{ route('admin_show_orders_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Orders</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Notifications">
                        <a href="{{ route('admin_notifications_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Feedbacks">
                        <a href="{{ route('admin_feedbacks_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Feedbacks</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Communication">
                        <a href="{{ route('admin_communication_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Communication</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Income">
                        <a href="{{ route('admin_show_income_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Income</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Expenses">
                        <a href="{{ route('admin_show_expenses_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Expenses</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Analytics">
                        <a href="{{ route('admin_analytics_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Profile">
                        <a href="{{ route('admin_profile_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Settings">
                        <a href="{{ route('admin_settings_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Customization">
                        <a href="{{ route('admin_customization_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Customization</span>
                        </a>
                    </li>
                    <li class="nav-links" id="Help">
                        <a href="{{ route('admin_help_page') }}">
                            <i class='bx bx-home icon' ></i>
                            <span class="text nav-text">Help</span>
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
                    <a href="{{ route('admin_logout') }}">
                        <i class='bx bx-log-out-circle icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>