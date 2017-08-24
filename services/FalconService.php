<?php
/**
 * Falcon plugin for Craft CMS
 *
 * Falcon Service
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */

namespace Craft;

class FalconService extends BaseApplicationComponent
{

    private $_elementIds;


    public function start()
    {
        $this->_elementIds = [];
    }

    /**
     * @param BaseElementModel $element
     */
    public function includeElement(BaseElementModel $element)
    {

        $elementId = $element->id;

        if ($elementId)
        {
            $this->_elementIds[] = 'el:'.$elementId;
        }

    }

    public function end($keys = [])
    {
        $this->_elementIds = array_values(array_unique($this->_elementIds));

        $combinedKeys = array_merge($this->_elementIds, $keys);
        HeaderHelper::setHeader([
            'xkey' => implode(' ', $combinedKeys)
        ]);

        // DEBUG
        print_r(implode(' ', $combinedKeys));
    }

}