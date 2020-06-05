<?php

namespace App;

use App\Cacheable\Cacheable;
use App\Facades\Thumbnailer;
use App\Traits\HasCreator;
use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileManager extends Model
{
    use HasCreator,
        HasUpdater,
        Cacheable;

    public $table = 'file_manager';

    protected $casts = [
        'created_at'    =>  'datetime',
        'updated_at'    =>  'datetime',
    ];

    protected $appends = [
        'url', 'thumbnails'
    ];

    /**
     * Get the url attribute of the file
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return Storage::disk($this->attributes['disk'])->url($this->attributes['path']);
    }

    /**
     * Get the thumbnails attribute of the file
     *
     * @return array
     */
    public function getThumbnailsAttribute()
    {
        $thumbnails = [];

        if ($this->attributes['type'] !== 'image') return $thumbnails;

        foreach (Thumbnailer::keys() as $key => $value) {
            $thumbnails[$key] = Storage::disk($this->attributes['disk'])->url(Thumbnailer::storagePath(
                $key,
                $this->attributes['path']
            ));
        }

        return $thumbnails;
    }
}
