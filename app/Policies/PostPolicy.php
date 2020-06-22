<?php

namespace App\Policies;

use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Post $post)
    {
        if ($user->isAuthor()) {
            return $user->id === $post->author_id;
        }

        return true;
    }

    public function update(User $user, Post $post)
    {
        if ($user->isAuthor()) {
            return $user->id === $post->author_id;
        }

        return in_array($user->role, ['admin', 'editor']);
    }

    public function create(User $user)
    {
        return $user->hasAnyRole();
    }

    public function delete(User $user, Post $post)
    {
        if ($user->isAuthor()) {
            if ($post->status !== 'draft') {
                return false;
            }

            return $user->id === $post->author_id;
        }

        return in_array($user->role, ['admin', 'editor']);
    }

    public function forceDelete(User $user, Post $post)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function feature(User $user, Post $post)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function unFeature(User $user, Post $post)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function allowComments(User $user, Post $post)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function disallowComments(User $user, Post $post)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function publish(User $user, Post $post)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function submitForReview(User $user, Post $post)
    {
        return $user->isAuthor();
    }
}
