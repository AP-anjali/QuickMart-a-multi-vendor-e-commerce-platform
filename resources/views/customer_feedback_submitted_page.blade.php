<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('cssfiles/feedback_form_submitted_page.css') }}" />
    <title>QUICKMART | Feedback Submitted</title>
</head>
<body>
    <div class="container">
        <div class="popup" id= "popUpArea">
            <img src="{{ asset('img/—Pngtree—purple tick_5464714.png') }}" alt="tick image">
            <h2>Thank You !</h2>
            <h3 style = "margin-top: 15px;">Your Feedback has been submitted successfully... Thanks &#10084; !</h3>
            <button type = "submit" onclick = "goback()">Okay</button>
        </div>
    </div>

    <script>
        let popup = document.getElementById("popUpArea");

        window.onload = function() {
            popup.classList.add("open_popup");
        }

        function goback(){
            window.location.replace("/customer_feedback_page");
        }
    </script>
</body>
</html>