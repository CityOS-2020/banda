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
        public function getGraphData2(){ // Energy saved
            $y = responseGet();
            $percent = $y/4;
            $percent_friendly = number_format( $percent * 100, 2 ) . '%';
         
            return $percent_friendly;
        }
        public function getGraphData3(){ // Money Saved
            $y = responseGet();
            $percent = $y/1000;
            $percent_friendly = number_format( $percent * 100, 2 ) . '%';
            
            return $percent_friendly;
        }
        private function responseGet(){
            $client = new Client(['defaults' => [
                'verify' => false
            ]]);
            $response = $client->get('http://smartlight/graphData1');
            
            return \Response::json(array('code' => 201, 'data' => $response->json()));
        }

}
