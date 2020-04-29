<?php

namespace App;

use App\Traits\HasAuthor;
use App\Traits\HasSlug;
use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasSlug, HasAuthor, HasUpdater, SoftDeletes;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'author',
        'updater',
        'category'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options'   =>  'array'
    ];

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
     * Get the category of the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }
}
