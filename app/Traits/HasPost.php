<?php

namespace App\Traits;

use App\Post;

trait HasPost
{

    public function initializeCreator()
    {
        $this->shouldLoadWithPosts();
    }

    public function posts()
    {
        return $this->hasMany($this->getHasPostRelatedClass(), $this->getHasPostForeign());
    }

    /**
     * Get the related class
     *
     * @return string
     */
    public function getHasPostRelatedClass()
    {
        return Post::class;
    }

    /**
     * Get the foreign key for the posts relationship
     *
     * @return null|string
     */
    public function getHasPostForeign()
    {
        return defined('static::HAS_POST_FOREIGN') ? static::HAS_POST_FOREIGN : null;
    }

    /**
     * Check if the model should load with meta relation
     *
     * @return bool
     */
    public function shouldLoadWithPosts()
    {
        if($this->getLoadWithPosts()){
            $this->with[] = 'posts';
        }
        return in_array('posts', $this->with);
    }

    public function getLoadWithPosts()
    {
        return (bool) defined('static::LOAD_WITH_POSTS') ? static::LOAD_WITH_POSTS : false;
    }
}
