<?php

class ProductsStandingOrdersController extends \BaseController {
    
        private $standingOrders;

        public function __construct() {
            $this->standingOrders = new StandingOrders();
        }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            return 'index';
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
	 * Insert item into standing order
	 *
	 * @return Response
	 */
	public function store($part)
	{ 
            //print_r($insert);  
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	 * Update the details of an item in the standing order
	 *
	 * @param  int  $order
	 * @return Response
	 */
	public function update($order)
	{
            //deleted
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