<?php
namespace Craft;

/**
 * Falcon_Templates Service
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */
class Falcon_TemplatesService extends BaseApplicationComponent
{

    // Properties
    // =========================================================================

    /**
     * @var
     */
    private $_elementIds;

    // Public Methods
    // =========================================================================

    /**
     *
     */
    public function start()
    {
        $this->_elementIds = [];
    }

    /**
     * @param $elementId
     */
    public function includeElement($elementId)
    {
        $this->_elementIds[] = 'el:'.$elementId;
    }

    /**
     * @param array $keys
     */
    public function end($keys = [])
    {
        $this->_elementIds = array_values(array_unique($this->_elementIds));

        $combinedKeys = array_merge($this->_elementIds, $keys);
        HeaderHelper::setHeader([
            'xkey' => implode(' ', $combinedKeys)
        ]);

        // XXX DEBUG
        print_r(implode(' ', $combinedKeys));
    }

}