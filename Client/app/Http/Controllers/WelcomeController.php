<?php namespace App\Http\Controllers;

use GuzzleHttp\Client as Client;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('welcome');
	}
        
        public function login(){
            $data = \Input::all();
            $client = new Client(['defaults' => [
                'verify' => false
            ]]);

            $response = $client->post('http://192.168.224.155/login', [
                'body' => [
                    'username' => $data['username'],
                    'password' => $data['password']
                ]
            ]);
            
            $r = $response->json();
            
            if($r['logged'] == false){
                return view('welcome');
            }else{
                return view('home');
            }
        }

}
