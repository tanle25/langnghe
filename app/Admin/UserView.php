<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class UserView extends Model
{
    protected $fillable = [
        'product_id', 'ip_address', 'user_id', 
    ];

    public function product()
    {
        return $this->belongsTo('App\Admin\Product','product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','product_id');
    }
}
