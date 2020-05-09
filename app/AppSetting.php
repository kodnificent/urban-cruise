<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    protected $casts = [
        'socials' => 'array'
    ];

    public $timestamps = false;
}
