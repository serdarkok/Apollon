<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class layoutController extends Controller
{
    public function getHomePage() {
        $_slider = Article::select('id')->where('slider', '=', '1')->get();

        foreach ($_slider as $item){

        }
        return $_slider;

    }
}
