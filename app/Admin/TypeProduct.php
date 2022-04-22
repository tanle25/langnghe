<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Product;

class TypeProduct extends Model
{
    protected $fillable = [
        'name', 'slug', 'pos', 'type', 'parent_id', 'status', 'banner',
    ];

    protected $appends = ['parent','child'];

    public function getParentAttribute()
    {
        return $this->find($this->id);
    }

    public function getTotalProduct(){
        $_type = $this->type;
        if($_type == 2) return $this->products()->where('status',1)->get();
        else{
            $child = $this->getChildAttribute();
            $child_id = [];
            if($child != null) $child_id = $child->pluck('id')->all();
            $child_id[] = $this->id;
            return Product::where('status',1)->whereIn('type_product_id', $child_id)->get();
        }
    }

    public function products()
    {
        return $this->hasMany('App\Admin\Product','type_product_id');
    }

    public function getChildAttribute()
    {
        return $this->hasMany('App\Admin\TypeProduct','parent_id');
    }

    public function setBannerAttribute($value) {
        $tmp = $value;
        if ($tmp != null && $tmp != "") {
            $index = strpos($tmp,'FILES/source/');
            if (!$index === false) {
                $tmp = substr($tmp,$index, strlen($tmp));
            }
        }
        $this->attributes['banner'] = $tmp;
    }

    public function getBannerAttribute() {
        $tmp = $this->attributes['banner'];
        if ($tmp != null && $tmp != "") {
            $tmp = config('admin.base_url').$tmp;
        }
        return $tmp;
    }
}
