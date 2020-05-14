<?php

namespace App;

use App\Traits\HasCreator;
use App\Traits\HasFile;
use App\Traits\HasMeta;
use App\Traits\HasSlug;
use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method \App\Post featured() Get posts that are marked as featured
 */
class Post extends Model
{
    use HasMeta, HasSlug, HasCreator, HasUpdater, HasFile, SoftDeletes;

    const HAS_CREATOR_FOREIGN = 'author_id';

    const HAS_UPDATER_FOREIGN = 'updater_id';

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
        'creator:id,name',
        'updater:id,name',
        'category:id,slug,title',
        'file:id,disk,path,type'
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
     * Default attribute values
     *
     * @return array
     */
    protected $attributes = [
        'featured' => false,
        'status' => 'draft',
    ];

    protected $appends = [
        'url'
    ];

    public function getUrlAttribute()
    {
        return route('post.read', [
            'category' => $this->category->slug,
            'slug' => $this->attributes['slug']
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
     * Get the category of the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    /**
     * Get posts that are marked as featured
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFeatured(Builder $query)
    {
        return $query->where('featured', true);
    }

    /**
     * Get posts with published status
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Get posts with draft status
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDrafted(Builder $query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Get posts of a certain category
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \App\PostCategory $category
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCategory(Builder $query, PostCategory $category)
    {
        // first we get the ids of all the children of the category
        // because a post can be of category news (parent category)
        // and have category_id value of a politics child category
        $children = PostCategory::childrenOf($category->id)->pluck('id');

        return $query->where('category_id', $category->id)
                    ->orWhereIn('category_id', $children);
    }
}
