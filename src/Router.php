<?php

namespace Project;

class Router
{

    const DEFAULT_METHOD = 'home';
    const DEFAULT_CONTROLLER = "";

    public function __construct()
    {
        $this->getUrl();
        $this->setController();
        $this->setMethod();
        $this->getControllerView();
    }

    public function getUrl()
    {
        $page = filter_input(INPUT_GET, 'page');
        if (!isset($page)) {
            $page = DEFAULT_CONTROLLER;
        }
        $this->controller = $page;

        $method = filter_input(INPUT_GET, 'action');
        if (!isset($method)) {
            $method = DEFAULT_METHOD;
        }
        $this->method = $method;
    }

    public function setController()
    {
        $this->controller = 'Project\controller\\' . $this->controller . 'Controller';
        if (!class_exists($this->controller)) {
            $this->controller = 'Project\controller\Controller';
        }

    }

    public function setMethod()
    {
        if (!method_exists($this->controller, $this->method)) {
            $this->method = self::DEFAULT_METHOD;
        }
    }

    public function getControllerView()
    {
        $this->controller = new $this->controller;
        $reponse = call_user_func([$this->controller, $this->method]);

        echo filter_var($reponse);

    }
}