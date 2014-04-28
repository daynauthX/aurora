<?php 
  
  class OrderController extends BaseController{
   
   
   
   public function connectClient(){
     $conn = new SoapClient($this->HOST_AND_PORT."/AkiBakeryServices/wsdl/IOrders");
     return $conn;
   }
   
   public function showOrders($custId){/////<-----------Shows the entire Order of the entered Customer Id
     $con_to_orders = $this->connectClient();
     $getOrders = $con_to_orders->GetOrders($this->licence,$custId);
     $array_Orders = [];
     
     
       for($count = 0; $count < $getOrders->size; $count++){
          $array_Orders[$count] = $getOrders->orders[$count];
          
       }//END FOR
       return $array_Orders;
   }//END OF FUNCTION
   
   public function searchOrder($orderId){
   $con_to_orders = $this->connectClient();
   $searchOrders = $con_to_orders->SearchOrder($this->licence,$orderId);
   $array_Orders = array();
     
    $array_Orders["OrderNo"] = $searchOrders->ORDERNO;
    $array_Orders["CustomerNo"] = $searchOrders->CUSTNO;
    $array_Orders["SaleDate"] = $searchOrders->SALEDATE;
    $array_Orders["ShipDate"] = $searchOrders->SHIPDATE;
    $array_Orders["Terms"] = $searchOrders->TERMS;
    $array_Orders["TotalItems"] = $searchOrders->TOTALITEMS;
    $array_Orders["StandingDay"] = $searchOrders->STANDING_DAY;
    $array_Orders["RouteNo"] = $searchOrders->ROUTENO;
    $array_Orders["TotalVat"] = $searchOrders->TOTALVAT;
    $array_Orders["TotalDiscount"] = $searchOrders->TOTALDISCOUNT;
          
    return $array_Orders;
   }//END OF FUNCTION
   
   public function getOrderDetails($custId,$orderId){
    $con_to_orders = $this->connectClient();
    $orderDetail = $con_to_orders->GetOrderDetails($this->licence,$custId,$orderId);
    $array_Orders = array();
    
     for($count = 0; $count < $orderDetail->size; $count++){
      $array_Orders[$count] = $orderDetail->orderdetails[$count];
      
       }////END_OF_FOR

       return $array_Orders;
   }////END OF FUNCTION
   
   public function insertNewOrder($custNo){
     $con_to_orders = $this->connectClient();
     $newOrder = $con_to_orders->insertNewOrder($this->licence,$custNo);
     return $newOrder;
   }
   public function changeDate($standingOrderDay,$productionDay){
   $con_to_orders = $this->connectClient();
   $changeOrderDate = $con_to_orders->changeDateforOrders($this->licence,$standingOrderDay,$productionDay);
     return $changeOrderDate;
     
   }//END_OF_FUNCTION
   
   public function deleteAll($productionDay){
    $con_to_orders = $this->connectClient();
    $deleteItems = $con_to_orders->deleteAllOrdersForDay($this->licence,$productionDay);
    
    return $deleteItems;
   }
   public function finishGoodsInvoice($productionDay,$orderNo,$productionId){
     $con_to_orders = $this->connectClient();
     $finishGoodsInvoice = $con_to_orders->ProduceFinishGoodsInvoice($this->licence,$productionDay,$orderNo,$productionId);
     
     return $finishGoodsInvoice;
   }
  }////END_OF_CLASS