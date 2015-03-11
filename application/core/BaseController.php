<?php
class BaseController {
    protected $_model;
    protected $_content;
    
    public function __construct() {
        $frontController = FrontController::getInstance();
        $controller =  $frontController->getController();
        $modelName = $controller.'Model';
        $this->_content = $controller.'_view.php';
        $this->_model = new $modelName; 
        
    }
    
    public function actionIndex() {
        
    }

}

