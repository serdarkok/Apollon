<?php

namespace App\Http\Controllers;

use App\Article;
use App\Articles_con;
use App\Categories_con;
use App\Slider;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class layoutController extends Controller
{
    public function getHomePage() {
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

        return view('homepage', ['slider' => $_, 'hizmetler' => $__]);
        // return $_;

    }

    public function getArticle($category, $article) {
        // $data'dan gelen verideki son ID'yi alır.
        preg_match('/(\d+)\D*$/', $article ,$veri);

        if ($veri){
        $_ = Articles_con::where('art_id', $veri[0])->first();

        SEOMeta::setTitle($_->art_name);
        SEOMeta::setDescription($_->art_description);
        SEOMeta::addKeyword([$_->art_keywords]);
        OpenGraph::setTitle($_->art_name);
        OpenGraph::addImage(url('/').'/uploads/images/'.$_->art_image);
        OpenGraph::setDescription($_->art_description);

        return view('subpage', ['article' => $_]);
        }
        else
        {
            return abort(404);
        }
    }
}
