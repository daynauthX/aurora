<?php

class StandingOrdersController extends \BaseController {
        private $standingOrders;

        public function __construct(){
            $this->standingOrders = new StandingOrders();
        }
        
	/**
	 * Display all standing order
	 *
	 * @return Response
	 */
	public function index()
	{
            return Response::json(array(
                'error' => 1,
                'message' => 'cannot generate standing order'
            ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            //may not be needed
	}

	/**
	 * create a new standing order
	 *
	 * @return Response
	 */
	public function store()
	{
            //delete
	}

	/**
	 * Display the list of standing order for a customer
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            //return Response::json($this->standingOrders->get($id));
	}

	/**
	 * Show the form for editing a standing order
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            //may not be needed
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $order
	 * @return Response
	 */
	public function update($order)
	{
           
	}

	/**
	 * Remove a standing order
	 *
	 * @param  int  $order
	 * @return Response
	 */
	public function destroy($order)
	{
            if(isset($order)){
                $destroy = $this->standingOrders->remove($order);
                return Response::json(array(
                    "message" => $destroy
                ));               
            }
            else{
                return Response::json(array(
                   'error' => 1,
                    'message' => 'standing order could not be deleted'
                ));
            }

	}

}