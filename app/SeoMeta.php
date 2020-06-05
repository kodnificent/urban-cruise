<?php

namespace App;

use App\Cacheable\Cacheable;
use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    use Cacheable;

    public $timestamps = false;
}
