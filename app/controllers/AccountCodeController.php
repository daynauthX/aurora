<?php

class AccountCodeController extends \BaseController {
    protected $account;
    
    public function index($id){
        return 'showing';
    }
    
    public function show($id, $code){
            $this->account = new Account();
            echo ($this->account->getDetailsCode($id, $code));
    }
}

