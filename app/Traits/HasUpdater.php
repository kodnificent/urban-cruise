<?php

namespace App\Traits;

use App\User;

trait HasUpdater
{

    /**
     * Initialize the has updater trait
     *
     * @return void
     */
    public function initializeHasUpdater()
    {
        if($this->loadsWithUpdater())
        {
            $this->loadWithUpdater();
        }
    }

    /**
     * Boot updater trait
     *
     * @return void
     */
    public static function bootHasUpdater()
    {
        static::updating(function($model){
            $attr = (new static)->getHasUpdaterForeign();

            $model->$attr = optional(request()->user())->id;
        });
    }

    /**
     * Get the updater of a model
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updater()
    {
        return $this->belongsTo($this->getHasUpdaterRelatedClass());
    }

    /**
     * Get the related class name of the updater
     *
     * @return string
     */
    public function getHasUpdaterRelatedClass()
    {
        return User::class;
    }

    /**
     * Get the foreign key column of the updater
     *
     * @return string
     */
    public function getHasUpdaterForeign()
    {
        return defined('static::HAS_UPDATER_FOREIGN') ? static::HAS_UPDATER_FOREIGN : 'updated_by';
    }

    /**
     * Add the updater method to the relationships that will be eager loaded
     * Returns true if successful
     *
     * @return bool
     */
    protected function loadWithUpdater()
    {
        if(!$this->loadsWithUpdater()) return false;

        $this->with[] = 'updater';

        return in_array('meta', $this->with);
    }

    /**
     * Check if updater method should be eager loaded
     *
     * @return bool
     */
    public function loadsWithUpdater()
    {
        return (bool) defined('static::LOADS_WITH_UPDATER') ? static::LOADS_WITH_UPDATER : false;
    }
}
