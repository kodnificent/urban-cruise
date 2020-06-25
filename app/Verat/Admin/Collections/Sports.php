<?php

namespace App\Verat\Admin\Collections;

use App\PostCategory;

class Sports extends Post
{
    protected $icon = 'life-buoy';

    /**
     * Set the display name property
     *
     * @return string
     */
    protected function display_name()
    {
        return 'Sports';
    }

    /**
     * Set the name property
     *
     * @return string
     */
    protected function name()
    {
        return 'sports';
    }

    /**
     * default query for index page
     *
     * @return mixed
     */
    protected static function defaultQuery()
    {
        $query = static::$model;

        $sports = PostCategory::where('slug', 'sports')->first();

        return $query::ofCategory($sports)->published();
    }
}
