<?php

namespace System\Internal\Core;
use System\Internal\Core\Router;

class Bootstrap
{
    public function __construct()
    {
    }

    public function index()
    {
        $router = new \System\Internal\Core\Router();
        $router->start();


    }
}