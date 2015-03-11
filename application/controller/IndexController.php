<?php

class IndexController extends BaseController {
    
    public function actionIndex() {
        $view = new View();
        $view->render($this->_content);
    }
    
}

