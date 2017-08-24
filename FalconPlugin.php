<?php
/**
 * Falcon plugin for Craft CMS
 *
 * Make Craft fly.
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */

namespace Craft;

class FalconPlugin extends BasePlugin
{
    /**
     * @return mixed
     */
    public function init()
    {
        parent::init();
        $this->_registerEventHandlers();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
         return Craft::t('Falcon');
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return Craft::t('Make Craft fly.');
    }

    /**
     * @return string
     */
    public function getDocumentationUrl()
    {
        return 'https://github.com/joshangell/falcon/blob/master/README.md';
    }

    /**
     * @return string
     */
    public function getReleaseFeedUrl()
    {
        return 'https://raw.githubusercontent.com/joshangell/falcon/master/releases.json';
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return '0.0.1';
    }

    /**
     * @return string
     */
    public function getSchemaVersion()
    {
        return '0.0.1';
    }

    /**
     * @return string
     */
    public function getDeveloper()
    {
        return 'Josh Angell';
    }

    /**
     * @return string
     */
    public function getDeveloperUrl()
    {
        return 'https://angell.io';
    }

    /**
     * @return bool
     */
    public function hasCpSection()
    {
        return false;
    }

    /**
     * @return mixed
     */
    public function addTwigExtension()
    {
        Craft::import('plugins.falcon.twigextensions.Falcon_AddKey_TokenParser');
        Craft::import('plugins.falcon.twigextensions.Falcon_AddKey_Node');
        Craft::import('plugins.falcon.twigextensions.Falcon_TokenParser');
        Craft::import('plugins.falcon.twigextensions.Falcon_Node');
        Craft::import('plugins.falcon.twigextensions.FalconTwigExtension');

        return new FalconTwigExtension();
    }

    /**
     * Register the event handlers.
     */
    private function _registerEventHandlers()
    {
        craft()->on('elements.onSaveElement', function(Event $event) {
            $element = $event->params['element'];
            $isNewElement = $event->params['isNewElement'];


            // PURGE
            // 1. Send to service
            // 2. In service, add to Task


            //            MATRIX?


        });
    }
}