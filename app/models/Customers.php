<?php
class Customers {
    protected $soap;
    protected $licence;
    
    function __construct() {
        $this->soap = Soap::start('ICustomers');
        $this->licence = Soap::licence();
    }
    
    /**
     * 
     * @param type $name
     * @return array
     */
    function find($name){
        $cust = $this->soap->SearchForCustomerByName($this->licence, $name);
        return isset($cust) ? $cust->customers : null;
    }
}

