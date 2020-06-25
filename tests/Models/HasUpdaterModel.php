<?php

namespace Tests\Models;

use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\Model;

class HasUpdaterModel extends Model
{
    use HasUpdater;
}
