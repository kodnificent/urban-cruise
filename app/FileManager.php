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
}
