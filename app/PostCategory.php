<?php

namespace App;

use App\Traits\HasMeta;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Builder;
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

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return route('post.list', [
            'category' => $this->attributes['slug']
        ]);
    }

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

    /**
     * Get parent categories
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeParentCategories(Builder $query)
    {
        return $query->whereNull('parent_id');
    }

    /**
     * Get child categories
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeChildCategories(Builder $query)
    {
        return $query->whereNotNull('parent_id');
    }

    /**
     * Get child categories of a parent
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeChildrenOf(Builder $query, $id)
    {
        return $query->where('parent_id', $id);
    }

    /**
     * Check if this category is a parent category
     *
     * @return bool
     */
    public function isParent()
    {
        return is_null($this->parent_id);
    }

    /**
     * Check if this category is a child category
     *
     * @return bool
     */
    public function isChild()
    {
        return boolval($this->parent_id);
    }
}
