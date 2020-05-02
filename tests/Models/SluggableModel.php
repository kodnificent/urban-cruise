<?php

namespace Tests\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class SluggableModel extends Model
{
    use HasSlug;

    protected $fillable = ['title'];

    public function slugColumn()
    {
        return 'slug';
    }

    public function slugMirror()
    {
        return 'title';
    }
}
