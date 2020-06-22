<?php

namespace App\Traits;

trait HasRole
{
    /**
     * Check if the user is an admin
     *
     * @return bool
     */
    public function hasAnyRole()
    {
        return in_array($this->role, [
            'admin',
            'editor',
            'author',
        ]);
    }

    /**
     * Check if the user has a particular role
     *
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Check if a user is super admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Check if a user is an editor
     *
     * @return bool
     */
    public function isEditor()
    {
        return $this->role === 'editor';
    }

    /**
     * Check if a user is an author
     *
     * @return bool
     */
    public function isAuthor()
    {
        return $this->role === 'author';
    }
}
