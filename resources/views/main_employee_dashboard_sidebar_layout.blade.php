<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>

                        <li class="menu-title">
                            <span>Main Menu</span>
                        </li>


                        <li>
                            <a href="{{ route('main_employee_dashboard') }}"  id = "Dashboard"><i class="feather-grid"></i><span> Dashboard</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Application Management</span>
                        </li>

                        <li class="submenu">
                            <a href="#" id = "Delivery_Team"><i class="fas fa-graduation-cap"></i> <span>Delivery Team</span> <span
                                    class="menu-arrow"></span></a>

                            <ul>
                                <li><a href="{{ route('main_employee_dashboard_show_all_initial_applications_of_delivery_team_page') }}" id="All_Initial_Applications" style = "white-space : nowrap;"><i class="fas fa-holly-berry"></i> <span>All Initial Applications</span></a></li>       
                                <li style = "white-space: nowrap;"><a href="{{ route('main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_emp_page') }}" id="Confirmed_By_E"><i class="fas fa-holly-berry"></i> <span>Confirmed By (EMP)</span></a></li>                                        
                                <li style = "white-space: nowrap;"><a href="{{ route('main_employee_dashboard_show_all_delivery_team_applications_confirmed_by_admin_page') }}" id="Confirmed_By_A"><i class="fas fa-holly-berry"></i> <span>Confirmed By (ADMIN)</span></a></li>                                        
                                <li style = "white-space: nowrap;"><a href="{{ route('main_employee_dashboard_show_all_delivery_team_applications_eligible_by_employee_page') }}" id="Eligible_By_E"><i class="fas fa-holly-berry"></i> <span>Eligible By (EMP)</span></a></li>
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
                            <a onclick="confirmEmployeeLogout()" id = "logout_menu"><i class="fas fa-bus"></i> <span>Logout</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>