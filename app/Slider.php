<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
//
class Slider extends Model
{
    protected $dates = ['slider_end_date', 'slider_start_date'];

    public $timestamps = false;

    protected $fillable = [
        'slider_end_date', 'slider_start_date', 'slider_link', 'art_id', 'slider_order'
    ];

    public function getsliderenddateAttribute($value)
    {
        if ($value == null) {
            return $this->attributes['slider_end_date'] = "";
        }
        else {
            return $this->slider_end_date = Carbon::parse($value)->format('d.m.Y');
        }
    }

    public function getsliderstartdateAttribute($value)
    {
        if ($value == null) {
            return $this->attributes['slider_start_date'] = Carbon::now();
        }
        else {
            return $this->slider_start_date = Carbon::parse($value)->format('d.m.Y');
        }
    }

    public function _content()
    {
       return $this->hasOne('App\Article', 'id', 'art_id');
    }
}
