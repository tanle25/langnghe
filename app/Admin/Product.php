<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\ProductRate;

class Product extends Model
{
    protected $fillable = [
        'name' , 'slug' , 'price' , 'sale_off', 'amount', 'type_product_id' , 'type_product_id_2' , 'shop_id' , 'unit' , 'status', 'des', 'product_code' , 'images',
        'ma_vach', 'ma_truy_xuat', 'san_luong', 'dong_goi', 'bao_quan', 'created_by', 'type', 'pos',
    ];

    protected $append =[
        'main_image', 'array_image', 'avg_rate',
    ];

    public function rates(){
        return $this->hasMany('App\Admin\ProductRate', 'product_id', 'id');
    }

    public function cart()
    {
        return $this->hasMany('App\Admin\CartDb');
    }

    public function getAvgRateAttribute()
    {
        $res = null;
        $tmp_id = $this->id;
        $rates = ProductRate::where('product_id', $this->id)->get();
        $sum = $rates->count();
        if($sum > 0)
        {
            $sum_star = $rates->sum('star');
            $res = round($sum_star/$sum);
        }
        return $res;
    }

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

    public function type_product()
    {
        return $this->belongsTo('App\Admin\TypeProduct','type_product_id');
    }

    // public function rate()
    // {
    //     return $this->hasMany('App\Admin\ProductRate');
    // }

    public function ask()
    {
        return $this->hasMany('App\Admin\ProductAsk');
    }

    public function like()
    {
        return $this->hasMany('App\Admin\ProductLike');
    }

    public function view()
    {
        return $this->hasMany('App\Admin\UserView');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin','created_by');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop','shop_id');
    }

    public function user_views()
    {
        return $this->hasMany('App\Admin\UserView','product_id');
    }

    public function getTotalRate(){
        $rates = $this->rates;
        $total = 0;
        foreach($rates as $key => $value){
            $total += $value->star;
        }
        if($total)$total = $total/count($rates);
        return round($total, 1, PHP_ROUND_HALF_ODD);
    }

    public function getTotalRateByValue($value){
        return ProductRate::where(['product_id' => $this->id, 'star' => $value])->count();
    }
}
