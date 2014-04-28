<?php

class CustomersStandingOrdersController extends \BaseController {
    
        protected $standingorders;
        
        public function __construct() {
            $this->standingOrders = new StandingOrders();
        }

	/**
	 * Display list of every standing order for a customer
	 *
	 * @return Response
	 */
	public function index($id,  $limit = 10)
	{
            $offset = 0;
            if(isset($id)){
                return Response::json($this->standingOrders->get($id, $offset, $limit)); 
            }
            else{
                Response::json(array(
                    'error' => 1,
                    'message' => 'request could not be completed'
                ));
            }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Create a new standing order
	 *
	 * @return Response
	 */
	public function store($id)
	{
            $insert = $this->standingOrders->insert($id);   
            if(!isset($insert) || $insert < 0){
                return Response::json(array(
                    'error' => true,
                    'message' => 'the insert could not be completed'
                ));
            }else{
                return Response::json(array(
                    'error' => false,
                    'order' => $insert
                ));
            }
	}

	/**
	 * Display a single standing order for a customer
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $order)
	{
            $result = $this->standingOrders->getDetails($id, $order);
            $etag = $this->standingOrders->getEtag($order);
            
            if(isset($result)){
                //show etags in header to enable locking of resource
                header("Etag: $etag");
                
                return Response::json($result);
            }
            else{
                return Response::json(array(
                    'error' => 'standing order details not found'
                ));
            }            
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}