<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'menu_child_id', 'menu_order', 'status'
    ];

    // Geçici ekliyor
    protected $appends = ['child_menus'];

    public function getChildMenusAttribute($value)
    {
        return $value;
    }

    public function setMenuChildIdAttribute($menu_child_id)
    {
        if ($menu_child_id == null)
        {
            $this->attributes['menu_child_id'] = 0;
        }
        else
        {
            $this->attributes['menu_child_id'] = $menu_child_id;
        }
    }
    public function setMenuOrderAttribute($value) {

        if ($value == null) {
            $_ = Menu::select('menu_order')->orderBy('menu_order', 'DESC')->first();
            if ($_) {
                $this->attributes['menu_order'] = $_->menu_order + 1;
            }
            else {
                $this->attributes['menu_order'] = '1';
            }

        }
        else {
                $this->attributes['menu_order'] = $value;
        }

    }

    public function _content()
    {
       return $this->hasOne('App\Menu_con', 'menu_id','id');
    }
}
