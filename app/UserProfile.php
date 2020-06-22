<?php

namespace App;

use App\Cacheable\Cacheable;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use Cacheable;

    public $timestamps = false;

    protected $guarded = [];

    protected $appends = [
        'photo_url', 'photo_thumbnail',
    ];

    /**
     * Get the user with this profile
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function getPhotoUrlAttribute()
    {
        return null;
    }

    public function getPhotoThumbnailAttribute()
    {
        return null;
    }
}
