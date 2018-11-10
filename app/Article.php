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
        if ($value == "0000-00-00" || $value == "") {
            return $this->attributes['end_date'] = "";
        }
        else {
            return $this->attributes['end_date'] = Carbon::parse($value)->format('d.m.Y');
        }
    }

    public function getcatidAttribute($value)
    {
        if ($value == 0)
        {
            return $this->attributes['cat_id'] = '0';
        }
        else{
            return $this->attributes['cat_id'] = $value;
        }
    }
}
