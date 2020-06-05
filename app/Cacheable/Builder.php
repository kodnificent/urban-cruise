<?php

namespace App\Cacheable;


use Watson\Rememberable\Query\Builder as WatsonBuilder;

class Builder extends WatsonBuilder
{

    /**
     * Get a unique cache key for the complete query.
     *
     * @param  mixed  $appends
     * @return string
     */
    public function getCacheKey($appends = null)
    {
        $key = $this->cachePrefix.':'.($this->cacheKey ?: $this->generateCacheKey($appends));
        $key = $this->pushToCachedKeys($key);
        return $key;
    }

    /**
     * Push a cache key to the array of cached keys
     *
     * @param string $key
     * @return string $key
     */
    protected function pushToCachedKeys($key)
    {
        $cachedKeys = $this->getCachedKeys();

        if(!in_array($key, $cachedKeys)) array_push($cachedKeys, $key);

        $this->updateCachedKeys($cachedKeys);
        return $key;
    }

    /**
     * Get the cached keys
     *
     * @return array
     */
    protected function getCachedKeys()
    {
        $cache = $this->getCacheDriver();

        $cacheKeyName = "rememberable.$this->cachePrefix";

        $cachedKeys = $cache->rememberForever($cacheKeyName, function(){

            // if it doesn't exist, create an empty array
            // for storing the keys
            return [];
        });

        return $cachedKeys;
    }

    /**
     * Update the cached keys
     *
     * @param array $data
     * @return void
     */
    protected function updateCachedKeys($data)
    {
        $cache = $this->getCacheDriver();

        $cacheKeyName = "rememberable.$this->cachePrefix";

        $cache->forever($cacheKeyName, $data);
    }

    /**
     * Flush all caches for the current model
     *
     * @param mixed $cachePrefix
     * @return bool
     */
    public function flushCachedKeys($cachePrefix = null)
    {
        $cache = $this->getCacheDriver();

        $cachePrefix = $cachePrefix ?? $this->cachePrefix;

        $key = "rememberable.$cachePrefix";

        $cachedKeys = (array) $cache->get($key);

        foreach ($cachedKeys as $key) {
            $cache->forget($key);
        }

        $cache->forget($key);

        return true;
    }
}
