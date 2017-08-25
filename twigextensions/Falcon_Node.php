<?php
namespace Craft;

class Falcon_Node extends \Twig_Node
{

    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("\$falconService = \Craft\craft()->falcon_templates;\n")
            ->write("\$falconService->start();\n")
            ->subcompile($this->getNode('body'))
            ->write("\$keys = [];")
            ->write("if (isset(\$context['falcon_keys']) && is_array(\$context['falcon_keys'])) {\n")
                ->indent()
                ->write("\$keys = \$context['falcon_keys'];\n")
            ->write("}\n")
            ->write("\$falconService->end(\$keys);\n")
        ;
    }

}
