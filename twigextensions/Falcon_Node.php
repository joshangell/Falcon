<?php
namespace Craft;

/**
 * Class Falcon_Node
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */
class Falcon_Node extends \Twig_Node
{

    /**
     * @param \Twig_Compiler $compiler
     */
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
