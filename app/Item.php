<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $fillable = ['category_id', 'text'];

    protected $attributes = ['done_flg' => false];

    /**
     * このItemを所有するWishを取得
     */
    public function wish()
    {
        return $this->belongsTo('App\Wish');
    }
}
