<?php namespace App\Http\Controllers;

use App\Graph1;

class HomeController extends Controller {

    public function sendGraphData1(){
        $db = Graph1::select('value')->take(1)->orderBy('id', 'DESC')->get();
        
        foreach ($db as $d){
           $data[] =  $d->value;
        }
        
      //  \Log::info($data);
        return \Response::json(array('code' => 201, 'data' => $data));
    }
    
    public function getGraphData1($val = null){
        $graph1 = new Graph1;

        $graph1->value = $val;

        $graph1->save();
        \Log::info('saved: '.$val);
    }
}
