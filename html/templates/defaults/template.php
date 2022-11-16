<?php

namespace Html\Templates\Defaults;

use System\Internal\Core\Functions;

class template
{
    private $header;

    private $main;

    private $footer;

    private $menu;

    private $css;

    private $js;

    private $functions;

    public function __construct()
    {
        $this->functions = new Functions();

    }

    /**
     *
     */
    public function getCss()
    {
        $this->css = $this->functions->setCss('style','html/templates/defaults/assets/css/style.css');
        $this->css = $this->functions->setCss('style','html/templates/defaults/assets/css/style.css');

    }

}
