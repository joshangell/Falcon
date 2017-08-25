<?php
namespace Craft;

use Falcon\Cache\Falcon_VarnishCache;

/**
 * Falcon Service
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */
class FalconService extends BaseApplicationComponent
{

    // Public Methods
    // =========================================================================

    /**
     * @param $elementId
     *
     * @return bool
     */
    public function purgeById($elementId)
    {

        // 1. Load up the configured cache interface
        $cacheComponent = new Falcon_VarnishCache();

        // 2. Send the element ID to it
        $cacheComponent->purgeByKeys([ 'el:'.$elementId ]);

        // 3. Fail silently ...
        return true;

    }

}