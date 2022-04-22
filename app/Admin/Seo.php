<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $fillable = [
        'seo_des', 'seo_title', 'seo_key', 'type', 'obj_id',
    ];
}
