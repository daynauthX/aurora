<?php
/**
 * Model to hold information for all standing orders
 * 
 * todo: split into more specialized models
 */
class StandingOrders {
    protected $soap;
    protected $licence;
    
    function __construct() {
        $this->soap = Soap::start('IStandingOrders');
        $this->licence = Soap::licence();
    }
    
    //get all standing orders for a customer
    public function get($id, $offset = 0, $limit = 10){
        $cache_id = "customer_" . $id;
        $so = null;
        
        //get standing order from cache
        if(Cache::has($cache_id)){
            $so = Cache::get($cache_id);
        }
        else{
            $so = $this->soap->GetStandingOrders($this->licence, $id);
            Cache::put($cache_id, $so, 60);
        }
        return isset($so) ? array_slice($so->orders, $offset, $limit): null;
    }
    
    //get the details of a single standing order
    public function getDetails($id, $order){
        $cache_id = "standingorder_" . $order;
        $so = null;
        
        //get standing order from cache if it exist
        if(Cache::has($cache_id)){
            $so =  Cache::get($cache_id);
        }
        else{
            //echo "reading from server";
            //else make call to soap service and then add to cache
            $so = $this->soap->GetStandingOrderDetails($this->licence, $id, $order);
            Cache::put($cache_id, $so, 60);
            
        }
        return isset($so)? $so->orderdetails: null;
    }
    
    //insert a new standing order for a customer
    public function insert($id){
        $cache_id = "customer_" . $id;
        
        $so = $this->soap->insertNewStandingOrder($this->licence, $id);
        
        //clear the cache when a new standing order is being inserted
        if(Cache::has($cache_id)){
            Cache::forget($cache_id);
        }
        
        return $so;
    }
    
    //delete a standing order from a customer
    public function remove($order){
        $cache_id = "standingorder_" . $order;
        
        //remove standing order from cache
        if(Cache::has($cache_id)){
            Cache::forget($cache_id);
        }
        
        $so = $this->soap->removeStandingOrder($this->licence, $order);
        return $so;
    }
    
    public function insertItem($part, $order){
        $cache_id = "standingorder_" . $order;
        
        //remove standing order from cache
        if(Cache::has($cache_id)){
            Cache::forget($cache_id);
        }
        
        $so = $this->soap->insertItemInToStandingOrder($this->licence, $part, $order);
        return $so;
    }
    
    public function changeItemDetails($order, $item, $part, $packs){        
        $so = $this->soap->changeItemDetails($this->licence, $order, $item, $part, $packs);
        
        //change the date modified field in the standing orders table
        DB::update('update standingorders set DateModified = NOW() where StandingOrdersId = ?', array($order));
        
        return $so;
    }
    
    public function calculateTotal($order){
        return 0;
    }
    
    public function deleteItem($part, $order){
        
    }
    
    public function getEtag($order){
        $query = DB::select('select DateModified from standingorders where StandingOrdersId = ?', array($order));
        return md5($query[0]->DateModified);
    }
}

