<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name', 'slug'
    ];

    public function getParentMenu(){
        return $this->belongsTo('App\Menu', 'parent_id', 'id');
    }

    public function getSubMent(){
        return $this->hasMany('App\Menu', 'parent_id', 'id');
    }
}
