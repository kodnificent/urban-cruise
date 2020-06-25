<?php

namespace Tests\Models;

use App\Traits\HasCreator;
use Illuminate\Database\Eloquent\Model;

class HasCreatorModel extends Model
{
    use HasCreator;
}
