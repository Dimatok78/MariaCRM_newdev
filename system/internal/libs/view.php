<?php

namespace System\Internal\Libs;

use Html\Templates\Defaults\template;

class View
{
    public $template;

    public function __construct()
    {
        $this->template = new template();
    }

    public function generate()
    {
    }
}