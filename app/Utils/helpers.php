<?php

use App\Facades\Settings;

/**
 * @return mixed
 */
function settings($key)
{
    return Settings::get($key);
}
