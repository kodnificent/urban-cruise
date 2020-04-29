<?php

namespace App\Traits;

use App\SeoMeta;

trait HasMeta
{
    public function initializeCreator()
    {
        $this->shouldLoadWithMeta();
    }

    public function meta()
    {
        return $this->morphOne(SeoMeta::class, 'metaable');
    }

    /**
     * Check if the model should load with meta relation
     *
     * @return bool
     */
    public function shouldLoadWithMeta()
    {
        if($this->getLoadsWithMeta()){
            $this->with[] = 'meta';
        }
        return in_array('meta', $this->with);
    }

    public function getLoadsWithMeta()
    {
        return (bool) property_exists($this, 'loadsWithMeta') ? $this->loadsWithMeta : false;
    }
}
