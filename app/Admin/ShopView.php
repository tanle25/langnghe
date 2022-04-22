<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ShopView extends Model
{
    protected $fillable = [
        'ip_address', 'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User','product_id');
    }
}
