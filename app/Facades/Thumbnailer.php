<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string make(string $key, string $path, ?string $disk = null, ?string $source = null)
 * @method static array makeMany(array $keys, string $path, ?string $disk = null)
 * @method static string create(string $source, string $key)
 * @method static array keys()
 * @method static null|array keyValueOf(string $key)
 * @method static array config()
 * @method static string format()
 * @method static int quality()
 * @method static string folder()
 * @method static string driver()
 * @method static string storagePath(string $key, string $path)
 *
 * @see \App\Thumbnailer\Thumbnailer
 */
class Thumbnailer extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'thumbnailer';
    }
}
