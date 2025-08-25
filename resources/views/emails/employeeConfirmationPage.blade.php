<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Confirmation</title>
    <style>
        #create_account_btn{
            text-decoration: none;
            background: #F7F7FA; 
            color: #454545;
            font-weight: 500;
            border: 1px solid rgba(0,0,0,.2); 
            padding: 20px;
            border-radius: 8px; 
            transition : 0s all ease;
        }

        #create_account_btn:hover{
            color: black;
            border: 1px solid black; 
            font-weight: 500;
            background: #7BB274;
        }
    </style>
</head>
<body>
    <div>
        <h1 style = "color: #7BB274;" >Confirmation Mail From QUICKMART</h1>
        <h3>You are finally confirmed for EMPLOYMENT From QUICKMART</h3>
        <p>Your Confirmation Code Is: <b> {{ $confirmation_code }} </b></p>
        <p>Please proceed further to create your account.</p><br>
        <h3 style = "color: purple;">Now Process further and Create Your employee account, click on "Create Account" Button</h3><br><br>
        <a href="{{ route('confirmed_employee_account_creation_first_page') }}" id = "create_account_btn">Create Account</a>
        <br><br>
        <h3 style = "color: #454545;">THANK YOU!</h3>
    </div>
</body>
</html>