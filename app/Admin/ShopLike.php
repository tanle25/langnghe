<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ShopLike extends Model
{
    protected $fillable = [
        'shop_id' , 'user_id', 
    ];

    public function product()
    {
        return $this->belongsTo('App\Shop','shop_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
