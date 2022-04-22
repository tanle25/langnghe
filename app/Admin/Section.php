<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'name', 'image', 'des_s', 'des_f', 'pos', 'page_id', 'type', 'note', 'created_by', 'status', 'type', 'html',
    ];

    public function page()
    {
        return $this->belongsTo('App\Admin\Page');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','created_by');
    }

    public function contents()
    {
        return $this->hasMany('App\Admin\Content','section_id');
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
}
