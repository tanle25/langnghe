<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $fillable = [
        'shop_id', 'code', 'name', 'phone', 'email', 'address', 'sum', 'status',
    ];

    public function products()
    {
        return $this->hasMany('App\Admin\CartDb', 'order_id', 'id');
    }
    public function shop()
    {
        return $this->belongsTo('App\Shop', 'shop_id');
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->products as $key => $value) {
            $total += $value->price * $value->quantity;
        }
        return $total;
    }

}