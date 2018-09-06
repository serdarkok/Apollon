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
        <h3>Huzurevi - Bakımevi Ulaşım Formu</h3>
        <div class="sub-top">
            <p>Bizimle her türlü konuda iletişime geçebilirsiniz. Uzman personelimiz en kısa sürede size dönüş yapacaktır. Lütfen aşağıdaki formu eksiksiz bir şekilde doldurarak gönder butonuna basınız...</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form-horizontal" action="/ulasim-formu" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">İsim Soyisim:</label>
                    <div class="col-sm-10">
                        <input type="name" class="form-control" id="name" placeholder="İsim Soyisim" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Telefon:</label>
                    <div class="col-sm-10">
                        <input type="phone" class="form-control" id="phone" placeholder="Telefon" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">E-Posta:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="E-Posta" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">İlgili Şube:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="sube">
                            <option value="">Şube Yok</option>
                            <option value="sancaktepe">Sancaktepe</option>
                            <option value="kiziltoprak">Kızıltoprak</option>
                            <option value="dragos">Dragos</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Mesajınız:</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="6" name="mesaj"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-orange btn-sm" style="padding: 5px 20px 5px 20px;">Gönder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection