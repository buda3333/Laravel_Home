<!DOCTYPE html>
<html lang="en" dir="ltr">
<div class="bg-light p-5 rounded">
</div>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel=".css" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/home">Home</a></li>
            <li><a href="/specialist">Specialists</a></li>
            <li><a href="/service">Services</a></li>
            <li><a href="">Contact</a></li>
            <li><a href=""><ion-icon name="search-outline" class="iconNothing"></ion-icon></a></li>
            <li><a href=""><ion-icon name="bag-handle-outline" class="iconNothing"></ion-icon></a></li>
        </ul>
        <a href=""><ion-icon name="reorder-three-outline" class="tablet mobile threeLines"></ion-icon></a>
        @auth
            <a href="/logout" >Выйти</a>
            <a href="/records/{{Auth::user()->id}}" >Все Записи</a>
        @endauth
        <a href="/record2" >Record</a>
        @guest
        <a href="/login" >Вход</a>
        <a href="/registration" >Зарегистрироваться</a>
        @endguest
    </nav>
</header>
<main>
    <section class="title">
        <section class="contentWrapper">
            <section class="mainText">
                <h1>
                    LAZER <br> Home
                </h1>
                <h5>
                    Разделите свою уникальность
                </h5>
            </section>

        </section>
    </section>
    </section>



    <section class="services">
        </span><section class="contentWrapper">
            <section class="serviceDescription">
                <img src="https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/quality-icon-01.png">
                <h3>
                    Expert Beauticians
                </h3>
                <p>
                    Beauty Experts dolor sit amet semiadicing elit maecenas sa faubus mollis expo sail and beauty exten interdum.
                </p>
            </section>
            <section class="serviceDescription">
                <img src="https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/quality-icon-02.png">
                <h3>
                    Quality Services
                </h3>
                <p>
                    Hair Styling Services sit amet semiadicing elit maecenas sa faubus mollis expo sail and beauty exten interdum
                </p>
            </section>
            <section class="serviceDescription">
                <img src="https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/quality-icon-03.png">
                <h3>
                    Beauty Products
                </h3>
                <p>
                    Hair color or Product sit amet semiadicing elit maecenas sa faubus mollis expo sail and beauty exten interdum.
                </p>
            </section>
        </section>
    </section>




    <section class="video">
        <section class="contentWrapper">
            <section class="textMain">
                <h2>
                    СОЗДАЙТЕ СВОЙ СОБСТВЕННЫЙ СТИЛЬ
                </h2>
                <p>
                    Hair Salon volutpat ut nisl in hendrerit. Vestibulum ante ipsum astisul primis in faucibus orci luctus et ultrices posuere cubilia Curaemil Etiam porttitor, lacus in luctus molestie, libero justo ullamcorper nulla, sed lacinia and make the beauty much moe essetful and owner erat metus eget diam. Morbi volutpat lectus sit amet diam vestibioas beauty products
                </p>
                <button class="black">
                    <a href="/record" class="iconNothing whiteColor">Записаться</a>
                </button>
            </section>
            <section class="videoImgWrapper">
                <img src="https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Home3-Video.jpg" class="videoImg videoClick">
            </section>
        </section>
    </section>




    <section class="stylistSection">
        <section class="contentWrapper">
            <h2>
                Специалисты
            </h2>
            <ion-icon name="remove-outline" class="line"></ion-icon>
        </section>
        @foreach ($specialists as $specialist)
            <section class="stylistImgWrapper">
                <img src="https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Styler-03.jpg" class="stylistImg">
                <section class="stylistSocialMedia">
                    <h5>{{ $specialist->description }}</h5>
                    {{--<button class="black">
                        --}}{{--<a href="/service/{{$specialist->id}}">подробнее</a>--}}{{--
                    </button>--}}
                </section>
                <section class="stylistText">
                    <h5>
                        {{ $specialist->name }}
                    </h5>
                </section>
            </section>

        @endforeach
        <button class="black">
            <a href="/specialist" class="iconNothing whiteColor">Все Специалисты</a>
        </button>
    </section>
    </section>




    <aside class="couponBig">
        <section class="contentWrapper">
            <h5>
                Colour Day Offer
            </h5>
            <h2>
                -10% On Haircut Color and Make-Up
            </h2>
            <button class="black">
                <ion-icon name="ellipsis-horizontal" class="iconNothing whiteColor"></ion-icon> Book Appointmnet
            </button>
    </aside>




    <section class="lookbook">
        <section class="contentWrapper">
            <section class="text">
                <h2>
                    Наши Услуги
                </h2>
                @foreach ($services as $service)
                <section class="stylistImgWrapper">
                    <img src="https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Styler-03.jpg" class="stylistImg">
                    <section class="stylistSocialMedia">
                        <h5>{{ $service->description }}</h5>
                        <button class="black">
                        <a href="/service/{{$service->id}}">подробнее</a>
                        </button>
                    </section>
                    <section class="stylistText">
                        <h5>
                        {{ $service->name }}
                        </h5>
                        <h5>
                            <p>Цена:{{ $service->price }} рублей</p>
                        </h5>
                    </section>
                </section>

    @endforeach
                <button class="black">
                    <a href="/service" class="iconNothing whiteColor">Все услуги</a>
                </button>
