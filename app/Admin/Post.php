<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   	protected $fillable = [
        'name', 'slug', 'image' ,'des_s', 'des_f', 'cat_id', 'link', 'created_by', 'status' ,
    ];

    public function category()
    {
        return $this->belongsTo('App\Admin\Category','cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function setImageAttribute($value) {
    	$tmp = $value;
    	if ($tmp != null && $tmp != "") {
    		$index = strpos($tmp,'FILES/source/');
    		if (!$index === false) {
    			$tmp = substr($tmp,$index, strlen($tmp));
    		}
    	}
    	$this->attributes['image'] = $tmp;
    }

    public function getImageAttribute() {
    	$tmp = $this->attributes['image'];
    	if ($tmp != null && $tmp != "") {
    		$tmp = config('admin.base_url').$tmp;
    	}
    	return $tmp;
    }

    public function getArrayTagAttribute() {
        $res = [];
        $tmp = $this->attributes['tags'];
        if ($tmp != null && $tmp != "") {
            $res = explode(";", $tmp);
        }
        return $res;
    }
}
