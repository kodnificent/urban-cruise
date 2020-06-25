<?php

namespace App\Verat\Admin\Collections;

use App\PostCategory;

class News extends Post
{
    protected $icon = 'feather';

    /**
     * Set the display name property
     *
     * @return string
     */
    protected function display_name()
    {
        return 'News';
    }

    /**
     * Set the name property
     *
     * @return string
     */
    protected function name()
    {
        return 'news';
    }

    /**
     * default query for index page
     *
     * @return mixed
     */
    protected static function defaultQuery()
    {
        $query = static::$model;

        $news = PostCategory::where('slug', 'news')->first();

        return $query::ofCategory($news)->published();
    }
}
