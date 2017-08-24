<?php
namespace Craft;


class Falcon_AddKey_TokenParser extends \Twig_TokenParser
{

    // Public Methods
    // =========================================================================

    public function parse(\Twig_Token $token)
    {
        $parser = $this->parser;
        $stream = $parser->getStream();

        $key = $stream->expect(\Twig_Token::STRING_TYPE)->getValue();
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new Falcon_AddKey_Node([], ['key' => $key], $token->getLine(), $this->getTag());
    }

    public function getTag()
    {
        return 'falcon_addkey';
    }

}
