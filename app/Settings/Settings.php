<?php

namespace App\Settings;

use App\AppSetting;

class Settings
{
    /**
     * The applications settings
     *
     * @var \App\AppSetting
     */
    protected $settings;

    public function __construct(AppSetting $settings)
    {
        $this->settings = $settings;
    }

    /**
     * Get the value a settings key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->settings->{$key};
    }
}
