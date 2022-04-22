<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    protected $fillable = [
        'email', 'phone', 'otp', 'status',
    ];
}
