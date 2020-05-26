<?php

use App\Facades\Settings;

/**
 * @return mixed
 */
function settings($key)
{
    return Settings::get($key);
}


/**
 * Get the request path from a url
 *
 * @param string $url
 * @return string
 */
function extractPath($url)
{
    $string = explode('://', $url);
    $string = $string[1] ?? $string[0];

    $path = explode('/', $string, 2);
    $path = $path[1] ?? '/';

    return $path;
}
