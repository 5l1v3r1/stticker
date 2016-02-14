<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sticker extends Model
{
    public function category()
    {
        return $this->belongsTo('App\StickerCategory', 'sticker_category_id');
    }

    public function relateds()
    {
        return \App\Sticker::where("sticker_category_id", $this->sticker_category_id)->where("id", "!=", $this->id);
    }
}
