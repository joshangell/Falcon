<?php
namespace Craft;

class Falcon_AddKey_Node extends \Twig_Node
{

    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('$context[\'falcon_keys\'][] = "'.$this->getAttribute('key').'"')
            ->raw(";\n")
        ;
    }

}
