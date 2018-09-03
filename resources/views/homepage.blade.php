<?php
/**
 * Created by PhpStorm.
 * User: serdarkok
 * Date: 23/07/2018
 * Time: 23:40
 */
?>
@extends('layout')

@section('slider')

@endsection

@section('content')
            <div class="col-md-12 slider-top" style="margin-bottom: 10px;">
                <div class="slider">
                    @foreach($slider as $item)
                        <div>
                            @if($item->slider_link)
                                <a href="{{ $item->slider_link }}">
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
                    <li>
                        <img src="/images/s1.jpg" class="img-responsive" />
                        <span>Yaşlı Bakım Hizmetleri</span>
                        <p>Yaşlı bakımı tecrübe ve özen gerektiren bir alandır. Bu sebeple ekibimizi titizlikle seçeriz. Bakıcı kadromuzdaki, tamamı tecrübeli ve yaşlı…</p>
                        <div class="arrow-next"><img src="/images/arrow-next.png" /></div>
                    </li>
                    <li>
                        <img src="/images/s2.jpg" class="img-responsive" />
                        <span>Yoğun Bakım Sonrası Hasta Bakımı</span>
                        <p>Yoğun bakım tedavisi; hastalarda bir ya da birden fazla vücut organının çalışmaması ya da yetersizliği nedeniyle hasta takibini…</p>
                        <div class="arrow-next"><img src="/images/arrow-next.png" /></div>
                    </li>
                    <li>
                        <img src="/images/s3.jpg" class="img-responsive" />
                        <span>Yaşlı Sağlık Hizmetleri</span>
                        <p>Sağlığınız bizim için önemlidir. Doğa Klinik ve Yaşam evleri ile Doğa Evde Bakım Hizmetlerinde Sağlık Hizmetleri birinci sırada yer alır...</p>
                        <div class="arrow-next"><img src="/images/arrow-next.png" /></div>
                    </li>
                    <li>
                        <img src="/images/s4.jpg" class="img-responsive" />
                        <span>Klinik Beslenme</span>
                        <p>Yaşlı bakımı tecrübe ve özen gerektiren bir alandır. Bu sebeple ekibimizi titizlikle seçeriz. Bakıcı kadromuzdaki, tamamı tecrübeli ve yaşlı…</p>
                        <div class="arrow-next"><img src="/images/arrow-next.png" /></div>
                    </li>
                </ul>
            </div>

            <div class="col-md-12 line-flat">
                <h3>BLOG YAZILAR</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="blog-contaier">
                            <img src="/images/s1.jpg" class="img-responsive" />
                            <div class="blog-desc">Sağlıklı beslenmek Alzaymır (Alzheimer)'ı engelliyor mu?</div>
                            <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="blog-contaier">
                                    <img src="/images/s2.jpg" class="img-responsive mar-b" />
                                    <div class="blog-desc font-12">Teknoloji sadece gençler için mi?</div>
                                    <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-contaier">
                                    <img src="/images/s3.jpg" class="img-responsive mar-b" />
                                    <div class="blog-desc font-12">İleri yaşlarda mutlu birliktelikler</div>
                                    <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-contaier">
                                    <img src="/images/s4.jpg" class="img-responsive mar-b" />
                                    <div class="blog-desc font-12">Unutkanlık aşılabilir bir durum...</div>
                                    <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="blog-contaier">
                                    <img src="/images/s2.jpg" class="img-responsive mar-b" />
                                    <div class="blog-desc font-12">Türkiye'nin mutluluk grafiği...</div>
                                    <div class="arrow-next"><img src="/images/arrow-next-white.png"></div>
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
