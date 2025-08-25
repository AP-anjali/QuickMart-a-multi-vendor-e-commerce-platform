<div class="main-wrapper">

        <div class="header" style = " height: 80px; border-bottom: 1px solid rgba(0,0,0,.2); padding-top: 10px;">

            <div class="header-left" style = "height: 80px; border-bottom: 1px solid rgba(0,0,0,.2); margin-top: -10px; border-right: 1px solid rgba(0,0,0,.2);">
                <a href="{{ route('main_seller_dashboard') }}" class="logo">
                    <!-- <img src="{{ asset('seller/assets/img/logo.png')}}" alt="Logo"> -->
                    <img src="{{ asset('seller/assets/img/logo69.jpg')}}" alt="Logo" style = "border-radius: 8px; margin-left:10px;">
                    <span style = "color: #454545; font-size: 24px; margin-left:10px; position:absolute; font-weight: 600" id="logo_text">QUICKMART</span>
                </a>
                <span style = "color: #454545; font-size: 14px; margin-left:25px; margin-top:40px; position:relative; " id="my_text">Seller Dasboard</span>

                <a href="{{ route('main_seller_dashboard') }}" class="logo logo-small">
                    <img src="{{ asset('seller/assets/img/logo-small.jpg')}}" alt="Logo" width="30" height="30" style = "border-radius: 8px;">
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn" style="margin-left: 60px; background: #B7C9E2; color: #305d72; border: 1px solid #305d72;">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form action="#">
                    <input type="text" class="form-control" placeholder="Search here" style="margin-left: 60px;">
                    <button class="btn" type="submit"><i class="fas fa-search"style="margin-left: 60px;"></i></button>
                </form>
            </div>
            <!-- <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a> -->

            <ul class="nav user-menu">

                <li>
                    <a href="{{ url('/') }}" id="main_page_id">
                        Main Page
                    </a>
                </li>

                <li class="nav-item dropdown noti-dropdown me-2">
                    <a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
                        <img src="{{ asset('seller/assets/img/icons/gantadi.svg')}}" alt="">
                    </a>
                </li>

                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="{{ asset('seller/assets/img/icons/fullscreen.svg')}}" alt="bhai bhai" id="full_screen_id">
                    </a>
                </li>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="{{ asset('storage/' . $seller_session->profile_pic) }}" width = "31"
                                alt="Soeng Souy">
                            <div class="user-text">
                            @if(isset($seller_session))
                            <h6>{{ $seller_session->name }}!</h6>
                            @endif
                                <!-- <h6>Soeng Souy</h6> -->
                                <p class="text-muted mb-0" style = "color : #454545 !important;">Seller</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="{{ asset('storage/' . $seller_session->profile_pic) }}" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                @if(isset($seller_session))
                                <h6>{{ $seller_session->name }}!</h6>
                                @endif
                                <!-- <h6>Soeng Souy</h6> -->
                                <p class="text-muted mb-0">Seller</p>
                            </div>
                        </div>

                        @if(isset($seller_session))
                            <a class="dropdown-item" href="{{route('seller_account', $seller_session->id)}}">My Profile</a>
                        @endif

                        <a class="dropdown-item" onclick="confirmSellerLogout()">Logout</a>
                    </div>
                </li>

            </ul>

        </div>