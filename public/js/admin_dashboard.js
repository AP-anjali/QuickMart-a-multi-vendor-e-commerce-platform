const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

    toggle.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
    });

    searchBtn.addEventListener("click", ()=>{
        sidebar.classList.remove("close");
    });

    modeSwitch.addEventListener("click", ()=>{
        body.classList.toggle("dark");
    });

    document.addEventListener('DOMContentLoaded', function () {
        var usersMenuItem = document.getElementById('users');

        usersMenuItem.addEventListener('click', function () {
            usersMenuItem.classList.toggle('active');
        });
    });