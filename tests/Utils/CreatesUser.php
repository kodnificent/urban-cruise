<?php

namespace Tests\Utils;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

trait CreatesUser
{
    use RefreshDatabase;

    /**
     * Create a user and return an instance of the user
     *
     * @return \App\User
     */
    protected function createUser()
    {
        return factory(User::class)->create();
    }
}
