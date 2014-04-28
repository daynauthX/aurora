<?php

class LoginController extends \BaseController {

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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $rules = array(
                'email' => 'required|email',
                'password' => 'required|alphaNum|min:1'
            );
            
            $validator = Validator::make(Input::all(), $rules);
            
            if($validator->fails()){
                App::abort(406, 'Not Acceptable.');
            }else{
                //create our user data for the authentication
                $userdata = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password')  
                );
                
                //attempt to login 
                if(Auth::attempt($userdata)){
                    $token = Auth::user()->getToken();
                    return Response::json(array('token' => $token));
                }
                else{
                    App::abort(401, 'Not authenticated');
                }
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