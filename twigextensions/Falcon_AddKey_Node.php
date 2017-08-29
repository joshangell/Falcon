<?php
namespace Craft;

/**
 * Class Falcon_AddKey_Node
 *
 * @author    Josh Angell
 * @copyright Copyright (c) 2017 Josh Angell
 * @link      https://angell.io
 * @package   Falcon
 * @since     0.0.1
 */
class Falcon_AddKey_Node extends \Twig_Node
{

    /**
     * @param \Twig_Compiler $compiler
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write('$context[\'falcon_keys\'][] = "'.$this->getAttribute('key').'"')
            ->raw(";\n")
        ;
    }

}
