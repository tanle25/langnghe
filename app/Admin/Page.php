<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Seo;

class Page extends Model
{

    protected $fillable = [
        'name', 'slug', 'type', 'content',
    ];

    public function seo(){
    	return Seo::where('type',1)->where('obj_id', $this->id)->first();
    }

    public function banner(){
    	return $this->hasMany('App\Admin\Banner', 'page_id');
    }

    public function sections(){
    	return $this->hasMany('App\Admin\Section', 'page_id');
    }
}
