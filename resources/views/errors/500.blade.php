<?php
/**
 * Created by PhpStorm.
 * User: serdar
 * Date: 06.09.2018
 * Time: 11:17
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: serdar
 * Date: 06.09.2018
 * Time: 08:35
 */
?>
@extends('layout')

@section('content')
    <div class="col-md-12 sub-flat">
        <h3>Sunucu Hatası</h3>
        <div class="sub-top">
            <p>Aşağıdaki hata sebebi ile istenilen işlem yapılamamıştır. Lütfen sistem yöneticisi ile irtibata geçiniz veya biraz sonra tekrar deneyiniz...</p>
            <h2>Sunucu Hatası:</h2>
                <code>{{ $exception->getMessage() }}</code>
        </div>
    </div>
@endsection

