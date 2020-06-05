<?php

namespace App;

use App\Cacheable\Cacheable;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RoleUser extends Pivot
{
    use Cacheable;
}
