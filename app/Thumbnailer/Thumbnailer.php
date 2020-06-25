<?php

namespace App\Thumbnailer;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use InvalidArgumentException;

class Thumbnailer
{
    /**
     * An array of configuration values
     *
     * @var array
     */
    protected $config;

    /**
     * Create an instance of the thumbnailer
     *
     * @return void
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * Generate and store a thumbnail for a single key
     *
     * @param string $key
     * @param string $path
     * @param null|string $disk
     * @param mixed $source
     * @return string
     */
    public function make(string $key, string $path, ?string $disk = null, ?string $source = null)
    {
        $source = $source ?? $this->storage($disk)->get($path);

        $storage_path = $this->storagePath($key, $path);

        $this->storage($disk)->put(
            $storage_path,
            $this->create($source, $key)
        );

        return $storage_path;
    }

    /**
     * Get the storage path for a thumbnail
     *
     * @param string $key
     * @param string $path
     * @return string
     */
    public function storagePath(string $key, string $path)
    {
        return $this->folder() . "/$key/" . $path;
    }

    /**
     * Generate and store thumbnails for more than one key
     *
     * @param array $keys
     * @param string $path
     * @param null|string $disk
     * @return array
     */
    public function makeMany(array $keys, string $path, ?string $disk = null)
    {
        $thumbnails = [];

        foreach ($keys as $key => $value) {
            $thumbnails[] = $this->make($key, $path, $disk);
        }

        return $thumbnails;
    }

    /**
     * Create a thumbnail from an image without persisting it to a storage
     *
     * @param string $source
     * @param string $key
     * @return string
     */
    public function create(string $source, string $key)
    {
        if (! $sizes = $this->keyValueOf($key)) {
            throw new InvalidArgumentException("$key key does not exist");
        }

        $image = $this->manager()->make($source);

        return (string) $image->resize($sizes[0], $sizes[1])->encode($this->format(), $this->quality());
    }

    /**
     * Get the storage facade with disk
     *
     * @param null|string $disk
     * @return \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected function storage(?string $disk = null)
    {
        return Storage::disk($disk);
    }

    /**
     * Get the thumbnail keys
     *
     * @return array
     */
    public function keys()
    {
        return $this->config()['keys'] ?? [];
    }

    /**
     * Get the configuration values for a particular key
     *
     * @param string $key
     * @return null|array
     */
    public function keyValueOf(string $key)
    {
        return $this->keys()[$key] ?? null;
    }

    /**
     * Get the thumbnail configuration
     *
     * @return array
     */
    public function config()
    {
        return $this->config;
    }

    /**
     * Get an instance of intervention image manager
     *
     * @return \Intervention\Image\ImageManager
     */
    protected function manager()
    {
        return new ImageManager([
            'driver' => $this->driver()
        ]);
    }

    /**
     * Get the thumbnailer config format
     *
     * @return string
     */
    public function format()
    {
        return $this->config()['format'] ?? 'jpg';
    }

    /**
     * Get the thumbnailer config quality
     *
     * @return int
     */
    public function quality()
    {
        return $this->config()['quality'] ?? 90;
    }

    /**
     * Get the name of the folder where thumbnails are stored
     *
     * @return string
     */
    public function folder()
    {
        return $this->config()['folder'] ?? 'thumbnails';
    }

    /**
     * Get the thumbnail driver
     *
     * @return string
     */
    public function driver()
    {
        return $this->config()['driver'] ?? 'gd';
    }
}
