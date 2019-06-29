<?php
/**
 * Created by PhpStorm.
 * User: serdarkok
 * Date: 23/07/2018
 * Time: 23:40
 */
?>
@extends('layout')

@section('header')
    <script src="/js/bxslider.min.js"></script>
    <link rel="stylesheet" href="/css/bxslider.css">
@endsection

@section('slider')

@endsection

@section('content')
            <div class="col-md-12 slider-top" style="margin-bottom: 10px;">
                <div class="slider">
                    @foreach($slider as $item)
                        <div>
                            @if($item->slider_link)
                                <a href="/page/{{$item->cat_id}}/{{ $item->slider_link }}-{{ $item->art_id }}">
                                    @endif
                                    <img src="/uploads/images/{{ $item->art_image }}" class="img-responsive" alt="{{ $item->art_name }}" />
                                    <div class="slider-desc">
                                        {{ $item->art_name }}
                                    </div>
                                    @if($item->slider_link)
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-12">
                <div class="right-square slider-top visible-xs" style="margin-bottom: 10px;">
                    <div style="position:relative; height: 27px;">
                        <div class="social-button">
                            <a href=""><img src="/images/social/facebook.png" alt="facebook icon" /></a>
                            <a href=""><img src="/images/social/twitter.png" alt="twitter icon" /></a>
                            <a href=""><img src="/images/social/instagram.png" alt="instagram icon" /></a>
                            <a href=""><img src="/images/social/youtube.png" alt="youtube icon" /></a>
                        </div>
                    </div>
                    <hr />
                    <a href="tel:02166213333"><img src="/images/bilgi-1.png" class="img-responsive center-block bilgi-icin" alt="bilgi için telefon"/></a>
                    <div class="send-number">
                        <h4>Telefonunuzu gönderin sizi arayalım...</h4>
                        <form method="post" action="/">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" placeholder="İsim Soyisim" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="phone" placeholder="Telefon" name="phone">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm btn-block">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mar-b">
                <div class="home-wrap">
                    <h1><sup><i class="fa fa-quote-left"></i></sup> Huzurevi ve Bakımevi</h1>
                    <h2>Alanında uzmanlaşmış, güleryüzlü çalışanlarımız ile misafirlerimize ev konforu yaşatmaktan mutluluk duyuyoruz.</h2>
                </div>
            </div>

            <div class="col-md-12 line-flat">
                <h3>HİZMETLERİMİZ</h3>
                <div class="sol-sag">
                    <span id="left-hizmet"></span>
                    <span id="right-hizmet"></span>
                </div>
                <ul id="carousel" class="carousel">
                    @foreach($hizmetler as $item)
                        <li>
                            <a href="/page/hizmetlerimiz/{{$item->art_slug}}-{{ $item->art_id }}" target="_blank">
                                <img src="/uploads/images/{{ $item->art_image }}" class="img-responsive" alt="{{ $item->art_name }}" />
                            </a>
                            <span>{{ $item->art_name }}</span>
                            <p>{{ $item->art_abstract }}</p>
                            <div class="arrow-next"><img src="/images/arrow-next.png" alt="arrow" /></div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-12 line-flat">
                <h3>BLOG YAZILAR</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="blog-contaier">
                            <a href="/page/blog/huzurevi-ve-bakimevi-fiyatlari-31">
                                <img src="/uploads/images/31_7070745.jpg" class="img-responsive" />
                                <div class="blog-desc">Huzurevi ve Bakımevi fiyatları nelerdir?</div>
                                <div class="arrow-next"><img src="/images/arrow-next-white.png" alt="arrow white"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="blog-contaier">
                                    <a href="/page/blog/saglikli-beslenmek-alzheimeri-engelliyor-mu-28">
                                        <img src="/uploads/images/28_6342334.jpg" class="img-responsive mar-b" />
                                        <div class="blog-desc font-12">Sağlıklı beslenmek Alzaymır (Alzheimer)'ı engelliyor mu?</div>
                                        <div class="arrow-next"><img src="/images/arrow-next-white.png" alt="arrow white">></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="blog-contaier">
                                    <a href="/page/blog/ileri-yaslarda-mutlu-bir-yasamin-sirlari-10">
                                        <img src="/uploads/images/10_3866378.jpg" class="img-responsive mar-b" />
                                        <div class="blog-desc font-12">İleri yaşlarda mutlu birliktelikler</div>
                                        <div class="arrow-next"><img src="/images/arrow-next-white.png" alt="arrow white">></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="blog-contaier">
                                    <a href="/page/blog/parkinson-nedir-32">
                                        <img src="/uploads/images/32_9361019.jpg" class="img-responsive mar-b" />
                                        <div class="blog-desc font-12">Parkison nedir ve tedavileri nelerdir...</div>
                                        <div class="arrow-next"><img src="/images/arrow-next-white.png" alt="arrow white">></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="blog-contaier">
                                    <a href="/page/blog/turkiyenin-mutluluk-grafigi-11">
                                        <img src="/uploads/images/11_9060118.jpg" class="img-responsive mar-b" />
                                        <div class="blog-desc font-12">Türkiye'nin mutluluk grafiği...</div>
                                        <div class="arrow-next"><img src="/images/arrow-next-white.png" alt="arrow white">></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 line-flat hidden-xs">
                <h3>DİĞER BİLGİLER</h3>
                <div class="row">
                    <div class="col-md-4"><a href="/page/subelerimiz" target="_blank"><img src="/images/subelerimiz-footer.png" class="img-responsive" /></a></div>
                    <div class="col-md-4"><img src="/images/sizden-gelenler-footer.png" class="img-responsive" alt="sizden gelenler"></div>
                    <div class="col-md-4"><img src="/images/basinda-doga-footer.png" class="img-responsive" alt="basında doğa huzurevi"></div>
                </div>
            </div>

            @if (Carbon\Carbon::now()->gte(Carbon\Carbon::parse("2019-03-06 20:00:00")) && Carbon\Carbon::now()->lte(Carbon\Carbon::parse("2030-03-09 01:00:00")) )
                <div class="modal fade" tabindex="-1" role="dialog" id="info" aria-labelledby="gridSystemModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Kapat"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 award-text">
                                        <img src="/images/popup/sancaktepe-kampanya.png" class="img-responsive center-block" alt="sancaktepe huzurevi kampanya" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script language="JavaScript">
                    $(document).ready(function() {
                        $('#info').modal('show');
                    });
                </script>
            @endif
@endsection
