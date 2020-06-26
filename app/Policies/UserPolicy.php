<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserPolicy
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
        return $user->isAdmin();
    }

    public function view(User $user, $model)
    {
        if (request()->resource === 'account-settings') {
            return $user->id === $model->id;
        }

        return $user->isAdmin();
    }

    public function create(User $user)
    {
        if (request()->resource === 'account-settings') {
            return false;
        }

        return $user->isAdmin();
    }

    public function update(User $user, $model)
    {
        if (request()->resource === 'account-settings') {
            return $user->id === $model->id;
        }
    }

    public function suspend(User $user)
    {
        return $user->isAdmin();
    }

    public function assignNewRole(User $user)
    {
        return $user->isAdmin();
    }
}
