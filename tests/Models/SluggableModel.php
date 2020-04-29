<?php

namespace Tests\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class SluggableModel extends Model
{
    use HasSlug;

    public function slugColumn()
    {
        return 'slug';
    }

    public function slugMirror()
    {
        return 'title';
    }
}
