<?php
/**
 * Created by PhpStorm.
 * User: serdar
 * Date: 06.09.2018
 * Time: 09:47
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<style>
    body{
        font-family: 'Arial', 'Tahoma';
        font-size: 14px;
        color: #2b2b2b;
        line-height: 23px;;
    }
</style>

<h3>Aşağıda bilgileri olan {{ $name }}, telefon beklemektedir. Web sitesi üzerinden telefonunu bırakarmıştır.</h3>
<table style="border: 1px solid #DFDFDF; font-size: 14px;">
    <tr>
        <td>İsim Soyisim</td>
        <td>: {{ $name }}</td>
    </tr>
    <tr>
        <td>Telefon</td>
        <td>: {{ $phone }}</td>
    </tr>
</table>

</body>
</html>
