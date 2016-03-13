<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Sticker extends Model
{
    use Eloquence;

    protected $searchableColumns = ['name'];

    public function category()
    {
        return $this->belongsTo('App\StickerCategory', 'sticker_category_id');
    }

    public function relateds()
    {
        return \App\Sticker::where("sticker_category_id", $this->sticker_category_id)->where("id", "!=", $this->id);
    }
}
