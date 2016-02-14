<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function city() {
        return $this->belongsTo('App\City');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function stickers() {
        return $this->hasMany('App\OrderSticker');
    }
}
