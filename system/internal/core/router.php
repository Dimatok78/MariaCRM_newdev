<?php

namespace System\Internal\Core;
use http\Params;

class Router
{

    private $url = array();

    public function start()
    {
        $modules = 'modules';

        //Переменная модуля. По умолчанию 'login'
        $module = 'login';
        //Переменная модели. По умолчанию 'login'
        $model = 'login';
        //Переменная контролера. По умолчанию 'login'
        $controller = 'login';
        //Переменная метода. По умолчанию 'index'
        $action = 'index';
        //Переменная идентификатора записи, для открытия карточки объекта. По умолчанию null
        $dataID = null;

        // Разбираем строку браузера
        $this->url = explode( '/', $_SERVER['REQUEST_URI'] );

        if ( !empty( $this->url[2] ) ) { // Если задана первая часть ссылки после домена
            $module = $this->url[2];
        }

        if ( !empty( $this->url[3] ) ) { // Если задана вторая часть ссылки после домена
            $model = $this->url[3];
            $controller = $this->url[3];
        }

        if ( !empty( $this->url[4] ) ) { // Если задана третья часть ссылки после домена
            $action = $this->url[4];
        }

        if ( !empty( $this->url[5] ) ) { // Если задана четвертая часть ссылки после домена
            $dataID = $this->url[5];
        }

        $controllerName = ucfirst( $modules ).'\\'.ucfirst( $module ).'\\Controllers\\'.ucfirst($controller);
        $actionName = 'action_'.$action;

        if ( method_exists( $controllerName, $actionName ) ) {
            $newClass = new $controllerName;
            if ( !empty($dataID) ) {
                $newClass->$actionName($dataID);
            } else {
                $newClass->$actionName();
            }
        } else {
            echo "<p>Требуемый метод или класс не найдены!</p>".PHP_EOL;
        }
    }
}