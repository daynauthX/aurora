<?php
class SoapService {
    private $address;
    private $app;
    
    function __construct($name) {
        $this->address = 'http://64.28.139.185/AkiBakeryServices';
        $this->app = new SoapClient($this->address .'/wsdl/' . $name);
    }
    
    function getApp(){
        return $this->app;
    }

}

