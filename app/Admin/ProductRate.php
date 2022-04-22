<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ProductRate extends Model
{
    // protected $table = 'danhgias';
    protected $fillable = [
        'product_id', 'star', 'user_id', 'content'
    ];

    public function product()
    {
        return $this->belongsTo('App\Admin\Product','product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
