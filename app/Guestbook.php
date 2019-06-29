<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    protected $fillable = [ 'guest_fullname', 'guest_email', 'guest_phone', 'guest_text', 'guest_reply', 'status'];
    protected $appends = ['guest_answer'];
    protected $dates = ['created_at'];

    public function getGuestAnswerAttribute($value){
        return $value;
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d.m.Y');
    }
}