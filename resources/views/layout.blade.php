<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="/js/bxslider.js"></script>
    <script src="/js/site.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/pushy.css">
    <link href="/css/text.css" rel="stylesheet">
    <title>Doğa Huzurevi ve Bakımevi - İstanbul</title>
</head>
<body>

<nav class="pushy pushy-left" data-focus="#first-link">
    <div class="pushy-content">
        <ul>
            <li class="pushy-link">
                <a href="#">ANA SAYFA</a>
            </li>
            <li class="pushy-link">
                <a href="#">DOĞA HAKKINDA</a>
            </li>
            <li class="pushy-link">
                <a href="#">DOĞA'NIN FARKI</a>
            </li>
            <li class="pushy-submenu">
                <button>HİZMETLERİMİZ</button>
                <ul>
                    <li class="pushy-link"><a href="#">Yaşlı Bakım Hizmetleri</a></li>
                    <li class="pushy-link"><a href="#">Yoğun Bakım Sonrası Hasta Bakımı</a></li>
                    <li class="pushy-link"><a href="#">Yaşlı Sağlık Hizmetleri</a></li>
                    <li class="pushy-link"><a href="#">Yaşlı Medikal Hizmetleri</a></li>
                    <li class="pushy-link"><a href="#">Yaşlı Doktor Hizmetleri</a></li>
                    <li class="pushy-link"><a href="#">Yaşlı Hemşirelik Hizmetleri</a></li>
                    <li class="pushy-link"><a href="#">Yaşlı Refakat Hizmetleri</a></li>
                    <li class="pushy-link"><a href="#">Klinik Beslenme</a></li>

                </ul>
            </li>
            <li class="pushy-submenu">
                <button>ŞUBELERİMİZ</button>
                <ul>
                    <li class="pushy-link"><a href="#">Sancaktepe Yaşlı Bakım Merkezi</a></li>
                    <li class="pushy-link"><a href="#">Kızıltoprak Klinik Evi</a></li>
                    <li class="pushy-link"><a href="#">Dragos Hatice Satoğlu Yaşam Evi</a></li>
                </ul>
            </li>
            <li class="pushy-link"><a href="#">GALERİ</a></li>
            <li class="pushy-link"><a href="#">İLETİŞİM</a></li>
        </ul>
    </div>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>

<div class="container">
        <div class="col-md-3 col-md-offset-9 col-xs-6 col-xs-offset-3">
            <div class="right-square">
                <img src="/images/724canli.png" class="img-responsive" style="padding: 5px 10px 5px 10px;" />
            </div>
        </div>
</div>

<div class="container-fluid menu-head">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <img src="/images/logo.png" class="img-responsive logo" style="position: absolute;" />
            </div>
            <div class="col-md-9 col-xs-6">
                <button class="menu-btn visible-xs"><i class="fa fa-bars fa-2x"></i> </button>
                <!-- Menü -->
                <div id="fdw">
                    <!--nav-->
                    <nav class="hidden-xs">
                        <ul>
                            <li><a href="/">ANA SAYFA</a>
                            </li>
                            <li><a href="#">DOĞA HAKKINDA</a></li>
                            <li><a href="#">DOĞA'NIN FARKI</a></li>
                            <li>
                                <a href="#">HİZMETLERİMİZ</a>
                                <ul style="display: none;" class="sub_menu">
                                    <li class="arrow_top"></li>
                                    <li><a href="#">Yaşlı Bakım Hizmetleri</a></li>
                                    <li><a href="#">Yoğun Bakım Sonrası Hasta Bakımı</a></li>
                                    <li><a href="#">Yaşlı Sağlık Hizmetleri</a></li>
                                    <li><a href="#">Yaşlı Medikal Hizmetleri</a></li>
                                    <li><a href="#">Yaşlı Doktor Hizmetleri</a></li>
                                    <li><a href="#">Yaşlı Hemşirelik Hizmetleri</a></li>
                                    <li><a href="#">Yaşlı Refakat Hizmetleri</a></li>
                                    <li><a href="#">Klinik Beslenme</a></li>
                                    <li><a href="#">7/24 Canlı Yayın</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://www.freshdesignweb.com">ŞUBELERİMİZ</a>
                                <ul style="display: none;" class="sub_menu">
                                    <li class="arrow_top"></li>
                                    <li><a href="#">Sancaktepe Yaşlı Bakım Merkezi</a></li>
                                    <li><a href="#">Kızıltoprak Klinik Evi</a></li>
                                    <li><a href="#">Dragos Hatice Satoğlu Yaşam Evi</a>
                                </ul>
                            </li>
                            <li><a href="http://www.freshdesignweb.com">GALERİ</a></li>
                            <li><a href="http://www.freshdesignweb.com">İLETİŞİM</a></li>
                        </ul>
                    </nav>
                </div>
                <!-- end fdw -->
            </div>
        </div>
    </div>
</div>

@yield('slider')

<section>
    <div class="container">
        <div class="col-md-9">
            <div class="row">
                @yield('content')
            </div>
        </div>
        @include('rightbar')
    </div>
</section>

<section>
    <div class="container-fluid" style="background-color: #222222; height: 150px;">
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <ul class="footer-menu">
                        <li>ANA SAYFA</li>
                        <li>DOĞA HAKKINDA</li>
                        <li>DOĞA'NIN FARKI</li>
                        <li>ŞUBELERİMİZ</li>
                        <li>İLETİŞİM</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    <script src="/js/pushy.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.slider').bxSlider({
            auto: true,
            adaptiveHeight: false
        });

        $('#carousel').bxSlider({
            slideMargin: 5,
            autoReload: true,
            auto: true,
            breaks: [{screen:0, slides:2, pager:false, controls:true},{screen:460, slides:2},{screen:768, slides:3},{screen:300, slides:1}],
            keyboardEnabled: true,
            nextSelector: '#right-hizmet',
            prevSelector: '#left-hizmet',
            prevText: '<img src="/images/sol.png" />',
            nextText: '<img src="/images/sag.png" />',
            pager: false
        });
    });
</script>
</body>
</html>