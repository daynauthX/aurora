<?php
class AccountDateController extends \BaseController {
    protected $account;
    
    public function index($id) {
        echo $id;
    }
    
    public function show($id, $start, $end){
        $this->account = new Account();
        return $this->account->getDetailsDate($id, $start, $end);
    }
    

}

