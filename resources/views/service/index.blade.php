<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="description" content="Your description goes here">
            <meta name="keywords" content="one, two, three">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;700&display=swap" rel="stylesheet">

            <title>Blank Template</title>

            <!-- external CSS link -->
            <link rel="stylesheet" href="css/normalize.css">
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
        <nav>
            <ul>
                <li><a href="/home"> Home</a> </li>
                <li><a href="#"> About</a> </li>
                <li><a href="#"> Services</a> </li>
                <li><a href="#"> Lookbook</a> </li>
                <li><a href="#"> News</a> </li>
                <li><a href="#"> Contact</a> </li>
            </ul>
        </nav>
        <header>
            <section class="bigpic">
                <section class="advert">


                    <h1>Lazer <br>Home</h1>
                    <h5></h5>
                </section>
            </section>
        </header>
        @foreach ($services as $service)
        <main>
            <section class="momentum">
                <section>
                    <h2>{{ $service->name }}<br> {{ $service->description }}</h2>
                    <p></p>
                    <button class="blkbtn" type="button" name="button"> - READ MORE</button>
                </section>
                <img src="https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1951&q=80" alt="">
            </section>
        </main>
        @endforeach
        <script type="text/javascript" src="js/main.js"></script>
        </body>
        </html>
    <style>
        /* Box Model Hack */
        * {
            box-sizing: border-box;
        }

        /* Clear fix hack */
        .clearfix:after {
            content: ".";
            display: block;
            clear: both;
            visibility: hidden;
            line-height: 0;
            height: 0;
        }

        .clear {
            clear: both;
        }

        /******************************************
        /* BASE STYLES
        /*******************************************/
        html{
            font-size: 16px;
        }
        body {
            max-width: 1800px;
            margin-left: auto;
            margin-right: auto;

        }


        /******************************************
        /* LAYOUT
        /*******************************************/
        nav{
            display: block;
            width: 100%;
            align-items: center;
            margin-left: auto;
            margin-right: auto;

        }

        nav *{

            display: block;
            float: left;
            color: black;
            font-family: "Cinzel", serif;
            font-size: 1rem;
            text-decoration: none;



        }
        nav ul{
            display: block;
            width: 100%;
            /*border: 3px solid black;*/
            background-color: white;
            height: 60px;
            margin-left: auto;
            margin-right: auto;
        }
        nav li{
            float: left;
            width: 10%;
            margin-right: 3%;
            margin-left: 3%;
            padding-top: 18px;
        }
        header {
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            height: 1000px;

            overflow: hidden;
        }
        header .bigpic{
            position: relative;
            z-index: -1;
            height: 1000px;
            width: auto;
            border-radius: 90px;
            background-image: url(https://i.imgur.com/eyY93NM.jpg);
            background-position: right top;
            background-repeat: repeat-x;
            top: -18%;
            left: -2%;
            padding: 20px;
            width: 105%;
            box-shadow: 3px 5px tan;


            transform: rotate(7deg);
            margin-left: auto;
            margin-right: auto;

        }


        header .advert{
            z-index: 1;
            position: absolute;
            display: block;
            float: left;
            margin-left: 10%;
            width: 50%;


        }
        h1{
            width: 100%;
            color:white;
            font-size: 8rem;
            font-family: "Cinzel", serif;
            font-weight: 400;
            padding-top: 200px;
            text-align: left;
            padding-left: -3%;
            transform: rotate(-8deg);
        }
        header h5{
            color: white;
            font-family: "Cinzel", serif;
            font-size: 1.75rem;
            font-weight: normal;
            text-align: left;
            padding-left: 10%;
            transform: rotate(-8deg);
            text-transform: uppercase;
        }
        header .coupon{
            width:40%;
            background: black;
            color:white;
            transform: rotate(-8deg);
            margin-left: 18%;
            height: 300px;
            padding-left: 7%;
            padding-top: 10%;
        }

        .coupon p{
            float: left;
            display: inline-block;
            font-family: "Cinzel", serif;
            font-weight: normal;
            padding-bottom: 5%;
            line-height: 3rem;
            text-align: left;
            padding-right: 25%;

        }

        .coupon .first{

            margin-bottom: 10%;
            margin-top: -20%;
        }
        .coupon .copy{
            padding-right: 30%;
            margin-top: -7%;
            text-align: right;
            margin-bottom: .5%;
        }
        .coupon .copy2{
            text-align: left;
            float: left;
            margin-top: -6%;

        }

        .coupon button{
            float: left;

        }
        .coupon .disc{
            float: left;
            width: 30%;
            margin-bottom: .5%;
            font-size: 2rem;
            font-weight: bolder;
            text-align: right;
            padding-right: 10%;
            margin-top: -8%;
        }
        .services{
            display: block;
            float: left;
            width: 100%;
            padding-left: 5%;
            padding-right: 5%;
        }
        .services section{
            display: block;
            float: left;
            margin-left: 8%;
            margin-right: 8%;
            margin-bottom: 5%;
            width: 17%;
            text-align: center;
            font-weight: normal;
            font-family: "Cinzel", serif;
        }
        .services p{
            font-family: sans-serif;
        }
        .momentum{
            display: block;
            float: left;
            width: 100%;
            background: #F3F4F6;
            font-weight: normal;
            font-family: "Cinzel", serif;
            padding: 5%;
        }
        .momentum section{
            margin: -3%;
            display: block;
            float: left;
            width: 45%;
            margin-left: 8%;
            margin-right: 2%;
        }
        .momentum h2{
            font-size: 3.5rem;
            font-weight: 500;
        }
        .momentum p{
            font-family: sans-serif;
            font-weight: normal;
        }
        .momentum img{
            display: block;
            float: right;
            width: 30%;
            margin-right: 8%;
        }

        .momentum .blkbtn{
            color: white;
            background: black;
            padding: 2%;
        }
        .staff{
            display: block;
            float: left;
            width: 100%;
            font-family: "Cinzel", serif;
            text-align: center;
            padding-top: 3%;
        }
        .staff>section{
            display: block;
            float: left;
            width: 32%;
            position: relative;

        }
        .staff .head{
            border:2px solid black;
            width: 60%;
            position: relative;
        }
        .staff .card{
            position: absolute;
            z-index: 3;
            text-align: center;

            color: white;
            background: black;
            margin-top: -5%;
            width: 45%;
            margin-left: 25%;
            margin-bottom: 3%;
        }
        .coupon2{
            width: 100%;
            height: 500px;
            display: block;
            float: left;
            background-image: url(https://i.imgur.com/81Ellgy.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
            margin-top:5%;
            margin-bottom: 5%;
            font-family: "Cinzel", serif;
        }

        .coupon2 section{
            display: block;
            float: left;
            margin-left:5%;
            width:50%;
        }
        .coupon2 h6{
            font-size: 2rem;
            padding-top: 3%;
        }
        .coupon2 p{
            font-size: 3.75rem;

        }
        .coupon2 span{
            font-size: 4.5rem;
            font-weight: bold;
        }

        .coupon2 .blkbtn{
            color: white;
            background: black;
            padding: 2%;
            margin-top: -1%;
        }
        @media (max-width: 800px) and (min-width: 501px){

            .services section, .staff section{
                display: block;
                width: 100%;
                margin-right: auto;
                margin-left: auto;
                text-align: center;
            }
            .staff section{
                margin-bottom: 10%;
            }
            .staff .card{
                margin-top: -25%;
            }

        }







        @media screen and (max-width: 500px){
            nav, nav ul, nav li{
                display: list-item;
                list-style: none;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                float: left;
                height: auto;
                margin-bottom: 5%
            }
            h1{
                display: none;
                margin: 0%;
                height: 1px;
            }
            .bigpic{
                display: none;
                margin: 0%;
                height: 1px;
            }
            header{
                display: none;
            }

            .services section, .staff section{
                display: block;
                width: 100%;
                margin-right: auto;
                margin-left: auto;
                text-align: center;
            }
            .staff section{
                margin-bottom: 10%;
            }
            .staff .card{
                margin-top: -25%;
            }

            .momentum{
                display: none;
            }
            .coupon2 {
                background-image: none;
                display: block;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                width: 100%;

            }
            .coupon2 p, h6 {
                display: block;
                font-size: 2rem;
                text-align: center;
                width:80%;
                padding-left: 30%;
                margin-left: auto;
                margin-right: auto;

            }
            .coupon2 button.blkbtn{
                margin-left: 50%;
            }
        }
        }


        footer {

        }

        /******************************************
        /* ADDITIONAL STYLES
        /*******************************************/

    </style>
