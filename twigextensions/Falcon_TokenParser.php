<?php
namespace Craft;

/**
 * Class Falcon_TokenParser
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */
class Falcon_TokenParser extends \Twig_TokenParser
{

    // Public Methods
    // =========================================================================

    /**
     * @param \Twig_Token $token
     *
     * @return Falcon_Node
     */
    public function parse(\Twig_Token $token)
    {
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideFalconEnd'), true);
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

        return new Falcon_Node(['body' => $body], [], $token->getLine(), $this->getTag());
    }

    /**
     * @param \Twig_Token $token
     *
     * @return bool
     */
    public function decideFalconEnd(\Twig_Token $token)
    {
        return $token->test('endfalcon');
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return 'falcon';
    }

}
