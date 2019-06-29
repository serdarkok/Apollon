<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'title', 'description', 'keywords', 'facebook', 'twitter', 'instagram', 'language', 'youtube', 'status'
    ];

}
