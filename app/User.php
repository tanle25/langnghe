<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'provider', 'provider_id', 'password', 'status', 'point', 'phone',
        'huyen', 'xa', 'xom', 'birthday', 'gender', 'cmtnd',
        'ngaycap', 'noicap', 'otp', 'image',
    ];

    public function cart()
    {
        return $this->hasMany('App\Admin\CartDb');
    }

    public function threads()
    {
        return $this->hasMany('App\Admin\Thread');
    }

    public function donhangs()
    {
        return $this->hasMany('App\Admin\CheckOut');
    }

    public function huyens()
    {
        return $this->belongsTo('App\Admin\Huyen', 'huyen');
    }

    public function xas()
    {
        return $this->belongsTo('App\Admin\Xa', 'xa');
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
}
