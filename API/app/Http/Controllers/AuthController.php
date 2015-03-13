<?php namespace App\Http\Controllers;

use App\User;
/*
 * Simplicity is the essence of happiness. - Cedric Bledsoe
 */

class AuthController extends Controller {

	public function login()
	{
		$data = \Input::all();
                
                \Log::info($data);
                
                $user = User::find(1);
                
                if($user == TRUE){
                    return Response::json(array('code' => 200, 'logged' => true));
                }else{
                    return Response::json(array('code' => 400, 'logged' => false));
                }
                
	}
}