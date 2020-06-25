<?php

namespace App\Verat\Admin\Collections;

use App\PostCategory;

class Lifestyle extends Post
{
    protected $icon = 'coffee';

    /**
     * Set the display name property
     *
     * @return string
     */
    protected function display_name()
    {
        return 'Lifestyle';
    }

    /**
     * Set the name property
     *
     * @return string
     */
    protected function name()
    {
        return 'lifestyle';
    }

    /**
     * default query for index page
     *
     * @return mixed
     */
    protected static function defaultQuery()
    {
        $query = static::$model;

        $lifestyle = PostCategory::where('slug', 'lifestyle')->first();

        return $query::ofCategory($lifestyle)->published();
    }
}
