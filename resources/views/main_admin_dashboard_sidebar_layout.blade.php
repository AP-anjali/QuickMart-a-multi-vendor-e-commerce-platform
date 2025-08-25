<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>


                        <li>
                            <a href="{{ route('main_admin_dashboard') }}"  id = "Dashboard"><i class="feather-grid"></i><span> Dashboard</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Users Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Users"><i class="fas fa-graduation-cap"></i> <span>System Users</span> <span
                                    class="menu-arrow"></span></a>

                            <ul>
                                <li><a href="{{ route('main_admin_dashboard_show_customers_page') }}" id="Customers"><i class="fas fa-holly-berry"></i> <span>Customers</span></a></li>

                                <li><a href="{{ route('main_admin_dashboard_show_sellers_page') }}" id="Sellers"><i class="fas fa-holly-berry"></i> <span>Sellers</span></a></li>

                                <li><a href="{{ route('main_admin_dashboard_show_delivery_team_page') }}" id="Delivery_Team"><i class="fas fa-holly-berry"></i> <span>Delivery Team</span></a></li>
                                        
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Employees_Applications"><i class="fas fa-graduation-cap"></i> <span>System Employees</span> <span
                                    class="menu-arrow"></span></a>

                            <ul>
                                <li><a href="{{ route('main_admin_dashboard_show_all_employee_application_page') }}" id="All_Applications_employee"><i class="fas fa-holly-berry"></i> <span>All Applications</span></a></li>

                                <li style = "white-space: nowrap;"><a href="{{ route('main_admin_dashboard_show_all_confirmed_employee_application_page') }}" id="Confirmed_Applications_employee"><i class="fas fa-holly-berry"></i> <span>Confirmed Applications</span></a></li>

                                <li><a href="{{ route('main_admin_dashboard_show_all_joined_employees_page') }}" id="Current_employee"><i class="fas fa-holly-berry"></i> <span>Current Employees</span></a></li>
                                        
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Job_Applications"><i class="fas fa-graduation-cap"></i> <span>Job Applications</span> <span
                                    class="menu-arrow"></span></a>

                            <ul>
                                <li><a href="{{ route('main_admin_dashboard_show_all_initial_delivery_team_applications_page') }}" id="All_Initial_Applications" style = "white-space : nowrap;"><i class="fas fa-holly-berry"></i> <span>All Initial Applications</span></a></li>       
                                <li style = "white-space: nowrap;"><a href="{{ route('main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page') }}" id="Confirmed_By_E"><i class="fas fa-holly-berry"></i> <span>Confirmed By (EMP)</span></a></li>                                        
                                <li style = "white-space: nowrap;"><a href="{{ route('main_admin_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page') }}" id="Confirmed_By_A"><i class="fas fa-holly-berry"></i> <span>Confirmed By (ADMIN)</span></a></li>                                        
                                <li style = "white-space: nowrap;"><a href="{{ route('main_admin_dashboard_show_all_delivery_team_applications_eligible_by_employee_page') }}" id="Eligible_By_E"><i class="fas fa-holly-berry"></i> <span>Eligible By (EMP)</span></a></li>                                        
                                <li style = "white-space: nowrap;"><a href="{{ route('main_admin_dashboard_show_all_delivery_team_applications_eligible_by_admin_page') }}" id="Eligible_By_A"><i class="fas fa-holly-berry"></i> <span>Eligible By (ADMIN)</span></a></li>                                        
                                <li style = "white-space: nowrap;"><a href="{{ route('main_admin_dashboard_show_current_delivery_team_page') }}" id="Current_Delivery_Team"><i class="fas fa-holly-berry"></i> <span>Current Delivery Team</span></a></li>                                        
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Products Management</span>
                        </li>

                        <li>
                            <a href="{{ route('main_admin_dashboard_show_products_page') }}"  id="Products"><i class="fas fa-chalkboard-teacher"></i> <span>Products</span></a>
                        </li>

                        <li class="submenu">
                            <a href="#"  id="Categories"><i class="fas fa-building"></i> <span> Categories</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('main_admin_dashboard_show_categories_page') }}" id="all_categories"><i class="fas fa-holly-berry"></i> <span>All Categories</span></a></li>

                                <li><a href="{{ route('main_admin_dashboard_add_new_category_page') }}" id="Add_New_Category"><i class="fas fa-holly-berry"></i> <span>Add New Category</span></a></li>

                                <li><a href="{{ isset($category_to_update) ? route('update_category', $category_to_update->id) : route('main_admin_dashboard_show_categories_page_with_alert') }}" id="Update_Category"><i class="fas fa-holly-berry"></i> <span>Update Category</span></a></li>
                                        
                            </ul>
                        </li>

                        <li class="submenu">
                            <a href="#"  id="Sections"><i class="fas fa-building"></i> <span>Sections</span> <span
                                    class="menu-arrow"></span></a>

                            <ul>
                                <li><a href="{{ route('main_admin_dashboard_show_sections_page') }}" id="all_sections"><i class="fas fa-holly-berry"></i> <span>All Sections</span></a></li>

                                <li><a href="{{ route('main_admin_dashboard_add_new_section_page') }}" id="Add_New_section"><i class="fas fa-holly-berry"></i> <span>Add New Section</span></a></li>

                                <li><a href="{{ isset($section_to_update) ? route('main_admin_dashboard_update_section_page', $section_to_update->id) : route('main_admin_dashboard_show_sections_page_with_alert') }}" id="Update_section"><i class="fas fa-holly-berry"></i> <span>Update Section</span></a></li>
                                        
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Orders Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Orders"><i class="fas fa-book-reader"></i> <span>Orders</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('main_admin_dashboard_show_pending_orders_page') }}">Pending Orders</a></li>
                                <li><a href="{{ route('main_admin_dashboard_show_complated_orders_page') }}">Completed Orders</a></li>
                                <li><a href="{{ route('main_admin_dashboard_show_exchanged_orders_page') }}">Exchanged Orders</a></li>
                                <li><a href="{{ route('main_admin_dashboard_show_returned_orders_page') }}">Returned Orders</a></li>
                                <li><a href="{{ route('main_admin_dashboard_show_cancelled_orders_page') }}">Cancelled Orders</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Communication Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id="Feedbacks"><i class="fas fa-clipboard"></i> <span>Feedbacks</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('main_admin_dashboard_show_customers_feedbacks_page') }}">Customers Feedbacks</a></li>
                                <li><a href="{{ route('main_admin_dashboard_show_sellers_feedbacks_page') }}">Sellers Feedbacks</a></li>
                                <li><a href="{{ route('main_admin_dashboard_show_delivery_team_feedbacks_page') }}">Delivery Team Feedbacks</a></li>
                            </ul>
                        </li>

                        <li>
                            <a  id="Communication" href="{{ route('main_admin_dashboard_communication_page') }}"><i class="fas fa-file-invoice-dollar"></i> <span>Communication</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Finance Management</span>
                        </li>

                        <li>
                            <a href="{{ route('main_admin_dashboard_show_income_page') }}" id="Income"><i class="fas fa-holly-berry"></i> <span>Income</span></a>
                        </li>

                        <li>
                            <a href="{{ route('main_admin_dashboard_show_expenses_page') }}" id = "Expenses"><i class="fas fa-comment-dollar"></i> <span>Expenses</span></a>
                        </li>

                        <li class="menu-title">
                            <span>About System</span>
                        </li>

                        <li>
                            <a href="{{ route('main_admin_dashboard_show_analytics_page') }}"  id="Analytics"><i class="fas fa-clipboard-list"></i> <span>Analytics</span></a>
                        </li>

                        <li>
                            <a href="{{ route('main_admin_dashboard_show_settings_page') }}"  id="Settings"><i class="fas fa-cog"></i> <span>Settings</span></a>
                        </li>

                        <li>
                            <a href="{{ route('main_admin_dashboard_customization_page') }}"  id="Customization"><i class="fas fa-file"></i> <span>Customization</span></a>
                        </li>

                        <li class="menu-title">
                            <span>About You</span>
                        </li>

                        @if(isset($admin_session))
                            <li>
                                <a href="{{route('admin_account', $admin_session->id)}}"><i class="fas fa-user"></i> <span>Profile</span></a>
                            </li>
                        @endif

                        <li class="menu-title">
                            <span>Others</span>
                        </li>

                        <li>
                            <a href="{{ route('main_admin_dashboard_help_page') }}"  id="Help"><i class="fas fa-baseball-ball"></i> <span>Help</span></a>
                        </li>

                        <li>
                            <a href="{{ route('main_admin_dashboard_documentation_page') }}"  id="Documentation"><i class="fas fa-hotel"></i> <span>Documentation</span></a>
                        </li>

                        <li>
                            <a onclick="confirmAdminLogout()" id = "logout_menu"><i class="fas fa-bus"></i> <span>Logout</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>