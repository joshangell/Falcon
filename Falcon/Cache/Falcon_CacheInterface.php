<?php
namespace Falcon\Cache;

/**
 * Interface Falcon_CacheInterface
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon\Cache
 * @since     0.0.1
 */
interface Falcon_CacheInterface
{
    /**
     * @param array $keys
     *
     * @return mixed
     */
    public function purgeByKeys(array $keys = []);
}