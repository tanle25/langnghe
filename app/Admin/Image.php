<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'image', 'title', 'link', 'content', 'page', 'type', 'note', 'tags', 'status',
    ];

    protected $append =[
    	'array_page', 'array_tags', 'code'
    ];

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

    public function getCodeAttribute() {
        $tmp = $this->attributes['link'];
        if ($tmp != null && $tmp != "") {
           $tmp = explode("=", $tmp);
           if(sizeof($tmp) != 2) return '';
           return $tmp[1];
        }
        return $tmp;
    }

    public function getImageAttribute() {
    	$tmp = $this->attributes['image'];
    	if ($tmp != null && $tmp != "") {
    		$tmp = config('admin.base_url').$tmp;
    	}
    	return $tmp;
    }

    public function getArrayPageAttribute() {
        $res = [];
        $tmp = $this->attributes['page'];
        if ($tmp != null && $tmp != "") {
            $res = explode(";", $tmp);
        }
        return $res;
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
