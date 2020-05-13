<?php

namespace App\Traits;

use App\User;

trait HasCreator
{

    /**
     * Initialize the has creator trait
     *
     * @return void
     */
    public function initializeHasCreator()
    {
        if($this->loadsWithCreator())
        {
            $this->loadWithCreator();
        }
    }

    /**
     * Boot creator trait
     *
     * @return void
     */
    public static function bootHasCreator()
    {
        static::creating(function($model){
            $attr = (new static)->getHasCreatorForeign();

            $model->{$attr} = $model->{$attr} ?? optional(request()->user())->id;
        });
    }

    /**
     * Get the creator of a model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo($this->getHasCreatorRelatedClass());
    }

    /**
     * Get the related class name of the creator
     *
     * @return string
     */
    public function getHasCreatorRelatedClass()
    {
        return User::class;
    }

    /**
     * Get the foreign key column of the creator
     *
     * @return string
     */
    public function getHasCreatorForeign()
    {
        return defined('static::HAS_CREATOR_FOREIGN') ? static::HAS_CREATOR_FOREIGN : 'created_by';
    }

    /**
     * Add the creator method to the relationships that will be eager loaded
     * Returns true if successful
     *
     * @return bool
     */
    protected function loadWithCreator()
    {
        if(!$this->loadsWithCreator()) return false;

        $this->with[] = 'creator';

        return in_array('meta', $this->with);
    }

    /**
     * Check if creator method should be eager loaded
     *
     * @return bool
     */
    public function loadsWithCreator()
    {
        return (bool) defined('static::LOADS_WITH_CREATOR') ? static::LOADS_WITH_CREATOR : false;
    }
}
