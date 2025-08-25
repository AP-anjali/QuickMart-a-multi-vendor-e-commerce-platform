<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('cssfiles/captcha_submitted_page.css') }}" />
    <title>Confirmed 1st Successfully</title>
</head>
<body>
    <div class="container">
        <div class="popup" id= "popUpArea">
            <img src="{{ asset('img/—Pngtree—purple tick_5464714.png') }}" alt="tick image">
            <h2 style = "white-space : nowrap; font-size: 22px; margin-left: -10px;"><b>Applicant Confirmed Successfully!</b></h2>
            <p style = "white-space: nowrap;"><br>This Particullar Applicant is confirmed<br><br><b><u>You May Continue !</u></b></p>
            <button type = "submit" onclick = "goback()">Okay</button>
        </div>
    </div>

    <script>
        let popup = document.getElementById("popUpArea");

        window.onload = function() {
            popup.classList.add("open_popup");
        }

        function goback(){
            window.location.replace("/main_employee_dashboard/main_employee_dashboard_show_all_initial_applications_of_delivery_team_page");
        }
    </script>
</body>
</html>