<?php

namespace System\Internal\Core;

class Functions
{

    /**
     * @var array
     */
    public $css_array;

    public function __construct()
    {

    }


    public function setCss($name, $style, $footer = false, $preload = false, $dependence = false)
    {
        $this->css_array[] = array(
                'name' => $name,
                'style' => SITE.$style,
                'in_footer' => $footer,
                'preload' => $preload,
                'depend' => $dependence
            );

        return $this->css_array;
    }
}