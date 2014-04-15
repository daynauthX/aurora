<?php
class ClassName {
    private $cust_id;
    private $order_id;
    private $items;
    private $date_modified;
    
    
    function __construct($cust_id, $order_id) {
        $this->cust_id = $cust_id;
        $this->order_id = $order_id;
        
        //get date modified from database
        $this->date_modified = DB::select('select DateModified from standingorders where StandingOrdersId = ', array($order_id));
    }
    
}

