<?php
/**
 * Created by PhpStorm.
 * User: serdarkok
 * Date: 23/07/2018
 * Time: 23:49
 */
?>
<div class="col-md-3">
        <div class="right-square slider-top hidden-xs" style="margin-bottom: 10px;">
            <div style="position:relative; height: 27px;">
                <div class="social-button">
                    <a href=""><img src="/images/social/facebook.png" /></a>
                    <a href=""><img src="/images/social/twitter.png" /></a>
                    <a href=""><img src="/images/social/instagram.png" /></a>
                    <a href=""><img src="/images/social/youtube.png" /></a>
                </div>
            </div>
            <hr />
            <a href="tel:02166213333"><img src="/images/bilgi-1.png" class="img-responsive center-block bilgi-icin" /></a>
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

    <a href="/ulasim-formu"><img src="/images/ulasim-formu.png" class="img-responsive" /></a>

    <div class="main-box">
        <div class="head-box">FOTOĞRAFLAR İLE BİZ</div>
        <div class="body-box">
            <img src="/images/foto-1.png" class="img-responsive" />
        </div>
    </div>

    <div class="main-box">
        <div class="head-box">ANLAŞMALI KURUMLAR</div>
        <div class="body-box">
            <img src="/images/anlasmali-kurumlar.png" class="img-responsive" />
        </div>
    </div>

{{--    <div class="main-box">
        <div class="head-box">İSTATİSTİKLER</div>
        <ul>
            <li>Bugün  ziyaret edenler: {{ $post->getViewsUpto(\Carbon\Carbon::create(2016)) }}</li>
        </ul>
    </div>--}}

    <div class="main-box">
        <div class="head-box">FAYDALI LİNKLER</div>
        <div class="body-box">
            <ul class="links">
                <li><a href="https://www.saglik.gov.tr" target="_blank">Sağlık Bakanlığı</a></li>
                <li><a href="https://istanbul.aile.gov.tr/" target="_blank">İstanbul Aile ve Sosyal Politikalar İl Müdürlüğü</a></li>
                <li> <a href="https://www.aile.gov.tr/" target="_blank">Aile ve Sosyal Politikalar Bakanlığı</a></li>
                <li><a href="https://www.hastane.com.tr/istanbul-hastaneleri.html" target="_blank">İstanbul Hastaneleri</a></li>
                <li><a href="https://apps.istanbulsaglik.gov.tr/Eczane" target="_blank">Nöbetçi Eczaneler</a></li>
            </ul>
        </div>
    </div>
</div>

