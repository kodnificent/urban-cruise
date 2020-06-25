<?php

namespace App;

use App\Cacheable\Cacheable;
use Illuminate\Database\Eloquent\Model;
use JD\Cloudder\Facades\Cloudder;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getPhotoUrlAttribute()
    {
        if (! $this->photo) {
            return '/assets/imgs/guest-user.png';
        }

        return Cloudder::secureShow($this->photo);
    }

    public function getPhotoThumbnailAttribute()
    {
        if (! $this->photo) {
            return '/assets/imgs/guest-user.png';
        }

        return Cloudder::secureShow($this->photo, [
            'width' => 640,
            'height' => 480,
            'transformation' => [
                "dpr" => "auto", "responsive" => true, "crop" => "scale"
            ]
        ]);
    }
}
