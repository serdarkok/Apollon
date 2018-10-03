<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {!! SEO::generate() !!}
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    @yield('header')
    <script src="/js/site.js"></script>
    <link href="/css/fonts.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/pushy.css">
    <link href="/css/text.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124180368-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-124180368-2');
    </script>
</head>
<body>
@include('flash::message')
<nav class="pushy pushy-left" data-focus="#first-link">
    <div class="pushy-content">
        <ul>
            <li class="pushy-link">
                <a href="/">ANA SAYFA</a>
            </li>
            <li class="pushy-submenu">
                <button>DOĞA HAKKINDA</button>
                <ul>
                    <li class="pushy-link"><a href="/page/doga/hakkimizda-20">Hakkımızda</a></li>
                    <li class="pushy-link"><a href="/page/doga/felsefe-ve-ilkelerimiz-21">Felsefe ve İlkelerimiz</a></li>
                    <li class="pushy-link"><a href="/page/doga/misyonumuz-ve-vizyonumuz-22">Misyonumuz ve Vizyonumuz</a></li>
                    <li class="pushy-link"><a href="/insan-kaynaklari">İş Başvurusu</a></li>
{{--                    <li class="pushy-link"><a href="/page/doga/cozum-ortaklarimiz">Çözüm Ortaklarımız</a></li>
                    <li class="pushy-link"><a href="/page/doga/sizden-gelenler">Sizden Gelenler</a></li>
                    <li class="pushy-link"><a href="/page/doga/basinda-doga">Basında DOĞA</a></li>--}}
                </ul>
            </li>
            <li class="pushy-link">
                <a href="/page/doga/doganin-farki-23">DOĞA'NIN FARKI</a>
            </li>
            <li class="pushy-submenu">
                <button>HİZMETLERİMİZ</button>
                <ul>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/alzheimer-hastalarina-bakim-evi-33">Alzheimer Hastalarına Bakımevi</a></li>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/yasli-bakim-hizmetleri-12">Yaşlı Bakım Hizmetleri</a></li>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/yogun-bakim-sonrasi-hasta-bakimi-13">Yoğun Bakım Sonrası Hasta Bakımı</a></li>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/yasli-saglik-hizmetleri-14">Yaşlı Sağlık Hizmetleri</a></li>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/yasli-medikal-hizmetleri-15">Yaşlı Medikal Hizmetleri</a></li>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/yaslilar-icin-doktor-hizmetleri-16">Yaşlılar İçin Doktor Hizmetleri</a></li>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/yaslilar-icin-hemsirelik-hizmetleri-17">Yaşlılar İçin Hemşirelik Hizmetleri</a></li>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/yaslilar-icin-refakat-hizmetleri-18">Yaşlılar İçin Refakat Hizmetleri</a></li>
                    <li class="pushy-link"><a href="/page/hizmetlerimiz/yaslilar-icin-klinik-beslenme-19">Klinik Beslenme</a></li>
                </ul>
            </li>
            <li class="pushy-submenu">
                <button>ŞUBELERİMİZ</button>
                <ul>
                    <li class="pushy-link"><a href="/page/subelerimiz/sancaktepe-yasli-bakim-merkezi-24">Sancaktepe Yaşlı Bakım Merkezi</a></li>
                    <li class="pushy-link"><a href="/page/subelerimiz/kiziltoprak-klinik-evi-25">Kızıltoprak Klinik Evi</a></li>
                    <li class="pushy-link"><a href="/page/subelerimiz/dragos-hatice-satoglu-yasam-evi-26">Dragos Hatice Satoğlu Yaşam Evi</a>
                </ul>
            </li>
            <li class="pushy-link"><a href="/page/doga/under-construction">GALERİ</a></li>
            <li class="pushy-link"><a href="/page/doga/huzurevi-iletisim-29">İLETİŞİM</a></li>
        </ul>
    </div>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>

<div class="container">
        <div class="col-md-3 col-md-offset-9 col-xs-6 col-xs-offset-3">
            <div class="right-square">
                <a href="/page/doga/7-24-canli-izle-27" target="_blank"><img src="/images/724canli.png" class="img-responsive" style="padding: 5px 10px 5px 10px;" /></a>
            </div>
        </div>
</div>

