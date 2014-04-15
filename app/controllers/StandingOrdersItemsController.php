<?php

class StandingOrdersItemsController extends \BaseController {
    
    private  $standingOrders;
    
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
		//
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
	 * Add a new item to the standing order
	 *
	 * @return Response
	 */
	public function store($order)
	{
            $part = Request::json('part');
            
            if(!isset($part)){
                return Error::show(1);
            }
            
            $insert = $this->standingOrders->insertItem($part, $order);
            if(isset($insert)){
                return Response::json(array(
                    'message' => $insert
                ));
            }
            else{
                return Error::show(1);
            }
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
	 * Update an item in the standing order
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update($order, $item)
    {
        //echo $order;
        //echo $item;
        //$item = Request::json('item');
        $part = Request::json('part');
        $packs = Request::json('packs');
            
                
        //check if-match header
        $etag = Request::header('if-match');
                
        //compare the etags to determine if standing order was previously modified
        if($etag == null || $etag!== $this->standingOrders->getEtag($order)){
            return Error::show(1);
        }
        
        
        //move forward with the update
        $update = $this->standingOrders->changeItemDetails($order, $item, $part, $packs);
            
        if(isset($update)){
            return Response::json(array(
                'message' => $update
            ));               
       }
       else{
            return Response::json(array(
                'error' => "update could not be completed"
            ));
        } 
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