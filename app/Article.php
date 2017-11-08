<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates = ['end_date'];

    public $timestamps = false;

    protected $fillable = [
        'cat_id', 'home_page', 'end_date', 'slider', 'status'
    ];

    public function _content() {
        return $this->hasOne('App\Articles_con','art_id','id');
    }

    public function _categories()
    {
        return $this->hasOne('App\Categories_con','cat_id','cat_id');
    }

    public function getenddateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }

    public function setenddateAttribute($value)
    {
        if ($value == null) {
            return $this->attributes['end_date'] = "2030-11-30 00:00:00";
        }
        else {
            return $this->attributes['end_date'] = Carbon::parse($value)->format('d.m.Y');
        }
    }

    public function setCatIdattribute($value)
    {
        if ($value == null)
        {
            return $this->attributes['cat_id'] = '0';
        }
        else{
            return $this->attributes['cat_id'] = $value;
        }
    }
}
