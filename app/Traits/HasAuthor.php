<?php

namespace App\Traits;

use App\User;

trait HasAuthor
{

    /**
     * Get the author of a post
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
