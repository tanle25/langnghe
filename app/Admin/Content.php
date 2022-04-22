<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'name', 'link', 'image', 'des_s', 'des_f', 'pos', 'section_id', 'type', 'note', 'created_by', 'status',
    ];

    public function section()
    {
        return $this->belongsTo('App\Admin\Section');
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
}
