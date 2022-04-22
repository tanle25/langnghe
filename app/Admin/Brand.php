<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name', 'url', 'created_by'
    ];

    public function user(){
        return $this->belongsTo('App\Admin', 'created_by', 'id');
    }
}
