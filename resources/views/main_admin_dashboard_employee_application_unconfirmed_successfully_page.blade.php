<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('cssfiles/captcha_submitted_page.css') }}" />
    <title>Unconfirmed Successfully</title>
</head>
<body>
    <div class="container">
        <div class="popup" id= "popUpArea">
            <img src="{{ asset('img/—Pngtree—purple tick_5464714.png') }}" alt="tick image">
            <h2 style = "white-space : nowrap; font-size: 20px;"><b>Applicant Unconfirmed Successfully!</b></h2>
            <p style = "white-space: nowrap;"><br>This Particullar Applicant is Unconfirmed<br><br><b><u>You May Continue !</u></b></p>
            <button type = "submit" onclick = "goback()">Okay</button>
        </div>
    </div>

    <script>
        let popup = document.getElementById("popUpArea");

        window.onload = function() {
            popup.classList.add("open_popup");
        }

        function goback(){
            window.location.replace("/main_admin_dashboard/main_admin_dashboard_show_all_confirmed_employee_application_page");
        }
    </script>
</body>
</html>