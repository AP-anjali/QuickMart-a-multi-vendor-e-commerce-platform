function load() {
   setTimeout(function () {
       document.getElementById("preloader").style.display = "none";
   }, 4000);
   // document.getElementById("preloader").style.display = "none";
}

window.addEventListener("load", load);

let toggleBtn = document.getElementById('toggle-btn');
let body = document.body;
let darkMode = localStorage.getItem('dark-mode');

const enableDarkMode = () =>{
   toggleBtn.classList.replace('fa-sun', 'fa-moon');
   body.classList.add('dark');
   localStorage.setItem('dark-mode', 'enabled');
}

const disableDarkMode = () =>{
   toggleBtn.classList.replace('fa-moon', 'fa-sun');
   body.classList.remove('dark');
   localStorage.setItem('dark-mode', 'disabled');
}

if(darkMode === 'enabled'){
   enableDarkMode();
}

toggleBtn.onclick = (e) =>{
   darkMode = localStorage.getItem('dark-mode');
   if(darkMode === 'disabled'){
      enableDarkMode();
   }else{
      disableDarkMode();
   }
}

function toggleSubMenu(){
   let customer_account_sub_menu = document.getElementById("customer_account_sub_menu");
   customer_account_sub_menu.classList.toggle('open-sub-menu');
}

function confirmAdminLogout() {
   let answer = confirm("Are you sure you want to logout?");
   if (answer) {
       window.location.href = "/admin_logout";
   }
}

function confirmSellerLogout() {
   let answer = confirm("Are you sure you want to logout?");
   if (answer) {
       window.location.href = "/seller_logout";
   }
}

function confirmCustomerLogout() {
   let answer = confirm("Are you sure you want to logout?");
   if (answer) {
       window.location.href = "/customer_logout";
   }
}

function confirmEmployeeLogout() {
   let answer = confirm("Are you sure you want to logout?");
   if (answer) {
       window.location.href = "/employee_logout";
   }
}

function confirmDeliveryTeamMemberLogout() {
   let answer = confirm("Are you sure you want to logout?");
   if (answer) {
       window.location.href = "/delivery_team_member_logout";
   }
}