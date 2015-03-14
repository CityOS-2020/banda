<?php namespace App\Http\Controllers;

class HomeController extends Controller {

    public function sendGraphData1(){
        $dummyData = ['2', '3', '1', '4', '1', '0', '10', '2', '3', '1', '4', '1', '0', '10', '2', '3', '1', '4', '1', '0', '10'];
        \Log::info('aaa');
        return \Response::json(array('code' => 201, 'data' => $dummyData));
    }
}