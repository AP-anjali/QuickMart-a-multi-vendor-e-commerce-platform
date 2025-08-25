<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>


                        <li>
                            <a href="{{ route('main_seller_dashboard') }}"  id = "Dashboard"><i class="feather-grid"></i><span> Dashboard</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Products Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Products"><i class="fas fa-graduation-cap"></i> <span>Products</span> <span
                                    class="menu-arrow"></span></a>

                            <ul>
                                <li><a href="{{ route('main_seller_dashboard_show_all_products_page') }}" id="all_products"><i class="fas fa-holly-berry"></i> <span>All Products</span></a></li>

                                <li><a href="{{ route('main_seller_dashboard_add_new_product_page') }}" id="Add_New_product"><i class="fas fa-holly-berry"></i> <span>Add New Product</span></a></li>

                                <li><a href="{{ isset($product_to_update) ? route('main_seller_dashboard_update_product_page', $product_to_update->id) : route('main_seller_dashboard_show_all_products_page_with_alert') }}" id="Update_product"><i class="fas fa-holly-berry"></i> <span>Update Product</span></a></li>
                                        
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Orders Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#"  id="Orders"><i class="fas fa-building"></i> <span>Orders</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>

                                <li><a href="{{ route('main_seller_dashboard_show_new_orders_page') }}"><i class="fas fa-holly-berry"></i> <span>New Orders</span></a></li>

                                <li><a href="{{ route('main_seller_dashboard_show_pending_orders_page') }}"><i class="fas fa-holly-berry"></i> <span>Accepted Orders</span></a></li>

                                <li><a href="{{ route('main_seller_dashboard_show_marked_as_ready_orders_page') }}"><i class="fas fa-holly-berry"></i> <span>Marked As Ready</span></a></li>

                                <li><a href="{{ route('main_seller_dashboard_show_shipped_orders_page') }}"><i class="fas fa-holly-berry"></i> <span>Shipped Orders</span></a></li>

                                <li><a  href="{{ route('main_seller_dashboard_show_completed_orders_page') }}"><i class="fas fa-holly-berry"></i> <span>Complated Orders</span></a></li>

                                <li><a href="{{ route('main_seller_dashboard_show_cancelled_orders_page') }}"><i class="fas fa-holly-berry"></i> <span>Cancelled Orders</span></a></li>
                                    
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Stock Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#"  id="Stock"><i class="fas fa-building"></i> <span>Stock</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('main_seller_dashboard_show_total_stock_page') }}">Total Stock</a></li>
                                <li><a href="{{ route('main_seller_dashboard_update_stock_page') }}">Update Stock</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Finance Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Revenue"><i class="fas fa-book-reader"></i> <span>Revenue</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('main_seller_dashboard_show_payment_notifications_page') }}">Payment Notifications</a></li>
                                <li><a href="{{ route('main_seller_dashboard_show_income_page') }}">Income Records</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>After Delivery Service</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id="After_Delivery_Service"><i class="fas fa-clipboard"></i> <span>Request Records</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('main_seller_dashboard_show_new_exchange_request_page') }}">Exchange Requests</a></li>
                                <li><a href="{{ route('main_seller_dashboard_show_new_return_request_page') }}">Return Requests</a></li>
                                <li><a href="{{ route('main_seller_dashboard_show_exchanged_orders_page') }}">Exchanged Orders</a></li>
                                <li><a href="{{ route('main_seller_dashboard_show_returned_orders_page') }}">Returned Orders</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Notifications</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id="All_Notifications"><i class="fas fa-clipboard"></i> <span>All Notifications</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="{{ route('main_seller_dashboard_show_order_notification_page') }}">Order Notifications</a></li>
                                <li><a href="{{ route('main_seller_dashboard_show_other_notification_page') }}">Other Notifications</a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Feedbacks</span>
                        </li>

                        <li>
                            <a href="{{ route('main_seller_dashboard_show_customers_feedback_page') }}" id="Customer_Feedbacks"><i class="fas fa-holly-berry"></i> <span>Customer Feedbacks</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Communication</span>
                        </li>

                        <li>
                            <a href="{{ route('main_seller_dashboard_customer_communication_by_mail_page') }}" id="Customer_Communication"><i class="fas fa-holly-berry"></i> <span>Customers Communication</span></a>
                            <a href="{{ route('main_seller_dashboard_admin_communication_by_mail_page') }}" id="Admin_communication"><i class="fas fa-holly-berry"></i> <span>Admin Communication</span></a>
                        </li>


                        <li class="menu-title">
                            <span>About System</span>
                        </li>

                        <li>
                            <a href="{{ route('main_seller_dashboard_settings_page') }}" id="Settings"><i class="fas fa-holly-berry"></i> <span>Settings</span></a>
                            <a href="{{ route('main_seller_dashboard_help_page') }}" id="Help"><i class="fas fa-holly-berry"></i> <span>Help</span></a>
                            <a href="{{ route('main_seller_dashboard_about_us_page') }}" id="About_Us"><i class="fas fa-holly-berry"></i> <span>About Us</span></a>
                            <a href="{{ route('main_seller_dashboard_contact_us_page') }}" id="Contact_Us"><i class="fas fa-holly-berry"></i> <span>Contact Us</span></a>
                            <a href="{{ route('main_seller_dashboard_documentation_page') }}" id="Documentation"><i class="fas fa-holly-berry"></i> <span>Documentation</span></a>
                        </li>


                        <li class="menu-title">
                            <span>Others</span>
                        </li>

                        @if(isset($seller_session))
                            <li>
                                <a href="{{ route('seller_account', $seller_session->id) }}"  id="Profile"><i class="fas fa-file"></i> <span>Profile</span></a>
                            </li>
                        @endif

                        <li>
                            <a href="{{ route('main_seller_dashboard_customization_page') }}"  id="Customization"><i class="fas fa-file"></i> <span>Customization</span></a>
                        </li>

                        <li>
                            <a onclick="confirmSellerLogout()" id="logout_menu"><i class="fas fa-bus"></i> <span>Logout</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>