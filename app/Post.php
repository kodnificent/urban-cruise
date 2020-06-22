<?php

namespace App;

use App\Cacheable\Cacheable;
use App\Traits\HasCreator;
use App\Traits\HasSlug;
use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

/**
 * @method \App\Post featured() Get posts that are marked as featured
 */
class Post extends Model
{
    use HasSlug, HasCreator, HasUpdater, SoftDeletes, Cacheable, Searchable;

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
        'category:id,slug,title,parent_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'featured'   =>  'boolean',
        'allow_comments' => 'boolean',
    ];

    /**
     * Default attribute values
     *
     * @return array
     */
    protected $attributes = [
        'featured' => false,
        'allow_comments' => true,
        'status' => 'draft',
    ];

    protected $appends = [
        'url', 'truncated_title', 'truncated_title_md',
        'truncated_summary', 'created_at_for_humans',
        'image_url', 'image_thumbnail', 'video_url', 'video_thumbnail'
    ];

    public function getUrlAttribute()
    {
        if (! isset($this->attributes['slug']) || ! $this->category) return null;

        return url(route('category.post', [
            'category' => $this->category->parent->slug,
            'sub_category' => $this->category->slug,
            'slug' => $this->attributes['slug']
        ]), [], true);
    }

    public function getTruncatedSummaryAttribute()
    {
        if (! isset($this->attributes['summary']) || ! isset($this->attributes['content'])) return null;

        $content = $this->attributes['summary'] ?: $this->attributes['content'];

        return Str::limit($content, 150, "");
    }

    public function getTruncatedTitleAttribute()
    {
        if (! isset($this->attributes['title'])) return null;

        return Str::limit($this->attributes['title'], 40, '...');
    }

    public function getTruncatedTitleMdAttribute()
    {
        if (! isset($this->attributes['title'])) return null;

        return Str::limit($this->attributes['title'], 80, '...');
    }

    public function getCreatedAtForHumansAttribute()
    {
        if (! $this->created_at) return null;

        if ($this->created_at->isCurrentWeek()) { // was published less than a week ago
            $created_at = $this->created_at->diffForHumans();
        } elseif ($this->created_at->isCurrentYear()) {
            $created_at = $this->created_at->shortEnglishMonth .' ' .$this->created_at->day;
        } else {
            $created_at = $this->created_at->shortEnglishMonth .' ' .$this->created_at->day .' ' .$this->created_at->year;
        }

        return $created_at;
    }

    public function getImageUrlAttribute()
    {
        return null;
    }

    public function getImageThumbnailAttribute()
    {
        return null;
    }

    public function getVideoUrlAttribute()
    {
        return null;
    }

    public function getVideoThumbnailAttribute()
    {
        return null;
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
     * Get posts that aren't marked as featured
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnFeatured(Builder $query)
    {
        return $query->where('featured', false);
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
        $children = $category->children()->pluck('id');

        return $query->where('category_id', $category->id)
                    ->orWhereIn('category_id', $children);
    }

    /**
     * Get posts in descending order
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeReversedOrder(Builder $query)
    {
        return $query->orderBy('id', 'desc');
    }

    public function shouldBeSearchable()
    {
        return $this->status === 'published';
    }

    /**
     * The image of the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function image()
    {
        return $this->belongsTo(FileManager::class, 'image');
    }

    /**
     * The video of the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function video()
    {
        return $this->belongsTo(FileManager::class, 'video');
    }
}
