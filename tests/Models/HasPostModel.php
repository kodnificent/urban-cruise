<?php

namespace Tests\Models;

use App\Traits\HasPost;
use Illuminate\Database\Eloquent\Model;

class HasPostModel extends Model
{
    use HasPost;
}
