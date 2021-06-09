<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    // $dateFormat = 'U' ;
    public function fetchData(){
        $sensors = Sensor::orderBy('created_at', 'DESC')->take(10)->get();
        // dd($sensors);
        return $sensors;
    }

    public function getGraphicData() {
        $sensors = Sensor::select('created_at', 'sensor1', 'sensor2', 'sensor3', 'sensor4', 'sensor5')->orderBy('created_at', 'DESC')->take(5)->get();
        return $sensors ;
    }
}
