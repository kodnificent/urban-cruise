<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class SettingsPolicy
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
}
