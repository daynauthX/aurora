<?php
class Account {
    private $service;
    private $licence;
    private $app;
    
    public function __construct(){
        $this->service = new SoapService('IAccounts');     
        $this->app = $this->service->getApp();
        $this->licence = 'AkiProData';
    }
    
    public function getDetails($id){
        $details = $this->app->GetAccountDetails($this->licence, $id);
        return isset($details)? json_encode($details->accountdetails) : json_encode(null);
    }
    
    public function getDetailsCode($id, $code){
        $details = $this->app->GetAccountDetailsByCode($this->licence, $id, $code);
        return isset($details)? json_encode($details->accountdetails) : json_encode(null);
    }
    
    public function getDetailsDate($id, $start, $end){
        $details = $this->app->GetAccountDetailsForPeriod($this->licence, $id, 
                            DateHelper::fromString($start), DateHelper::fromString($end));
        return isset($details)? json_encode($details->accountdetails) : json_encode(null);
    }
    
    public function getBalanceBefore($id, $before){
        $balance = $this->app->	GetAccountBalanceBefore($this->licence, $id, DateHelper::fromString($before));
        return isset($balance)? json_encode($balance) : json_encode(null);  
    }
}
