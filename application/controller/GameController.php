<?php
class GameController extends BaseController {
    
protected $_data = array();
    
    function actionGo() {
        $this->_data['keyword'] = htmlspecialchars($_POST['keyword']);
        $this->_data['price'] = htmlspecialchars($_POST['price']);
        $model = $this->_getModel();
        $model->setData($this->_data);
        $result = $model->getResult();
        print $result;
    }
    
    /**
     * return GameModel
     */
    private function _getModel() {
        return $this->_model;
    }
}
