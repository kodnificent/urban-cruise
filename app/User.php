<?php

namespace App;

use App\Traits\HasCreator;
use App\Traits\HasPost;
use App\Traits\HasRole;
use App\Traits\HasUpdater;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, HasUpdater, HasCreator, HasPost, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'    =>  'datetime',
        'updated_at'    =>  'datetime',
    ];

    /**
     * Relationships that should be loaded with the model
     *
     * @var array
     */
    protected $with = [
        'creator',
        'updater',
    ];
}
