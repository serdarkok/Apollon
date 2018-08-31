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
    <section>
        <div class="container slider-top">
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="slider">
                    @foreach($slider as $item)
                        <div>
                            @if($item->art_image)
                                <a href="">
                            @endif
                                <img src="/uploads/images/{{ $item->art_image }}" class="img-responsive" />
                                <div class="slider-desc">
                                    {{ $item->art_name }}
                                </div>
                            @if($item->art_image)
                                </a>
                            @endif
                        </div>
                    @endforeach
                    <div>
                        <a href=""><img src="/images/slider/1.jpg" class="img-responsive" />
                            <div class="slider-desc">
                                İleri yaşlarda mutlu bir yaşamın sırları...
                            </div>
                        </a>
                    </div>
                    <div><img src="/images/slider/2.jpg" class="img-responsive" />
                        <div class="slider-desc">
                            Demans nedir, nasıl başa çıkılır?
                        </div>
                    </div>
                    <div><img src="/images/slider/3.jpg" class="img-responsive" />
                        <div class="slider-desc">
                            Tam 60 yıllık mutlu evlilik...
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sağ Kısım -->
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="right-square">
                    <div style="position:relative; height: 27px;">
                        <div class="social-button">
                            <a href=""><img src="/images/social/facebook.png" /></a>
                            <a href=""><img src="/images/social/twitter.png" /></a>
                            <a href=""><img src="/images/social/instagram.png" /></a>
                            <a href=""><img src="/images/social/youtube.png" /></a>
                        </div>
                    </div>
                    <hr />
                    <img src="/images/bilgi-1.png" class="img-responsive center-block" />
                    <div class="send-number">
                        <h4>Telefonunuzu gönderin sizi arayalım...</h4>
                        <form method="post" action="#">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="İsim Soyisim">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telefon">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm btn-block">Gönder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
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
