<?php

namespace App;

use App\Admin\ShopRate;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Shop extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'status', 'tencs', 'loaidn', 'huyen',
        'xa', 'xom', 'mieuta', 'dt', 'nganhql', 'loaigiayto', 'sogiay', 'coquancp', 'ngaycap',
        'image', 'nguoidaidien', 'quymo', 'point', 'website', 'fanpage', 'map',
        'created_by', 'user_id', 'image_1', 'image_2', 'type', 'pos',
    ];

    protected $append = [
        'avg_rate',
    ];

    public function getImage($str)
    {
        return $str != null && $str != '' ? config('admin.base_url') . 'storage/app/public/shops/images/' . $str : config('admin.base_url') . 'storage/app/public/shops/no_image.jpg';
    }
    public function getThumb($str)
    {
        return $str != null && $str != '' ? config('admin.base_url') . 'storage/app/public/shops/thumbs/' . $str : config('admin.base_url') . 'storage/app/public/shops/no_image.jpg';
    }

    public function getAvgRateAttribute()
    {
        $res = null;
        $tmp_id = $this->id;
        $rates = ShopRate::where('shop_id', $this->id)->get();
        $sum = $rates->count();
        if ($sum > 0) {
            $sum_star = $rates->sum('star');
            $res = round($sum_star / $sum);
        }
        return $res;
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function xa_model()
    {
        return $this->belongsTo('App\Admin\Xa', 'xa');
    }

    public function createBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function shop_docs()
    {
        return $this->hasMany('App\Admin\ShopDoc', 'shop_id');
    }

    public function products()
    {
        return $this->hasMany('App\Admin\Product');
    }

    public function rate()
    {
        return $this->hasMany('App\Admin\ShopRate');
    }

    public function ask()
    {
        return $this->hasMany('App\Admin\ShopAsk');
    }

    public function like()
    {
        return $this->hasMany('App\Admin\ShopLike');
    }

    public function check_out()
    {
        return $this->hasMany('App\Admin\CheckOut');
    }

    public function view()
    {
        return $this->hasMany('App\Admin\ShopView');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getTotalRate()
    {
        $products = $this->products;
        $total = 0;
        foreach ($products as $key => $product) {
            for ($i = 1; $i <= 5; $i++) {
                $total += $product->getTotalRateByValue($i);
            }

        }
        return $total;
    }

}