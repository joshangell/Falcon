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
            // TODO: compile some other kind of tag in here so we can collate extra keys to send to ->end()
            ->subcompile($this->getNode('body'))
            ->write("\$falconService->end();\n")
        ;
    }

}
