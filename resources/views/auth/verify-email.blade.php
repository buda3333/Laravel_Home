<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>
<body>
<div class="container">
    <h2>Подтверждение электронной почты</h2>

    <p>Спасибо за регистрацию! Перед тем как продолжить, пожалуста, проверьте свою электронную почту для подтверждения.</p>

    <p>Если вы не получили письмо,</p>

    <form class="d-inline" method="POST" action="/email/verification-notification">
        @csrf
        <button type="submit" class="btn">нажмите здесь, чтобы запросить другое</button>
    </form>

    <p style="margin-top: 20px;">После подтверждения электронной почты, вы сможете получить полный доступ к системе</p>
</div>
</body>
</html>
<style>
    body {
        background-color: #f4f6f8;
        font-family: Arial, sans-serif;
        background-image: url('https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/aeaeaeaeaeae.jpg');
    }
    .container {
        width: 80%;
        margin: auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 4px;
        margin-top: 50px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .btn {
        background-color: #3490dc;
        color: #ffffff;
        padding: 10px 15px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }
</style>
