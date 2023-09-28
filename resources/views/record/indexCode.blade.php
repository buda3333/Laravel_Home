<!DOCTYPE html>
<html lang="en">
<body>
<form action="{{ route('register.record6') }}" method="post" class="container">
    @csrf
    <h1>Записаться</h1>
    <h3>Ваши Данные</h3>
    <div class="pr-dtl">
        <div class="input-div">
            <label for="name">Код из смс:</label><label style="color: #4b1010">@if(isset($error) && !empty($error))
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endif</label>
            <input type="text" id="code" name="code">
        </div>
    </div>
    <input type="submit" id="submit-btn" value="Записаться">

</form>
<video class="bg-effect" muted autoplay>
    <source src="https://regestrationpage.glitch.me/smoke_video.mp4" type="video/mp4">
</video>
</body>
</html>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        outline: none;
        font-family: sans-serif;
        font-weight: 1000;
    }
    input:-webkit-outer-spin-button,
    input::-webkit-inner-spin-button{
        -webkit-appearance: none;
    }
    input[type=number]{
        -moz-appearance:  textfield;
    }
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: black;
        color: white;
    }
    h1{
        font-size: 50px;
    }
    .container{
        width: 1000px;
        display: flex;
        align-items: center;
        justify-content: center;
        grid-row-gap: 40px;
        flex-direction: column;
        padding: 50px;
    }
    .pr-dtl,.add-dtl,.ps-dtl{
        width: 100%;
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 30px;
        align-items: center;
        justify-content: center;
    }
    .input-div{
        display: flex;
        flex-direction: column;
        grid-gap: 10px;
    }
    label{
        font-size: 18px;
    }
    input{
        height: 50px;
        width: 500px;
        background: none;
        padding: 10px;
        border: 2px solid white;
        color: white;
    }
    #submit-btn {
        height: 50px;
        width: 200px;
        background: none;
        border: 2px solid white;
        transition: 0.5s all;
        color: white;
        cursor: pointer;
    }
    #submit-btn:hover{
        color: black;
        background: white;
    }
    .tc{
        width: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        grid-gap: 10px;
    }
    .tc input{
        height: 20px;
        width: 20px;
        cursor: pointer;
    }
    .tc a{
        text-decoration: none;
        color: white;
    }
    span{
        color: red;
        font-size: 15px;
    }
    h3{
        display: flex;
    }
    h3:after{
        content: "";
        position: absolute;
        height: 3px;
        width: 20px;
        margin-top: 30px;
        background: white;
        animation: ani 4s linear infinite;
    }
    @keyframes ani{
        50%{
            margin-left: 100px;
        }
    }
    .bg-effect{
        position: absolute;
        width: 100%;
        z-index: -1;
        background-size: cover;
        margin-top: -100px;
        filter: blur(50px);
        transform: rotate(180deg);
    }
    .middel-fx{
        height: 300px;
        width: 300px;
        background: royalblue;
        filter: blur(100px);
        position: absolute;
        border-radius: 50%;
    }
    @media screen and (max-width: 1050px){
        body{
            overflow-x: hidden;
        }
        .container {
            width: 100%;
        }
        .pr-dtl,.add-dtl,.ps-dtl{
            width: 150%;
            display: grid;
            grid-template-columns: 70%;
            grid-gap: 30px;
            align-items: center;
            justify-content: center;
        }
        input{
            width: 100%;
        }
        #submit-btn{
            width: 100%;
        }
        .bg-effect{
            width: 400%;
            height: 100%;
            margin-top: -200px;
            transform: rotate(90deg);
        }
    }
</style>
