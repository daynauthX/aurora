<?php
class AccountBalanceController extends \BaseController {
    protected $account;

    public function index($id){
        return $id;
    }
    
    public function show($id, $before){
        $this->account = new Account();
        return $this->account->getBalanceBefore($id, $before);
    }
    

}

