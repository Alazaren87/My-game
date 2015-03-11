<?php

class GameModel extends BaseModel {

    protected $_data;

    public function setData($data) {
        $this->_data = $data;
    }

    /**
     * @return bool game result 
     */
    public function getResult() {

        $price = $this->_getPrice();
        $userPrice = (float) $this->_data['price'];
        $difference = $price - $userPrice;
        $difference = (float) $difference;
        $percent = $difference / $price * 100;
        if ($percent < 0) {
            $percent = $percent * -1;
        }
        
        if ($percent <= 20) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return float price 
     */
    private function _getPrice() {

        $url = 'http://www.amazon.com/dp/' . $this->_data['keyword'];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36');
        $file = curl_exec($ch);
        curl_close($ch);

        $document = phpQuery::newDocument($file);
        $priceString = $document->find('#priceblock_ourprice')->text();

        preg_match('/^.*?([0-9]+?\.?[0-9]*?$)/', $priceString, $r);

        $price = (float) $r[1];

        return $price;
    }

}
