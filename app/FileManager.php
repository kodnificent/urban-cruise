<?php

namespace App;

use App\Traits\HasCreator;
use App\Traits\HasUpdater;
use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
    use HasCreator,
        HasUpdater;

    public $table = 'file_manager';

    protected $casts = [
        'created_at'    =>  'datetime',
        'updated_at'    =>  'datetime',
    ];
}