<div class="container-fluid menu-head">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <a href="/"><img src="/images/logo.png" class="img-responsive logo" style="position: absolute;" /></a>
            </div>
            <div class="col-md-9 col-xs-6 text-right">
                <button class="btn btn-primary-outline menu-btn visible-xs"><i class="fa fa-bars fa-2x"></i> </button>
                <!-- Menü -->
                <div id="fdw">
                    <!--nav-->
                    <nav class="hidden-xs">
                        <ul>
                            <li><a href="/"><i class="fa fa-home"></i> </a>
                            </li>
                            <li><a href="#">DOĞA HAKKINDA</a>
                                <ul style="display: none;" class="sub_menu text-left">
                                    <li class="arrow_top"></li>
                                    <li><a href="/page/doga/hakkimizda-20">Hakkımızda</a></li>
                                    <li><a href="/page/doga/felsefe-ve-ilkelerimiz-21">Felsefe ve İlkelerimiz</a></li>
                                    <li><a href="/page/doga/misyonumuz-ve-vizyonumuz-22">Misyonumuz ve Vizyonumuz</a></li>
                                    <li><a href="/insan-kaynaklari">İş Başvurusu</a></li>
{{--                                    <li><a href="/page/doga/cozum-ortaklarimiz">Çözüm Ortaklarımız</a></li>
                                    <li><a href="/page/doga/sizden-gelenler">Sizden Gelenler</a></li>
                                    <li><a href="/page/doga/basinda-doga">Basında DOĞA</a></li>--}}
                                </ul>
                            </li>
                            <li><a href="/page/doga/doganin-farki-23">DOĞA'NIN FARKI</a></li>
                            <li>
                                <a href="#">HİZMETLERİMİZ</a>
                                <ul style="display: none;" class="sub_menu text-left">
                                    <li class="arrow_top"></li>
                                    <li><a href="/page/hizmetlerimiz/alzheimer-hastalarina-bakim-evi-33">Alzheimer Hastalarına Bakımevi</a></li>
                                    <li><a href="/page/hizmetlerimiz/yasli-bakim-hizmetleri-12">Yaşlı Bakım Hizmetleri</a></li>
                                    <li><a href="/page/hizmetlerimiz/yogun-bakim-sonrasi-hasta-bakimi-13">Yoğun Bakım Sonrası Hasta Bakımı</a></li>
                                    <li><a href="/page/hizmetlerimiz/yasli-saglik-hizmetleri-14">Yaşlı Sağlık Hizmetleri</a></li>
                                    <li><a href="/page/hizmetlerimiz/yasli-medikal-hizmetleri-15">Yaşlı Medikal Hizmetleri</a></li>
                                    <li><a href="/page/hizmetlerimiz/yaslilar-icin-doktor-hizmetleri-16">Yaşlılar İçin Doktor Hizmetleri</a></li>
                                    <li><a href="/page/hizmetlerimiz/yaslilar-icin-hemsirelik-hizmetleri-17">Yaşlılar İçin Hemşirelik Hizmetleri</a></li>
                                    <li><a href="/page/hizmetlerimiz/yaslilar-icin-refakat-hizmetleri-18">Yaşlılar İçin Refakat Hizmetleri</a></li>
                                    <li><a href="/page/hizmetlerimiz/yaslilar-icin-klinik-beslenme-19">Klinik Beslenme</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">ŞUBELERİMİZ</a>
                                <ul style="display: none;" class="sub_menu text-left">
                                    <li class="arrow_top"></li>
                                    <li><a href="/page/subelerimiz/sancaktepe-yasli-bakim-merkezi-24">Sancaktepe Yaşlı Bakım Merkezi</a></li>
                                    <li><a href="/page/subelerimiz/kiziltoprak-klinik-evi-25">Kızıltoprak Klinik Evi</a></li>
                                    <li><a href="/page/subelerimiz/dragos-hatice-satoglu-yasam-evi-26">Dragos Hatice Satoğlu Yaşam Evi</a>
                                </ul>
                            </li>
                            <li><a href="/page/doga/under-construction">GALERİ</a></li>
                            <li><a href="/page/doga/huzurevi-iletisim-29">İLETİŞİM</a></li>
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
            mode: 'horizontal',
            adaptiveHeight: false,
            controls: true,
            preventDefaultSwipeY: true
        });

        $('#flash-overlay-modal').modal();

        $('#carousel').bxSlider({
            slideMargin: 5,
            auto: true,
            breaks: [{screen:0, maxslides:2, pager:false, controls:true},{screen:460, maxslides:1},{screen:768, maxslides:3},{screen:300, maxslides:1}],
            keyboardEnabled: true,
            preventDefaultSwipeY: true,
            nextSelector: '#right-hizmet',
            prevSelector: '#left-hizmet',
            oneToOneTouch: false,
            prevText: '<img src="/images/sol.png" />',
            nextText: '<img src="/images/sag.png" />',
            pager: false
        });
    });

    var popupSize = {
        width: 780,
        height: 550
    };

    $(document).on('click', '.social-buttons > a', function(e){

        var
            verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
            horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

        var popup = window.open($(this).prop('href'), 'social',
            'width='+popupSize.width+',height='+popupSize.height+
            ',left='+verticalPos+',top='+horisontalPos+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            e.preventDefault();
        }

    });
</script>
<script src="/js/app.js"></script>
</body>
</html>