<?php

declare(strict_types=1);

namespace Gent\ErfgoedcollectiesApi\Cache;

/**
 * Trait to create cache keys.
 *
 * @package Gent\ErfgoedcollectiesApi
 */
trait CacheKeyTrait
{
    /**
     * Create a cache key from an array of parts.
     *
     * @param array $parts
     *   The parts to create the cache key from.
     *
     * @return string
     *   The cache key.
     */
    protected function createCacheKeyFromArray(array $parts): string
    {
        return 'erfgoed_collecties:' . implode(':', $parts);
    }
}
