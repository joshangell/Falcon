<?php
namespace Craft;


class Falcon_TokenParser extends \Twig_TokenParser
{

    // Public Methods
    // =========================================================================

    public function parse(\Twig_Token $token)
    {
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideFalconEnd'), true);
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

        return new Falcon_Node(['body' => $body], [], $token->getLine(), $this->getTag());
    }

    public function decideFalconEnd(\Twig_Token $token)
    {
        return $token->test('endfalcon');
    }

    public function getTag()
    {
        return 'falcon';
    }

}
