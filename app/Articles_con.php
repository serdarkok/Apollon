<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles_con extends Model
{
    protected $fillable = [
        'art_id',
        'art_name',
        'art_slug',
        'art_abstract',
        'art_content',
        'art_image',
        'art_keywords',
        'art_description',
    ];

}
