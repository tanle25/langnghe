<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'slug', 'type', 'note', 'status',
    ];
}
