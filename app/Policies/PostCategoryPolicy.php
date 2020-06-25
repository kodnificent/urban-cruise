<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class PostCategoryPolicy
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

    public function view(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function update(User $user)
    {
        return in_array($user->role, ['admin', 'editor']);
    }

    public function delete(User $user)
    {
        return in_array($user->role, ['admin', 'editor']);
    }
}
