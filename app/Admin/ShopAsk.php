<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ShopAsk extends Model
{
    protected $fillable = [
        'shop_id' , 'user_id', 'type', 'content', 'ask_id'
    ];

    protected $appends = ['parent','child'];

    public function product()
    {
        return $this->belongsTo('App\Shop','shop_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function getParentAttribute()
    {
        $tmp_id = $this->attributes['ask_id'];
        $res = null;
        if(isset($tmp_id)){
        	$res = $this::find($tmp_id);
        }
        return $res;
    }

    public function getChildAttribute()
    {
        $tmp_id = $this->attributes['id'];
        $res = null;
        if(isset($tmp_id)){
            $res = $this::where('ask_id', $tmp_id)->get();
        }
        return $res;
    }
}
