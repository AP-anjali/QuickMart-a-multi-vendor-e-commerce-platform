<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('cssfiles/profile.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .goback {
            position: absolute;
            bottom: 40px;
            left: 90px;
            transform: translateX(-50%);
            /* text-align: center; */
            z-index: 9999; 
        }

        .goback a {
            text-decoration: none;
            color: #dbb98f;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
        }

        .goback a:hover {
            font-size: 19px;
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="profile_pic"><i class='bx bxs-user-account'></i></div>
    <div class="box">
        <h2>User Information</h2>
        <p class="name">Name: {{ $user->name }}</p>
        <p>Phone number: {{ $user->phone_no }}</p>
        <p>Address: {{ $user->address }}</p><br><br>

        <a href="{{ route('change_info') }}" class="button">Change Information</a>
    </div>
    <div class="goback" style="margin-top: 20px;">
        <br>
        <a href="{{ route('dashboard') }}">&lt;&lt;&nbsp;Go Back</a>
    </div>  
</body>
</html>