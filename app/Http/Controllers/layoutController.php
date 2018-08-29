<?php

namespace App\Http\Controllers;

use App\Article;
use App\Articles_con;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class layoutController extends Controller
{
    public function getHomePage() {
        $_slider = Article::select('id')->where('slider', '=', '1')->get();
        // return $_slider;
        $_ = [];
        foreach ($_slider as $item){
        $_[] += $item->id;
        }

        // $__ = Slider::whereIn('art_id', $_)->whereRaw('IF (slider_end_date != null)')->where('slider_end_date','>', Carbon::now())->get();

        $__ = Slider::select('art_id', \DB::raw('(CASE WHEN slider_end_date = null THEN 2050-11-11 END) AS slider_end_date'))->get();

        // Slider'ı end_date'e göre çekmeye çalışıyorum. En son 29 Ağs 2018 - 17:02

        // $__ = Articles_con::whereIn('art_id', $_)->get();

        return $__;

        return view('homepage');
        return $_slider;

    }
}
