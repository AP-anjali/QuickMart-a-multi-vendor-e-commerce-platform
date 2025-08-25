<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dummy_dashboard</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/dummy_dashboard_copy.css') }}">
    <link rel="icon" href="{{ asset('img/icon.png') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        :root {
            --hue: 223;
            --bg: hsl(var(--hue),10%,90%);
            --fg: hsl(var(--hue),10%,10%);
            --primary: hsl(var(--hue),90%,55%);
            --primary-l: hsl(var(--hue),90%,65%);
            --primary-d: hsl(var(--hue),90%,45%);
            --white: hsl(var(--hue),10%,100%);
            --white-d: hsl(var(--hue),10%,45%);
            font-size: calc(16px + (24 - 16) * (100vw - 320px) / (1280 - 320));
        }
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #E4E9F7; 
            z-index: 9999999999998; 
        }
        .book,
        .book__pg-shadow,
        .book__pg {
            animation: cover 7s ease-in-out infinite;
        }
        .book {
            background-color: var(--primary-l);
            border-radius: 0.25em;
            box-shadow:
                0 0.25em 0.5em hsla(0,0%,0%,0.3),
                0 0 0 0.25em var(--primary) inset;
            padding: 0.25em;
            perspective: 37.5em;
            position: relative;
            width: 8em;
            height: 6em;
            transform: translate3d(0,0,0);
            transform-style: preserve-3d;
            z-index: 9999999999999;
        }
        .book__pg-shadow,
        .book__pg {
            position: absolute;
            left: 0.25em;
            width: calc(50% - 0.25em);
        }
        .book__pg-shadow {
            animation-name: shadow;
            background-image: linear-gradient(-45deg,hsla(0,0%,0%,0) 50%,hsla(0,0%,0%,0.3) 50%);
            filter: blur(0.25em);
            top: calc(100% - 0.25em);
            height: 3.75em;
            transform: scaleY(0);
            transform-origin: 100% 0%;
        }
        .book__pg {
            animation-name: pg1;
            background-color: var(--white);
            background-image: linear-gradient(90deg,hsla(var(--hue),10%,90%,0) 87.5%,hsl(var(--hue),10%,90%));
            height: calc(100% - 0.5em);
            transform-origin: 100% 50%;
        }
        .book__pg--2,
        .book__pg--3,
        .book__pg--4 {
            background-image:
                repeating-linear-gradient(hsl(var(--hue),10%,10%) 0 0.125em,hsla(var(--hue),10%,10%,0) 0.125em 0.5em),
                linear-gradient(90deg,hsla(var(--hue),10%,90%,0) 87.5%,hsl(var(--hue),10%,90%));
            background-repeat: no-repeat;
            background-position: center;
            background-size: 2.5em 4.125em, 100% 100%;
        }
        .book__pg--2 {
            animation-name: pg2;
        }
        .book__pg--3 {
            animation-name: pg3;
        }
        .book__pg--4 {
            animation-name: pg4;
        }
        .book__pg--5 {
            animation-name: pg5;
        }

        /* Dark theme */
        @media (prefers-color-scheme: dark) {
            :root {
                --bg: hsl(var(--hue),10%,30%);
                --fg: hsl(var(--hue),10%,90%);
            }
        }

        /* Animations */
        @keyframes cover {
            from, 5%, 45%, 55%, 95%, to {
                animation-timing-function: ease-out;
                background-color: var(--primary-l);
            }
            10%, 40%, 60%, 90% {
                animation-timing-function: ease-in;
                background-color: var(--primary-d);
            }
        }
        @keyframes shadow {
            from, 10.01%, 20.01%, 30.01%, 40.01% {
                animation-timing-function: ease-in;
                transform: translate3d(0,0,1px) scaleY(0) rotateY(0);
            }
            5%, 15%, 25%, 35%, 45%, 55%, 65%, 75%, 85%, 95% {
                animation-timing-function: ease-out;
                transform: translate3d(0,0,1px) scaleY(0.2) rotateY(90deg);
            }
            10%, 20%, 30%, 40%, 50%, to {
                animation-timing-function: ease-out;
                transform: translate3d(0,0,1px) scaleY(0) rotateY(180deg);
            }
            50.01%, 60.01%, 70.01%, 80.01%, 90.01% {
                animation-timing-function: ease-in;
                transform: translate3d(0,0,1px) scaleY(0) rotateY(180deg);
            }
            60%, 70%, 80%, 90%, to {
                animation-timing-function: ease-out;
                transform: translate3d(0,0,1px) scaleY(0) rotateY(0);
            }
        }
        @keyframes pg1 {
            from, to {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0.4deg);
            }
            10%, 15% {
                animation-timing-function: ease-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(180deg);
            }
            20%, 80% {
                animation-timing-function: ease-in;
                background-color: var(--white-d);
                transform: translate3d(0,0,1px) rotateY(180deg);
            }
            85%, 90% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(180deg);
            }
        }
        @keyframes pg2 {
            from, to {
                animation-timing-function: ease-in;
                background-color: var(--white-d);
                transform: translate3d(0,0,1px) rotateY(0.3deg);
            }
            5%, 10% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0.3deg);
            }
            20%, 25% {
                animation-timing-function: ease-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(179.9deg);
            }
            30%, 70% {
                animation-timing-function: ease-in;
                background-color: var(--white-d);
                transform: translate3d(0,0,1px) rotateY(179.9deg);
            }
            75%, 80% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(179.9deg);
            }
            90%, 95% {
                animation-timing-function: ease-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0.3deg);
            }
        }
        @keyframes pg3 {
            from, 10%, 90%, to {
                animation-timing-function: ease-in;
                background-color: var(--white-d);
                transform: translate3d(0,0,1px) rotateY(0.2deg);
            }
            15%, 20% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0.2deg);
            }
            30%, 35% {
                animation-timing-function: ease-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(179.8deg);
            }
            40%, 60% {
                animation-timing-function: ease-in;
                background-color: var(--white-d);
                transform: translate3d(0,0,1px) rotateY(179.8deg);
            }
            65%, 70% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(179.8deg);
            }
            80%, 85% {
                animation-timing-function: ease-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0.2deg);
            }
        }
        @keyframes pg4 {
            from, 20%, 80%, to {
                animation-timing-function: ease-in;
                background-color: var(--white-d);
                transform: translate3d(0,0,1px) rotateY(0.1deg);
            }
            25%, 30% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0.1deg);
            }
            40%, 45% {
                animation-timing-function: ease-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(179.7deg);
            }
            50% {
                animation-timing-function: ease-in;
                background-color: var(--white-d);
                transform: translate3d(0,0,1px) rotateY(179.7deg);
            }
            55%, 60% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(179.7deg);
            }
            70%, 75% {
                animation-timing-function: ease-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0.1deg);
            }
        }
        @keyframes pg5 {
            from, 30%, 70%, to {
                animation-timing-function: ease-in;
                background-color: var(--white-d);
                transform: translate3d(0,0,1px) rotateY(0);
            }
            35%, 40% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0deg);
            }
            50% {
                animation-timing-function: ease-in-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(179.6deg);
            }
            60%, 65% {
                animation-timing-function: ease-out;
                background-color: var(--white);
                transform: translate3d(0,0,1px) rotateY(0);
            }
        }
    </style>
</head>
<body>
    <!-- <div id="preloader">
        <img src="{{ asset('img/Bars-1s-200px.gif') }}" alt="Loading...">
    </div> -->

    <div id="preloader">
        <div class="book">
            <div class="book__pg-shadow"></div>
            <div class="book__pg"></div>
            <div class="book__pg book__pg--2"></div>
            <div class="book__pg book__pg--3"></div>
            <div class="book__pg book__pg--4"></div>
            <div class="book__pg book__pg--5"></div>
        </div>
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

    <script>

        document.addEventListener("DOMContentLoaded", function () {
            // Show preloader
            document.getElementById("preloader").style.display = "flex";

            // Hide preloader after 3 seconds
            setTimeout(function () {
                document.getElementById("preloader").style.display = "none";
            }, 7000);
        });

        // function load() {
        //     setTimeout(function () {
        //         document.getElementById("preloader").style.display = "none";
        //     }, 1500);
        // }

        // window.addEventListener("load", load);

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