</main>



<footer class="black">
    <section class="aboutUs">
        <h3>
            О нас
        </h3>
        <p>
            Салон красоты "LazerHome".
        </p>
        <section class="socialMedia">
            <ion-icon name="logo-twitter" class="whiteIcon" class="iconBlack"></ion-icon>
            <ion-icon name="logo-facebook" class="whiteIcon" class="iconBlack"></ion-icon>
            <ion-icon name="logo-instagram" class="whiteIcon" class="iconBlack"></ion-icon>
            <ion-icon name="logo-youtube" class="whiteIcon" class="iconBlack"></ion-icon>
        </section>
    </section>
    <section class="contact">
        <h3>
            Контакты
        </h3>
        <span>
          Пн - Вс 9:00 - 20:00
        </span>
        <span>
          (+7) 9915409922
        </span>
        <span>
          Смолина 61, Улан-Удэ
        </span>
        <span>
          info03@mail.com
        </span>
    </section>
    <section class="copyright">
        <span>
          Авторские права 2023 Дизайн Айши от droplettheemes переделан <a href="https://t.me/Buda333" target="_blank">@Buda</a>
      </span>
</footer>
<script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</body>
</html>
<style>
    /*
  ========================================
  Style Reset START
  ========================================
*/
    html, body, div, span, applet, object, iframe,
    h1, h2, h3, h4, h5, h6, p, blockquote, pre,
    a, abbr, acronym, address, big, cite, code,
    del, dfn, em, img, ins, kbd, q, s, samp,
    small, strike, strong, sub, sup, tt, var,
    b, u, i, center,
    dl, dt, dd, ol, ul, li,
    fieldset, form, label, legend,
    table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed,
    figure, figcaption, footer, header, hgroup,
    menu, nav, output, ruby, section, summary,
    time, mark, audio, video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
    }
    article, aside, details, figcaption, figure,
    footer, header, hgroup, menu, nav, section {
        display: block;
    }
    body {
        line-height: 1;
    }
    ol, ul {
        list-style: none;
    }
    blockquote, q {
        quotes: none;
    }
    blockquote:before, blockquote:after,
    q:before, q:after {
        content: '';
        content: none;
    }
    table {
        border-collapse: collapse;
        border-spacing: 0;
    }
    /*
      ========================================
      Style Reset END
      ========================================

      ========================================
      START CSS CODING . . . BEGIN!
      ========================================

      ========================================
      GRID
      ========================================
    */
    *,
    *:before,
    *:after {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    /*
      ========================================
      BASE COLORS & FONTS
      ========================================
    */

    html{
        font-size: 62.5%;
    }

    h1, h2, h3, h4, h5, h6, span, a, li, button, nav, a, li, p, span{
        font-family: 'Cinzel', serif;
        font-size: 1.4rem;
        font-stretch: 100%;
        font-weight: 400;
        line-height: 2em;
        text-transform: uppercase;
        letter-spacing: .2rem;
    }

    button, nav, a, li, p, span{
        font-family: 'Roboto', sans-serif;
    }

    h1{
        font-size: 10rem;
        line-height: 15rem;
        color: white;
    }

    h2{
        font-size: 4.5rem;
        line-height: 7rem;
        font-weight: 400;
    }

    h5{
        font-size: 1.8rem;
    }

    .title h5{
        color: white;
    }

    h3{
        font-size: 1.8rem;
        font-weight: 600;
        text-align: center;
    }

    .callToAction span{
        font-family: 'Cinzel', serif;
        text-transform: uppercase;
    }

    .callToAction .coupon{
        font-size: 2.2rem;
        font-weight: 600;
    }

    p, span{
        text-transform: none;
    }

    ion-icon{
        color: black;
        font-size: 25px;
    }

    .whiteColor{
        color: white;
    }

    .iconBlack{
        color: white;
        border-radius: 50%;
        background: black;
        padding: 10px;
    }

    .iconWhite{
        background: white;
    }

    .black{
        color: white;
    }

    .white .whiteColor{
        color: black;
    }

    /*
      ========================================
      BACKGROUNDS
      ========================================
    */
    .title{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/aeaeaeaeaeae.jpg")  no-repeat center;
        background-size: cover;
    }

    .couponBig{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Promo-Banner-Image.jpg?id=4553") no-repeat center;
        background-size: cover;
    }

    .video{
        background: #f3f4f6;
    }

    .black{
        background: black;
    }

    header, main{
        background: white;
    }

    .imgOne{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Gallery-01.jpg") no-repeat center;
        background-size: cover;
    }

    .imgTwo{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Masonry-02.jpg") no-repeat center;
        background-size: cover;
    }

    .imgThree{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Masonry-01.jpg") no-repeat center;
        background-size: cover;
    }

    .imgFour{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Gallery-04.jpg") no-repeat center;
        background-size: cover;
    }

    .imgFive{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Gallery-02.jpg") no-repeat center;
        background-size: cover;
    }

    .imgSix{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Masonry-03.jpg") no-repeat center;
        background-size: cover;
    }

    .stylistOne{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Styler-01.jpg") no-repeat center;
        background-size: cover;
    }
    .stylistTwo{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Styler-02.jpg") no-repeat center;
        background-size: cover;
    }
    .stylistThree{
        background: url("https://ayesha.dropletthemes.com/wp-content/uploads/2019/08/Styler-03.jpg") no-repeat center;
        backgrond-size: cover;
    }

    .imgSquare, .imgRectangle{
        width:360px;
        height:360px;
        border: 5px solid white;
    }
    .imgRectangle{
        height: 760px;
    }


    /*
      ========================================
      MAIN LAYOUT
      ========================================
    */
    header, .timeSide, .title, .services, .video, .stylistSection, .couponBig, .lookbook, footer{
        padding: 5% 15%;
        margin: 0 auto;
        width: 100%;
        clear: both;
    }

    header, footer{
        padding: 2.5% 5%;
        width: 100%;
    }

    .title{
        padding: 10% 15%;
    }

    span{
        display: block;
    }

    .callToAction{
        width: 300px;
        padding: 40px;
        margin-bottom: 50px;
    }

    button{
        margin: 30px 0;
        padding:10px 20px;
        border: none;
    }

    button ion-icon, .book ion-icon, .threeLines{
        position: relative;
        display: inline-block;
        bottom: -8px;
    }

    .video .textMain{
        float: left;
        width: 50%;
        padding: 2% 3% 2% 0;
    }

    .video p, .videoImgWrapper{
        padding: 5% 0;
    }

    .couponBig{
        width: 80%;
        margin: 0 auto;
        padding:  5%;
    }

    .couponBig .contentWrapper{
        width: 50%;
        text-align: left;
    }

    .video, .lookbook, .services{
        contain: content;
    }

    li, .logo, .book{
        display: inline-block;
        padding-right: 25px;
        float: left;
    }

    .book{
        float: right;
    }

    .videoImg{
        float: right;
        width: 50%;
        padding: 2%;
    }

    .imgColumn{
        float:left;
    }

    .text, nav, .contentWrapper{
        width: 100%;
        text-align: center;
    }

    .title .contentWrapper{
        text-align:left;
    }

    .video .text{
        float: left;
        width: 90%;
    }

    /*
      ========================================
      MINI LAYOUT
      ========================================
    */
    .serviceDescription{
        width: 33.33%;
        min-width: 200px;
        padding: 2% 5%;
        float: left;
        text-align: center;
    }

    .lookbook .allImages{
        padding-left: 7%;
    }
    .stylistSection{
        width: 100%;
        text-align: center;
        contain: content;
    }

    .stylistImg{
        width: 370px;
        height: 480px;
    }

    .stylistImgWrapper{
        float: left;
        height: 600px;
        padding: 1%;
        contain: content;
        text-align: center;
    }

    .stylistSocialMedia{
        width: 90%;
        height: 480px;
        position: relative;
        text-align: center;
        padding: 20% 0 30% 0;
        right: -20px;
        opacity: 0;
        top: -462px;
        transition: opacity 0.1s;
    }

    .stylistText{
        position: relative;
        text-align: center;
        top: -462px;
    }

    .logo, nav, .book{
        position: relative;
        top: -10px;

    }

    ul{
        text-align: center;
        padding-left: 15%;
    }


    .aboutUs, .contact{
        float:left;
        width: 400px;
        text-align: left;
    }

    .contact{
        float: right;
    }

    .copyright{
        clear: both;
        width: 100%;
        padding-top: 2%;
        border-top: 1px solid white;
        text-align: center;
    }
    .allImages, .imgColumn{
        margin: 0 auto;
        text-align: center;
        padding: 0;
        contain: content;
    }
    .imgColumn, .stylistImgWrapper{
        width: 33%;
        float: left;
    }



    /*
    ========================================
    SPECIFIC ITEMS
    ========================================
    */
    .line{
        font-size: 50px;
    }

    ion-icon {
        --ionicon-stroke-width: 40px;
    }

    .threeLines{
        color: white;
        float: right;
        font-size: 30px;
        top: 0px;
    }
    /*
      ========================================
      INTERACTIVE
      ========================================
    */


    a:link, a:visited{
        text-decoration: none;
        color: inherit;
    }

    .stylistSocialMedia:hover{
        opacity: 1;
        background: rgba(0,0,0, .3);
        transform: translateY(-20px);
        transition: 0.5s;
    }

    /*
      ========================================
      MEDIA QUERIES
      ========================================
    */
    @media all and (min-width: 1251px) and (max-width: 3000px){
        .tablet, .mobile{
            display: none;
        }
    }

    @media (max-width: 1350px){
        .imgColumn, .stylistImgWrapper{
            width: 50%;
        }
        .imgColumn:last-child, .stylistImgWrapper:last-child{
            display: none;
        }

        .stylistSocialMedia{
            width: 370px;
            padding: 0 5%;
            height: 480px;
            position: relative;
            text-align: center;
            padding: 60% 0 30% 0;
            opacity: 0;
            right: -30px;
            top: -462px;
            transition: opacity 0.5s;
        }
    }
    @media all and (max-width: 1250px){
        ul, .book, .laptop{
            display: none;
        }
        header{
            background: black;
            color: white;
            padding: 5% 15%;
            margin: 0 auto;
        }
        header ion-icon{
            display: static;
        }
        .imgSix{
            height: 360px;
        }

        .videoImgWrapper, .video .textMain{
            float: none;
            width: 100%;
            text-align: center;
            margin: 0 auto;
            contain: content;
        }

        .videoImgWrapper{
            padding: 0 15%;
        }
        .videoImg{
            width: 500px;
        }
        .stylistImgWrapper{
            width: 100%;
        }
        .stylistSocialMedia{
            width: 370px;
            height: 480px;
            position: relative;
            text-align: center;
            padding: 30% 0 20% 0;
            opacity: 0;
            right: -230px;
            top: -462px;
            transition: opacity 0.5s;
        }
    }
    @media all and (max-width: 1100px){
        .stylistImgWrapper, .stylistImgWrapper:last-child, .imgColumn{
            padding: 0 25%;
        }
        .videoImgWrapper{
            padding: 0 15%;
        }
        .imgColumn{
            padding: 0;
            width: 100%;
        }
        .imgRectangle, .imgSquare{
            height: 360px;
            float: none;
            margin: 0 auto;
        }
        .stylistSocialMedia{
            right:0px;
            padding: 90% 0 30% 0;
        }
    }

</style>
