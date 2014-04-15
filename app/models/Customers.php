<?php
class Customers {
    private $id;
    private $standingOrders;
    
    function __construct($id) {
        $this->id = $id;
        $this->standingOrders = new StandingOrders();
    }
    
    function getStandingOrders($order){
        
    }

}

