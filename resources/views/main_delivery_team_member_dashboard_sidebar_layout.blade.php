<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>


                        <li>
                            <a href="{{ route('main_delivery_team_member_dashboard') }}"  id = "Dashboard"><i class="feather-grid"></i><span> Dashboard</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Delivery Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Manage_Orders"><i class="fas fa-graduation-cap"></i> <span>Manage Orders</span> <span
                                    class="menu-arrow"></span></a>

                            <ul>
                                <li style = "white-space: nowrap;"><a href="{{ route('main_delivery_team_member_dashboard_show_new_orders_page') }}" id="New_Orders"><i class="fas fa-holly-berry"></i><span>New Orders</span></a></li>
                                <li style = "white-space: nowrap;"><a href="{{ route('main_delivery_team_member_dashboard_show_pending_orders_page') }}" id="Pending_Orders"><i class="fas fa-holly-berry"></i><span>Pending Orders</span></a></li>
                                <li style = "white-space: nowrap;"><a href="{{ route('main_delivery_team_member_dashboard_show_shipped_orders_page') }}" id="Shipped_Orders"><i class="fas fa-holly-berry"></i><span>Shipped Orders</span></a></li>
                                <li style = "white-space: nowrap;"><a href="{{ route('main_delivery_team_member_dashboard_show_completed_orders_page') }}" id="Completed_Orders"><i class="fas fa-holly-berry"></i><span>Completed Orders</span></a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>Payment Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Revenue"><i class="fas fa-graduation-cap"></i> <span>Revenue</span> <span
                                    class="menu-arrow"></span></a>

                            <ul>
                                <li style = "white-space: nowrap;"><a href="#" id="Payment_Record"><i class="fas fa-holly-berry"></i><span>Payment Record</span></a></li>
                            </ul>
                        </li>

                        <li class="menu-title">
                            <span>About System</span>
                        </li>

                        <li>
                            <a href="#"  id="Settings"><i class="fas fa-cog"></i> <span>Settings</span></a>
                        </li>

                        <li>
                            <a href="#"  id="Customization"><i class="fas fa-file"></i> <span>Customization</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Others</span>
                        </li>

                        <li>
                            <a href="#"  id="Help"><i class="fas fa-baseball-ball"></i> <span>Help</span></a>
                        </li>

                        <li>
                            <a href="#"  id="Documentation"><i class="fas fa-hotel"></i> <span>Documentation</span></a>
                        </li>

                        <li>
                            <a onclick="confirmDeliveryTeamMemberLogout()" id = "logout_menu"><i class="fas fa-bus"></i> <span>Logout</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>