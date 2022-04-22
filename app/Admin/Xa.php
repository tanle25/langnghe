<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Xa extends Model
{
    protected $fillable = [
        'name', 'huyen_id',
    ];

    public function huyen()
    {
        return $this->belongsTo('App\Admin\Huyen','huyen_id');
    }
}
