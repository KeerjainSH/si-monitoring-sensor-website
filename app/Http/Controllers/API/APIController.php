<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Sensor;
use App\Models\SensorStatus;
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
        $sensors = Sensor::select('created_at', 'sensor1', 'sensor2', 'sensor3', 'sensor4')->orderBy('created_at', 'DESC')->take(5)->get();
        return $sensors ;
    }

    public function addData(Request $request) {

        $status = SensorStatus::all() ;
        foreach($status as $i) {
            if ($i->status == 0 && $i->id == 1) {
                $request->sensor1 = 0 ;
            }
            if ($i->status == 0 && $i->id == 2) {
                $request->sensor2 = 0 ;
            }
            if ($i->status == 0 && $i->id == 3) {
                $request->sensor3 = 0 ;
            }
            if ($i->status == 0 && $i->id == 4) {
                $request->sensor4 = 0 ;
            }
        }
        
        // 1. Datanya ada tapi 0
        // 2. Datanya null
        // 3. Datanya ada dan gak 0 tapi dibaca 0 sama website

        $sensor = Sensor::create([
            'sensor1' => $request->sensor1,
            'sensor2' => $request->sensor2,
            'sensor3' => $request->sensor3,
            'sensor4' => $request->sensor4
        ]) ;
        return $sensor ;
    }
}
