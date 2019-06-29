<?php

namespace App\Http\Controllers;

use App\Article;
use App\Articles_con;
use App\Categories_con;
use App\Mail\bizeulasin;
use App\Mail\insankaynaklari;
use App\Mail\telefonugonder;
use App\Post;
use App\Slider;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class layoutController extends Controller
{

    public function getBookStoreJson() {
        return response()->json(
            [
                [
                    'id'    => '1',
                    'name'  => 'Geleneksel ve Tamamlayıcı Tıp Dergisi',
                    'cover' => 'https://turkiyeklinikleri.com/upload/cover/journals/geleneksel_ve_tamamlayici_tip.png',
                    'page'  => '235',
                    'authors' => 'Adam Smith, Taylor Otwell'
                ],
                [
                    'id'    => '2',
                    'name'  => 'Journal of Clinical Obstetrics & Gynecology',
                    'cover' => 'https://turkiyeklinikleri.com/upload/cover/journals/jcog.png',
                    'page'  => '421',
                    'authors' => 'Adam Smith, Taylor Otwell'
                ],
                [
                    'id'    => '3',
                    'name'  => 'Journal of Reconstructive Urology',
                    'cover' => 'https://turkiyeklinikleri.com/upload/cover/journals/jreconstructive_urology.png',
                    'page'  => '188',
                    'authors' => 'Adam Smith, Taylor Otwell'
                ],
                [
                    'id'    => '4',
                    'name'  => 'Literatür Eczacılık Bilimleri Dergisi',
                    'cover' => 'https://turkiyeklinikleri.com/upload/cover/journals/literatur_eczacilik_bilimleri.png',
                    'page'  => '574',
                    'authors' => 'İlkay Aydın'
                ],
                [
                    'id'    => '5',
                    'name'  => 'The World Clinics Journal of Medical Sciences',
                    'cover' => 'https://turkiyeklinikleri.com/upload/cover/journals/the_world_clinics.png',
                    'page'  => '235',
                    'authors' => 'Adam Smith, Taylor Otwell'
                ],
                [
                    'id'    => '6',
                    'name'  => 'Acil Tıp - Özel Konular',
                    'cover' => 'https://turkiyeklinikleri.com/upload/cover/journals/acil_tip_ozel.png',
                    'page'  => '362',
                    'authors' => 'Clive Gifford'
                ],
                [
                    'id'    => '7',
                    'name'  => 'Ağız Diş ve Çene Cerrahisi - Özel Konular',
                    'cover' => 'https://turkiyeklinikleri.com/upload/cover/journals/agiz_dis_cene_cerrahisi_ozel.png',
                    'page'  => '652',
                    'authors' => 'U. Uraz Aydın'
                ]
            ]
        );
    }

    public function getHomePage(Post $post) {
        // $post->addView();

        // Slider tablosunda slider olan yazıların art_id'lerini aldık. Burada tarih sorgusu da kullanık
        $__ = Slider::select('art_id')->whereDate(DB::raw("COALESCE(slider_end_date, '9999-12-31 00:00:00')"), ">", Carbon::now())->orderBy('slider_order', 'ASC')->get();
        $_ = [];

        // Gelen sorgudaki art_id'leri array'e aktardık.
        foreach ($__ as $item){
            $_[] += $item->art_id;
        }
        // Sıralama yapabilmek için arraylari virgül ile ayırdık.
        $ids_ordered = implode(',', $_);

        $_ = Articles_con::whereIn('art_id', $_)->orderByRaw(DB::raw("FIELD(art_id, $ids_ordered)"))->get();

        // return $_;
        // return $_;

        foreach ($_ as $item) {
            $__ = Slider::where('art_id', '=', $item->art_id)->first();
            $item['slider_link'] = $__->slider_link;
            $___ = Article::where('id', $item->art_id)->first();
            $_category_name = Categories_con::select('category_slug')->where('cat_id', $___->cat_id)->first();
            $item['cat_id'] = $_category_name->category_slug;
        }

        $__ = Article::select('id')->where('cat_id', '2')->get();

        $__ = Articles_con::whereIn('art_id', $__)->get();

        // return $__;
        // return $_;

        return view('homepage', ['slider' => $_, 'hizmetler' => $__, 'post' => $post]);
    }

    public function getTags($tag) {
        $tag = str_replace('-', ' ', $tag);
        SEOMeta::setTitle($tag . ' Arama Sonuçları');
        SEOMeta::setDescription($tag . ' Arama sonuçlarını içermektedir');
        OpenGraph::setTitle($tag . ' Arama Sonuçları');
        OpenGraph::setDescription($tag . ' Arama sonuçlarını içermektedir');
        OpenGraph::setUrl(\URL::full());

        $_ = Articles_con::where('art_keywords', 'like', '%'.$tag.'%')->get();

        foreach ($_ as $item) {
            $____ = Article::select('cat_id')->where('id','=',$item->art_id)->first();
            // ,return $____;
            $___ = Categories_con::select('category_slug')->where('cat_id', '=', $____->cat_id)->first();
            // return $___;
            $item['cat_name'] = $___->category_slug;
        }

        return view('tags', ['tags' => $_, 'arama' => $tag]);
    }

    public function getArticle($category, $article) {
        // $post->addView();
        // $data'dan gelen verideki son ID'yi alır.
        preg_match('/(\d+)\D*$/', $article ,$veri);

        if ($veri){
            $__ = Article::select('id', 'cat_id')->where('status', '=', '1')->inRandomOrder()->limit(4)->get();

            foreach ($__ as $item)
            {
                $_ = Articles_con::select('art_id', 'art_name', 'art_slug', 'art_image')->where('art_id', '=', $item->id)->first();
                $item['art_id'] = $_->art_id;
                $item['art_name'] = $_->art_name;
                $item['art_slug'] = $_->art_slug;
                $item['art_image'] = $_->art_image;
                $___ = Categories_con::select('category_slug')->where('cat_id', $item->cat_id)->first();
                $item['cat_name'] = $___->category_slug;
            }

            $a = Article::where('id','=', $veri[0])->first();
            $a = Categories_con::select('category_name', 'category_slug')->where('cat_id', '=', $a->cat_id)->first();

            $_ = Articles_con::where('art_id', $veri[0])->first();

            $_['category_slug'] = $a->category_slug;
            $_['category_name'] = $a->category_name;

            $___  = str_replace(' ', '-', $_->art_keywords);
            $keyword = explode(',', $___);

            SEOMeta::setTitle($_->art_name);
            SEOMeta::setDescription($_->art_description);
            SEOMeta::addKeyword([$_->art_keywords]);
            OpenGraph::setTitle($_->art_name);
            OpenGraph::addImage(url('/').'/uploads/images/'.$_->art_image);
            OpenGraph::setDescription($_->art_description);
            OpenGraph::setUrl(\URL::full());
            OpenGraph::setType('website');

            return view('subpage', ['article' => $_, 'random_article' => $__, 'keyword' => $keyword ]);
        }
        else
        {
            return abort(404);
        }
    }

    public function getCategory($category) {
        if ($category) {

            $_ = Categories_con::select('cat_id', 'category_name')->where('category_slug', '=', $category)->first();

            SEOMeta::setTitle($_->category_name);
            SEOMeta::setDescription('Bu kısımda huzurevi ve bakımevi sitesind yer alan kategorilerdeki yazılar gösterilmektedir..');
            OpenGraph::setTitle($_->category_name);
            SEOMeta::addKeyword('doga, istanbul, huzurevi, blog, kategoriler, bakimevi');
            OpenGraph::setDescription('Bu kısımda huzurevi ve bakımevi sitesind yer alan kategorilerdeki yazılar gösterilmektedir..');
            OpenGraph::setUrl(\URL::full());

            $al = [];

            if ($_) {
                $__ = Article::where('cat_id', '=', $_->cat_id)->where('status', '=', '1')->get();
            }

            if ($__) {
                foreach ($__ as $item) {
                    $al[] += $item->id;
                }
            }
            // $ids_ordered = implode(',', $al);

            $_ = Articles_con::whereIn('art_id', $al)->get();
        }

        return view('category', ['items' => $_, 'category_name' => $category]);

    }

    public function getUlasimFormu() {
        SEOMeta::setTitle('Huzurevi - Bakımevi Ulaşım Formu');
        SEOMeta::setDescription('İstanbul Huzurevi - Bakımevi ulaşım formu');
        SEOMeta::addKeyword(['ulasim', 'formu', 'bakimevi']);
        OpenGraph::setTitle('Huzurevi - Bakımevi Ulaşım Formu');
        OpenGraph::setDescription('İstanbul Huzurevi - Bakımevi ulaşım formu');
        OpenGraph::setUrl(\URL::full());

        return view('ulasim-formu');
    }

    public function postUlasimFormu(Request $r) {
        $r->validate([
            'name'  => 'required',
            'phone' => 'required',
            'email' => 'required',
            'mesaj' => 'required'
        ]);

        try {
            $_mail = new bizeulasin($r);
            $_mail->replyTo($r->email);
            Mail::to('info@huzurevi.com.tr')->cc('kokserdal@gmail.com')->send($_mail);
            }
        catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        return Redirect::back();
    }

    public function postbeniAra(Request $r)
    {
        $r->validate([
            'name'  => 'required',
            'phone' => 'required'
        ]);

        try {
            $_mail = new telefonugonder($r);
            Mail::to('info@huzurevi.com.tr')->cc('kokserdal@gmail.com')->send($_mail);
        }
        catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }

        Flash::overlay('Telefonunuz bize ulaştı, sizi en kısa süre içerisinde arayacağız.', 'Teşekkürler');
        return Redirect::back();

    }

    public function getIsbasvurusu() {
        SEOMeta::setTitle('Huzurevi - Bakımevi İstanbul İş Başvurusu');
        SEOMeta::setDescription('İstanbul Huzurevi - Bakımevi İş Başvurusu');
        SEOMeta::addKeyword(['is basvurusu', 'is', 'bakimevi']);
        OpenGraph::setTitle('Huzurevi - Bakımevi İstanbul İş Başvurusu');
        OpenGraph::setDescription('İstanbul Huzurevi - Bakımevi İş Başvurusu');
        return view('insan-kaynaklari');
    }

    public function postIsbasvurusu(Request $r) {
        $r->validate([
            'name'  => 'required',
            'phone' => 'required',
            'email' => 'required',
            'sube' => 'required',
            'tecrubeler' => 'required',
            'pozisyon' => 'required'
        ]);

        try {
            $_mail = new insankaynaklari($r);
            $_mail->replyTo($r->email);
            Mail::to('info@huzurevi.com.tr')->cc('kokserdal@gmail.com')->send($_mail);
            Flash::overlay('Bilgileriniz elimize ulaştı. Olumlu sonuçlandığında size bilgi vereceğiz.', 'Teşekkürler');
            return Redirect::back();
        }
        catch (\Exception $e) {
            return abort(500, $e->getMessage());
        }
    }

}
