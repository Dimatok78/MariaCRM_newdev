<?php

namespace System\Internal\Libs;

use System\Internal\Libs\Model;
use System\Internal\Libs\View;

class Controller
{
    public $model;

    public $view;

    function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }
}