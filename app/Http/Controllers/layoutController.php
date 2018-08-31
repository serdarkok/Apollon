<?php

namespace App\Http\Controllers;

use App\Article;
use App\Articles_con;
use App\Slider;
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

        return view('homepage', ['slider' => $_]);
        return $_slider;

    }
}
