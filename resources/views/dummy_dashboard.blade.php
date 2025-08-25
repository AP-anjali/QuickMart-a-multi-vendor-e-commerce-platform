<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dummy_dashboard</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/dummy_dashboard.css') }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div id="preloader">
        <img src="{{ asset('img/ecomm_preloader.gif') }}" alt="Loading...">
    </div>
    <div class="sidebar">
        <div class="logo-details">
            <!-- <img src="{{ asset('img/logo69.jpg') }}" alt="logo"> -->
            <i class='bx bx-spa'></i>
            <span class="logo_name">QUICKMART</span>
            <span class="logo_name_side">Admin Dashboard</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">Dashboard</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Category</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bx-grid-alt' ></i>
                        <span class="link_name">Category</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Category</a></li>
                    <li><a href="#">Web design1</a></li>
                    <li><a href="#">Web design2</a></li>
                    <li><a href="#">Web design3</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bx-grid-alt' ></i>
                        <span class="link_name">Posts</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">Posts</a></li>
                    <li><a href="#">post design1</a></li>
                    <li><a href="#">post design2</a></li>
                    <li><a href="#">post design3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">Analitics</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Analitics</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">Charts</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Charts</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="#">
                        <i class='bx bx-grid-alt' ></i>
                        <span class="link_name">plugins</span>
                    </a>
                    <i class='bx bxs-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name" href="#">plugins</a></li>
                    <li><a href="#">plugins design1</a></li>
                    <li><a href="#">plugins design2</a></li>
                    <li><a href="#">plugins design3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">Explore</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Explore</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">History</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">History</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="link_name">Settings</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="#">Settings</a></li>
                </ul>
            </li>
            <li>
        <div class="profile-details">
            <div class="profile-content">
                <img src="{{ asset('img/test.png') }}" alt="profile pic">
            </div>
            <div class="name-job">
                <div class="profile_name">Anjali Patel</div>
                <div class="job">Admin</div>
            </div>
            <i class='bx bx-log-out'></i>
        </div>
    </li>
</ul>
    </div>

    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Hello From Menu</span>
        </div>
    </section>

    <img src="{{ asset('img/cv_pic.jpg') }}" alt="test pic">

    <script>
        function load() {
            setTimeout(function () {
                document.getElementById("preloader").style.display = "none";
            }, 3000);
            // document.getElementById("preloader").style.display = "none";
        }

        window.addEventListener("load", load);

        let arrow = document.querySelectorAll(".arrow");
        for (let i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e)=>{
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".bx-menu");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", ()=>{
            sidebar.classList.toggle("close");
        });
    </script>

</body>
</html>