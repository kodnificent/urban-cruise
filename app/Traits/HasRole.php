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
        return $this->belongsToMany(Role::class, 'user_id', 'role_id')
                ->using(RoleUser::class)
                ->withTimestamps();
    }
}
