<?php
/**
 * Falcon plugin for Craft CMS
 *
 * Falcon Twig Extension
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */

namespace Craft;

class FalconTwigExtension extends \Twig_Extension
{

    // Public Methods
    // =========================================================================

    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return \Twig_TokenParserInterface[]
     */
    public function getTokenParsers()
    {
        return [
            new Falcon_TokenParser(),
        ];
    }

    public function getName()
    {
        return 'Falcon';
    }
}