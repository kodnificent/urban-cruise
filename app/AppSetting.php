<?php

namespace App;

use App\Cacheable\Cacheable;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use Cacheable;

    public $timestamps = false;
}
