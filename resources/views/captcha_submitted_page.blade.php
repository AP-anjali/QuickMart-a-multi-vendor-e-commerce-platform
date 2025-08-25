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
            <h2>Thank You !</h2>
            <p>Your details has been submitted successfully... Thanks !</p>
            <button type = "submit" onclick = "goback()">Okay</button>
        </div>
    </div>

    <script>
        let popup = document.getElementById("popUpArea");

        window.onload = function() {
            popup.classList.add("open_popup");
        }

        // function openPopUp(){
        //     popup.classList.add("open_popup");
        // }

        function goback(){
            window.location.replace("/main_contact_page");
        }
    </script>
</body>
</html>