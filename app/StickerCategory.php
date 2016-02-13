<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StickerCategory extends Model
{
    public function parent()
    {
        return $this->belongsTo('App\StickerCategory', 'parent_id');
    }

    public function stickers()
    {
        return $this->hasMany('App\Sticker');
    }
}
