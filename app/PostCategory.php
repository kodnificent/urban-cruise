<?php

namespace App;

use App\Traits\HasMeta;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Illuminate\Database\Eloquent\Builder parentCategories() Get parent categories
 */
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
        'url', 'endpoints'
    ];

    public function getUrlAttribute()
    {
        return $this->isParent() ? url(route('category.show', [
            'category' => $this->attributes['slug']
        ]), [], true) : url(route('category.show', [
            'category' => $this->parent->slug,
            'sub_category' => $this->attributes['slug']
        ]), [], true);
    }

    public function getEndpointsAttribute()
    {
        return [
            'posts' => $this->isParent()
                        ? route('category.posts', [
                            'category' => $this->attributes['slug']
                        ])
                        : route('category.posts', [
                            'category' => $this->parent->slug,
                            'sub_category' => $this->attributes['slug']
                        ])
        ];
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
     * Get the parent of the category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(PostCategory::class, 'parent_id');
    }

    /**
     * Get the children of the category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function children()
    {
        return $this->hasMany(PostCategory::class, 'parent_id');
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
