<?php
namespace Craft;

/**
 * Class Falcon_AddKey_TokenParser
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */
class Falcon_AddKey_TokenParser extends \Twig_TokenParser
{

    // Public Methods
    // =========================================================================

    /**
     * @param \Twig_Token $token
     *
     * @return Falcon_AddKey_Node
     */
    public function parse(\Twig_Token $token)
    {
        $parser = $this->parser;
        $stream = $parser->getStream();

        $key = $stream->expect(\Twig_Token::STRING_TYPE)->getValue();
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new Falcon_AddKey_Node([], ['key' => $key], $token->getLine(), $this->getTag());
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return 'falcon_addkey';
    }

}
