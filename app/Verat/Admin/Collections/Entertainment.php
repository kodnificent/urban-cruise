<?php

namespace App\Verat\Admin\Collections;

use App\PostCategory;

class Entertainment extends Post
{
    protected $icon = 'music';

    /**
     * Set the display name property
     *
     * @return string
     */
    protected function display_name()
    {
        return 'Entertainment';
    }

    /**
     * Set the name property
     *
     * @return string
     */
    protected function name()
    {
        return 'enterntainment';
    }

    /**
     * default query for index page
     *
     * @return mixed
     */
    protected static function defaultQuery()
    {
        $query = static::$model;

        $entertainment = PostCategory::where('slug', 'entertainment')->first();

        return $query::ofCategory($entertainment)->published();
    }
}
