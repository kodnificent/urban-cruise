<?php

namespace App\Traits;

use App\FileManager;

trait HasFile
{
    public function file()
    {
        return $this->belongsTo($this->getHasFileRelatedClass(), $this->getHasFileForeign());
    }

    /**
     * Get the related class name of the file
     *
     * @return string
     */
    public function getHasFileRelatedClass()
    {
        return FileManager::class;
    }

    /**
     * Get the foreign key column of the file
     *
     * @return string
     */
    public function getHasFileForeign()
    {
        return defined('static::HAS_FILE_FOREIGN') ? static::HAS_FILE_FOREIGN : 'file_id';
    }
}
