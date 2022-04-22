<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    protected $fillable = [
        'name',
    ];

    public function xas()
    {
        return $this->hasMany('App\Admin\Xa','huyen_id');
    }
}
