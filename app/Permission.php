<?php

namespace App;

use App\Cacheable\Cacheable;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use Cacheable;

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
