<?php
class Soap {
    public static function start($service){
        $address = 'http://64.28.139.185/AkiBakeryServices';
        return new SoapClient($address .'/wsdl/' . $service);
    }
    
    public static function licence(){
        return 'AkiProData';
    }
}
