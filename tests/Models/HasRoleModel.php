<?php

namespace Tests\Models;

use App\Traits\HasRole;
use Illuminate\Database\Eloquent\Model;

class HasRoleModel extends Model
{
    use HasRole;
}
