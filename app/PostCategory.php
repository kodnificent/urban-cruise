<?php

namespace App;

use App\Traits\HasMeta;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasSlug, HasMeta;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Column name for the slug field
     *
     * @return string
     */
    public function slugColumn()
    {
        return 'slug';
    }

    /**
     * Column name for the slug mirror
     *
     * @return string
     */
    public function slugMirror()
    {
        return 'title';
    }

    /**
     * Get all the posts associated with this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
