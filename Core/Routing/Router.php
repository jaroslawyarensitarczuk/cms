<?php
namespace Core\Routing;

class Router
{
    const DEFAULT_CONTROLLER = 'default';
    const DEFAULT_METHOD = 'index';

    private $slicedUrl = [];
    private $routeParameters = [];
    private $reflectionObjects = [];
    private $actionArguments = [];

    public function __construct($slicedUrl)
    {
        if(count($slicedUrl) === 0) {
            $this->routeParameters['controller'] = self::DEFAULT_CONTROLLER;
            $this->routeParameters['action'] = self::DEFAULT_METHOD;
        } elseif(count($slicedUrl) === 1) {
            $this->routeParameters['controller'] = $slicedUrl[1];
            $this->routeParameters['action'] = self::DEFAULT_METHOD;
        } else {
            $this->routeParameters['controller'] = $slicedUrl[1];
            $this->routeParameters['action'] = $slicedUrl[2];
        }

        $this->actionArguments = array_values(array_diff($this->slicedUrl, $this->routeParameters));
        $this->routeParameters['controller'] = ucfirst($this->routeParameters['controller']).'Controller';
        $this->routeParameters['action'] .= 'Action';
        $this->slicedUrl = $slicedUrl;;
    }

    public function loadControllerIfExist()
    {
        if(file_exists('Controller/'.$this->routeParameters['controller'].'.php')) {
            $controller = '\Controller\\'.$this->routeParameters['controller'];
            $this->controller = new $controller;
            return true;
        } else {
            return false;
        }
    }

    public function ifControllerHaveActionFromUrl()
    {
        $this->reflectionObjects['controller'] = new \ReflectionClass('\Controller\\'.$this->routeParameters['controller']);
        if($this->reflectionObjects['controller']->hasMethod($this->routeParameters['action'])) {
            return true;
        } else {
            return false;
        }
    }

    public function getNumberOfActionArguments()
    {
        $this->reflectionObjects['action'] = new \ReflectionMethod('\Controller\\'.$this->routeParameters['controller'],
                                                                   $this->routeParameters['action']);
        $this->reflectionObjects['action_argsNumber'] = $this->reflectionObjects['action']->getNumberOfParameters();
    }

    public function run()
    {
        $controller = '\Controller\\'.$this->routeParameters['controller'];
        $controllerInstance = new $controller();
        if($this->reflectionObjects['action_argsNumber'] === 0) {
            call_user_func(array($controllerInstance,
                                 $this->routeParameters['action']));
        } else {
            $actionArgumentsNumber = $this->reflectionObjects['action_argsNumber'];
            $actionArguments = array_splice($this->actionArguments, 0, $actionArgumentsNumber);

            call_user_func_array(array($controllerInstance,
                                       $this->routeParameters['action']),
                                       $actionArguments);
        }
    }

    public function __get($property)
    {
        return $this->$property;
    }
}