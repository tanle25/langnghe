<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email',  'role', 'authorization', 'password', 'created_by', 'status', 'xa_id'
    ];

    public function getAuthorizationAttribute()
    {
       $tmp = $this->attributes['authorization'];
       $res = [];
       if($tmp != null && $tmp != ""){
        $res = explode(";", $tmp);
       }
       return $res;

    }

    public function xa()
    {
        return $this->belongsTo('App\Admin\Xa');
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
