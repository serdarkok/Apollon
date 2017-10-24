<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $fillable = [
        'child_id', 'status'
    ];

    public function setChildidAttribute($child_id)
    {
        if ($child_id == null)
        {
            $this->attributes['child_id'] = 0;
        }

    }
}
