<?php namespace App\Http\Controllers;

use App\User;
/*
 * Simplicity is the essence of happiness. - Cedric Bledsoe
 */

class AuthController extends Controller {

	public function login()
	{
		$data       = \Input::all();
                $username   = $data['username'];
                $password   = $data['password'];
                 
                if(\Auth::attempt(
                    ['name' => $username, 
                    'password' => $password])
                ){
                    return \Response::json(array('code' => 200, 'logged' => true));
                }else{
                    return \Response::json(array('code' => 400, 'logged' => false));
                }
	}
}