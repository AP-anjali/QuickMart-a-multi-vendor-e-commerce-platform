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
        <div class="popup" id= "popUpArea">
            <img src="{{ asset('img/—Pngtree—purple tick_5464714.png') }}" alt="tick image">
            <h2>Thank You !</h2>
            <p style = "white-space: nowrap;">Your Application has been submitted successfully <br> Now You Have To wait for confirmation number, <br> which we will send on your e-mail address if <br> all are our requirements will be full fill <br><br><b><u>Thanks !</u></b></p>
            <button type = "submit" onclick = "goback()">Okay</button>
        </div>
    </div>

    <script>
        let popup = document.getElementById("popUpArea");

        window.onload = function() {
            popup.classList.add("open_popup");
        }

        function goback(){
            window.location.replace("/employees_first_window");
        }
    </script>
</body>
</html>