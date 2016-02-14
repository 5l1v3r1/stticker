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
        $categories = [];
        $categories[] = $this->id;

        foreach($this->subs as $subCategory){
            $categories[] = $subCategory->id;
        }
        return \App\Sticker::whereIn("sticker_category_id", $categories);
    }

    public function subs()
    {
        return $this->hasMany('App\StickerCategory', 'parent_id');
    }
}
