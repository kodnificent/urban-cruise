<?php

namespace App\Traits;

use App\User;

trait HasUpdater
{
    /**
     * Get the updater of the model
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updater_id');
    }
}
