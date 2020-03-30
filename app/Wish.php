<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    /**
     * Wishが所有するItemを取得
     */
    public function item()
    {
        return $this->hasMany('App\Item');
    }

    /**
     * このItemを所有するUserを取得
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
