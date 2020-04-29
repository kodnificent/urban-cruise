<?php

namespace Tests\Models;

use App\Traits\HasMeta;
use Illuminate\Database\Eloquent\Model;

class MetaableModel extends Model
{
    use HasMeta;
}
