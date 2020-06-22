<?php

namespace App\Cacheable;

use App\Cacheable\Builder;

trait Cacheable
{

    protected $rememberCachePrefix;

    protected $rememberCacheDriver;

    protected $rememberFor;

    public function initializeCacheable()
    {

        $this->rememberCachePrefix = $this->getTable();

        $this->rememberCacheDriver = 'file';

        $this->rememberFor = -1;
    }

    /**
     * Get a new query builder instance for the connection.
     *
     * @return \App\Cacheable\Builder
     */
    protected function newBaseQueryBuilder()
    {
        $conn = $this->getConnection();

        $grammar = $conn->getQueryGrammar();

        $builder = new Builder($conn, $grammar, $conn->getPostProcessor());

        if (in_array(app()->environment(), ['testing', 'local'])) {
            return $builder;
        }

        if (isset($this->rememberFor)) {
            $builder->remember($this->rememberFor);
        }

        if (isset($this->rememberCacheTag)) {
            $builder->cacheTags($this->rememberCacheTag);
        }

        if (isset($this->rememberCachePrefix)) {
            $builder->prefix($this->rememberCachePrefix);
        }

        if (isset($this->rememberCacheDriver)) {
            $builder->cacheDriver($this->rememberCacheDriver);
        }

        return $builder;
    }

    public static function bootCacheable()
    {
        static::created(function(){
            static::flushCacheables();
        });

        static::updated(function(){
            static::flushCacheables();
        });

        static::deleted(function(){
            static::flushCacheables();
        });
    }

    /**
     * Flush all cached data for this model
     */
    public static function flushCacheables()
    {
        static::flushCachedKeys();
    }
}
