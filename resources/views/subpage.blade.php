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
    <h3>{{ $article->art_name }}</h3>
    <div class="sub-top">
        <img src="/uploads/images/{{ $article->art_image }}" class="img-responsive sub-head-image" />
        {!! $article->art_content !!}
    </div>
</div>
@endsection
