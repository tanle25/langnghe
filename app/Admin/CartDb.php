<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CartDb extends Model
{
    protected $fillable = [
        'product_id', 'price', 'order_id', 'quantity'
    ];
    protected $table = 'carts';
    
    public function product()
    {
        return $this->belongsTo('App\Admin\Product','product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function payment()
    {
        return $this->belongsTo('App\Admin\CheckOut', 'payment_id');
    }
}