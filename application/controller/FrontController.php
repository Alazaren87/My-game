<?php

class FrontController {
    static $_instance;
    protected $_controller;
    protected $_action;
    
    /**
     * 
     * @return FrontController 
     */
    public static function getInstance(){
        if(self::$_instance instanceof self) {
            return self::$_instance;
        } else {
            self::$_instance = new self;
            return self::$_instance;
        }
    }


    private function __construct (){

        $uri = $_SERVER['REQUEST_URI'];
        $routes = explode('/', $uri);
        
        if(!empty($routes[1])) {
            $this->_controller = ucfirst(strtolower($routes[1]));
        } else {
            $this->_controller = 'Index';
        }
        
        if (!empty($routes[2])) {
            $this->_action  = ucfirst(strtolower($routes[2]));
        } else {
            $this->_action = 'Index';
        }

    }

    public function route(){
        $controllerName = $this->_controller.'Controller';
        $actionName = 'action'.$this->_action;
        
        if (class_exists($controllerName)) {
            $controller = new $controllerName;
        } else {
            $ex = new Exception('404');
            throw $ex;
        }
        
        
        
        if (method_exists($controller, $actionName)) {
            $controller->$actionName();
        } else {
            $ex = new Exception('404');
            throw $ex;
        }
        

    }
    
    public function getController() {
        return $this->_controller;
    }
    
    
    
} 