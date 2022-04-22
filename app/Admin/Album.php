<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends Model
{
    protected $fillable = [
        'image', 'name', 'slug', 'link', 'content', 'time', 'date', 'created_by', 'type', 'note', 'tags', 'status',
    ];

    protected $append =[
    	'array_page', 'array_tags', 'number_image',
    ];



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

    public function getNumberImageAttribute() {
        $slug = $this->attributes['slug'];
        $files = Storage::disk('album')->files($slug);
        return sizeof($files);
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
