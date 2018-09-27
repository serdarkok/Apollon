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
    <script src="/js/bxslider.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
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
                                    <img src="/uploads/images/{{ $item->art_image }}" class="img-responsive" />
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
                                <img src="/uploads/images/{{ $item->art_image }}" class="img-responsive" />
                            </a>
                            <span>{{ $item->art_name }}</span>
                            <p>{{ $item->art_abstract }}</p>
                            <div class="arrow-next"><img src="/images/arrow-next.png" /></div>
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
                                <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
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
                                        <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="blog-contaier">
                                    <a href="/page/blog/ileri-yaslarda-mutlu-bir-yasamin-sirlari-10">
                                        <img src="/uploads/images/10_3866378.jpg" class="img-responsive mar-b" />
                                        <div class="blog-desc font-12">İleri yaşlarda mutlu birliktelikler</div>
                                        <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="blog-contaier">
                                    <img src="/images/s4.jpg" class="img-responsive mar-b" />
                                    <div class="blog-desc font-12">Unutkanlık aşılabilir bir durum...</div>
                                    <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="blog-contaier">
                                    <a href="/page/blog/turkiyenin-mutluluk-grafigi-11">
                                        <img src="/uploads/images/11_9060118.jpg" class="img-responsive mar-b" />
                                        <div class="blog-desc font-12">Türkiye'nin mutluluk grafiği...</div>
                                        <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 line-flat">
                <h3>DİĞER BİLGİLER</h3>
                <div class="row">
                    <div class="col-md-4"><img src="/images/subelerimiz-footer.png" class="img-responsive"></div>
                    <div class="col-md-4"><img src="/images/sizden-gelenler-footer.png" class="img-responsive"></div>
                    <div class="col-md-4"><img src="/images/basinda-doga-footer.png" class="img-responsive"></div>
                </div>
            </div>
@endsection
