<?php namespace App\Http\Controllers;

use GuzzleHttp\Client as Client;

class HomeController extends Controller {
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');
	}
        
        
        public function getGraphData1(){
            $client = new Client(['defaults' => [
                'verify' => false
            ]]);
            $response = $client->get('http://smartlight/graphData1');
           
            return \Response::json(array('code' => 201, 'data' => $response->json()));
        }

}
