<?php
namespace Craft;

class Falcon_Node extends \Twig_Node
{

    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("\$falconService = \Craft\craft()->falcon;\n")
            ->write("\$falconService->start();\n")
            ->subcompile($this->getNode('body'))
            ->write("\$falconService->end();\n")
        ;
    }

}
