<?php

namespace App;

use App\Cacheable\Cacheable;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use Cacheable;

    public $timestamps = false;

    /**
     * Get the permissions associated with a role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }

    /**
     * Get the users associated with a role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id')
                ->using(RoleUser::class)
                ->withTimestamps();
    }
}
