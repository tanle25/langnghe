<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = [
        'type', 'name', 'slug', 'content', 'type_product_id', 'huyen', 'xa', 'end_date', 'address', 'phone', 'images',
        'user_id', 'status',
    ];

    protected $append =[
        'main_image', 'array_image',
    ];

    public function getMainImageAttribute()
    {
        $res = null;
        $tmp_id = $this->attributes['images'];
        if($tmp_id != null){
            $arr = explode(";", $tmp_id);
            if(sizeof($arr) > 0){
                $res = $arr[0];
            }
        }
        return $res;
    }

    public function getArrayImageAttribute()
    {
        $res = null;
        $tmp_id = $this->attributes['images'];
        if($tmp_id != null){
            $arr = explode(";", $tmp_id);
            $res = $arr;
        }
        return $res;
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function type_product()
    {
        return $this->belongsTo('App\Admin\TypeProduct','type_product_id');
    }

    public function huyen()
    {
        return $this->belongsTo('App\Admin\Huyen','huyen');
    }
    public function xa_model()
    {
        return $this->belongsTo('App\Admin\Xa','xa');
    }
}
