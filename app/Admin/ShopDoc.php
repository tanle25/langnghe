<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ShopDoc extends Model
{
    protected $fillable = [
        'name', 'des_s', 'image', 'shop_id', 'status', 'created_by',
    ];

    public function shop()
    {
        return $this->belongsTo('App\Shop','shop_id');
    }
}
