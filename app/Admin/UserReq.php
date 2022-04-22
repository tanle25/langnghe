<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class UserReq extends Model
{
    protected $fillable = [
        'product_id', 'content', 'user_id', 'status', 'name', 'phone', 'email', 'address',
    ];

    public function product()
    {
        return $this->belongsTo('App\Admin\Product', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
