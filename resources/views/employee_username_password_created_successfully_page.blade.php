<!-- employee_username_password_created_successfully_page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('cssfiles/captcha_submitted_page.css') }}" />
    <title>Thank you</title>
</head>
<body>
    <div class="container">
        <!-- <button type = "submit" class = "btn" onclick = "openPopUp()">Test</button> -->
        <div class="popup" id= "popUpArea">
            <img src="{{ asset('img/—Pngtree—purple tick_5464714.png') }}" alt="tick image">
            <h2 style = "margin-top: 10px;">Thank You !</h2>
            <p>Your details has been submitted successfully... <br><br>Your Username and Password<br>Created Successfully, <br> Now you can join your account through<br>LOGIN process <br><br><u><b>Thanks !</b></u></p>
            <button type = "submit" onclick = "process_further()" style = "margin-top: 20px;">Process Further</button>
        </div>
    </div>

    <script>
        let popup = document.getElementById("popUpArea");

        window.onload = function() {
            popup.classList.add("open_popup");
        }

        function process_further(){
            window.location.replace("/employee_login_page_first_step");
        }
    </script>
</body>
</html>