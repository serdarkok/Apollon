<?php
/**
 * Created by PhpStorm.
 * User: serdarkok
 * Date: 23/07/2018
 * Time: 23:44
 */
?>
@extends('layout')

@section('content')
<div class="col-md-12 sub-flat">
    <h1>{{ $article->art_name }}</h1>
    @include('social', ['url' => Request::url()])
    <div class="sub-top">
        <div class="breadcrumb"><a href="/">Ana Sayfa</a> <i class="fa fa-angle-right"></i> <a href="/page/{{ $article->category_slug }}">{{ $article->category_name }}</a> <i class="fa fa-angle-right"></i> {{ $article->art_name }} </div>
        <img src="/uploads/images/{{ $article->art_image }}" class="img-responsive sub-head-image" alt="{{ $article->art_name }}" />
        {!! $article->art_content !!}
        <div class="col-md-12">
            @foreach($keyword as $item)
                <div class="keyword"><a href="/tags/{{$item}}">{{ $item }}</a></div>
            @endforeach
        </div>
        <h3 style="color: #C4390F; font-style: italic;">Dikkatinizi Çekebilir</h3>
                @foreach($random_article as $item)
                        <div class="col-md-4" style="margin-top: 5px;">
                            <a href="/page/{{ $item->cat_name }}/{{$item->art_slug}}-{{ $item->art_id }}" class="random-article">
                                <img src="/uploads/images/{{ $item->art_image }}" class="img-responsive" style="border: 1px solid #DFDFDF;" alt="{{ $item->art_name }}" />
                                <p>{{ $item->art_name }}</p>
                            </a>
                        </div>
                @endforeach
    </div>
</div>
@endsection
