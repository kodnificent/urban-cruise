<?php

namespace App\Traits;

use App\Role;
use App\RoleUser;

trait HasRole
{
    /**
     * Get the roles associated with a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id')
                ->using(RoleUser::class)
                ->withTimestamps();
    }

    /**
     * Check if the user is an admin
     *
     * @return bool
     */
    public function hasAnyRole()
    {
        return $this->roles->count() > 0;
    }

    /**
     * Check if the user has a particular role or more than one role
     *
     * @param mixed ...$roles
     * @return bool
     */
    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            $admin_role = $this->roles()->where('title', $role)->first();

            if ($admin_role) return true;
        }

        return false;
    }
}
