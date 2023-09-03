<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Reistration Form</title>
</head>
<body>
<form action="{{ route('register.perform') }}" method="post">
    @csrf
    <div class="container">
    <label>Username</label> <label style="color: #4b1010">@error('username') {{ $message }} @enderror</label>
    <input type="text" name="username" value="{{ old('username') }}" placeholder="Enter Username">
    <label>Email</label> <label style="color: #4b1010">@error('email') {{ $message }} @enderror</label>
    <input type="text" name="email" value="{{ old('email') }}" placeholder="Enter Email">
    <label>Telephone</label> <label style="color: #4b1010">@error('telephone') {{ $message }} @enderror</label>
    <input type="text" name="telephone" placeholder="Enter your phone number">
    <label>Password</label> <label style="color: #4b1010">@error('password') {{ $message }} @enderror</label>
    <input type="password" name="password" placeholder="Enter Password">
    <label>Password Confirmation</label> <label style="color: #4b1010">@error('password_confirmation') {{ $message }} @enderror</label>
    <input type="password" name="password_confirmation" placeholder="Enter Password">
    <button type="submit" class="register-btn">Register</button>
    <p>
        Do you already have an account? - <a href="{{ route('login.perform') }}">Log in</a>!
    </p>
    </div>
</form>
</body>
</html>


<style>
    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap');

    body {
        font-family: Montserrat,Arial, Helvetica, sans-serif;
        background-color:#f7f7f7;
    }
    * {box-sizing: border-box}

    /* Add padding to container elements */
    .container {
        padding: 20px;
        width:500px;
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        border:1px solid #ccc;
        border-radius:10px;
        background:white;
        -webkit-box-shadow: 2px 1px 21px -9px rgba(0,0,0,0.38);
        -moz-box-shadow: 2px 1px 21px -9px rgba(0,0,0,0.38);
        box-shadow: 2px 1px 21px -9px rgba(0,0,0,0.38);
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f7f7f7;
        font-family: Montserrat,Arial, Helvetica, sans-serif;
    }
    select {
        width: 18%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f7f7f7;
        font-family: Montserrat,Arial, Helvetica, sans-serif;
    }

    /* Set a style for all buttons */
    button {
        background-color: #0eb7f4;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
        font-size:16px;
        font-family: Montserrat,Arial, Helvetica, sans-serif;
        border-radius:10px;
    }

    button:hover {
        opacity:1;
    }

    /* Change styles for signup button on extra small screens */
    @media screen and (max-width: 300px) {
        .signupbtn {
            width: 100%;
        }
    }
</style>
