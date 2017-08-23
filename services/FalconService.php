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
            $this->_elementIds[] = $elementId;
        }

    }

    public function end()
    {
        $this->_elementIds = array_values(array_unique($this->_elementIds));
        HeaderHelper::setHeader([
            'Cache-Control' => 'no-cache',
            'Pragma' => 'no-cache',
            'xkey' => implode(' ', $this->_elementIds)
        ]);
    }

}