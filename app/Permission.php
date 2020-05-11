<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;

    protected $attributes = [
        'create' => 'yes',
        'read' => 'mine',
        'update' => 'mine',
        'delete' => 'no'
    ];

    /**
     * Get the role associated with a permission
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
