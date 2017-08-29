<?php
namespace Craft;

/**
 * Class FalconTwigExtension
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */
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
            new Falcon_AddKey_TokenParser(),
        ];
    }

    /**
     * Required but deprecated...
     *
     * @return string
     */
    public function getName()
    {
        return 'Falcon';
    }
}