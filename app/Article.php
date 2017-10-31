<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $dates = ['end_date'];

    public function getenddateAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y');
    }

    public function setenddateAttribute($value)
    {
        return $this->end_date = Carbon::parse($value)->format('d.m.Y');
    }

    public function setCatidattribute($value)
    {
        if ($value == null)
        {
            return $this->cat_id = '0'
        }
        else{
            return $this->cat_id = $value;
        }
    }
}
