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
        // By the time we get to here we want to also have collected any custom keys that
        // were set for this template, they could be set anywhere in the hierarchy
        // and thus will need to be sent using another twig tag I guess, like:
        // `{{ falcon_add_key 'section:news' }}`
        //
        // Then on entry save we can send a purge with key 'section:handle' for new entries
        //
        // Worth noting that multiple keys can be set on the response headers to tag one item
        // multiple times and on the PURGE request headers to purge multiple tags at once

        $this->_elementIds = array_values(array_unique($this->_elementIds));
        HeaderHelper::setHeader([
            'xkey' => implode(' ', $this->_elementIds)
        ]);
    }

}