<?php

namespace App;

use App\Cacheable\Cacheable;
use App\Traits\HasCreator;
use App\Traits\HasSlug;
use App\Traits\HasStatus;
use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;
use Laravel\Scout\Searchable;

/**
 * @method \App\Post featured() Get posts that are marked as featured
 */
class Post extends Model
{
    use HasSlug, HasCreator, HasUpdater, SoftDeletes, Cacheable, Searchable, HasStatus;

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
        'published_at' => 'datetime',
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
        'truncated_summary', 'published_at_for_humans',
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

    public function getPublishedAtForHumansAttribute()
    {
        if (! $this->published_at) return null;

        if ($this->published_at->isCurrentWeek()) { // was published less than a week ago
            $published_at = $this->published_at->diffForHumans();
        } elseif ($this->published_at->isCurrentYear()) {
            $published_at = $this->published_at->shortEnglishMonth .' ' .$this->published_at->day;
        } else {
            $published_at = $this->published_at->shortEnglishMonth .' ' .$this->published_at->day .' ' .$this->published_at->year;
        }

        return $published_at;
    }

    public function getImageUrlAttribute()
    {
        if (! $this->image) {
            return null;
        }

        return Cloudder::secureShow($this->image);
    }

    public function getImageThumbnailAttribute()
    {
        if (! $this->image) {
            return null;
        }

        return Cloudder::secureShow($this->image, [
            'width' => 640,
            'height' => 480,
            'transformation' => [
                "dpr" => "auto", "responsive" => true, "crop" => "scale"
            ]
        ]);
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
    /*public function image()
    {
        return $this->belongsTo(FileManager::class, 'image_id');
    }*/

    /**
     * The video of the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /*public function video()
    {
        return $this->belongsTo(FileManager::class, 'video_id');
    }*/

    /**
     * Allow comments for a post
     *
     * @return $this
     */
    public function allowComments()
    {
        $this->allow_comments = 1;
        $this->save();

        return $this;
    }

    /**
     * Disallow comments for a post
     *
     * @return $this
     */
    public function disallowComments()
    {
        $this->allow_comments = 0;
        $this->save();

        return $this;
    }

    /**
     * Feature a post
     *
     * @return $this
     */
    public function feature()
    {
        $this->featured = 1;
        $this->save();

        return $this;
    }

    /**
     * Unfeature a post
     *
     * @return $this
     */
    public function unFeature()
    {
        $this->featured = 0;
        $this->save();

        return $this;
    }

    /**
     * Get the user who review this post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo('App\User');
    }
}
