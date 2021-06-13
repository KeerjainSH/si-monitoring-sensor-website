<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\SensorImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportSensorController extends Controller
{
    public function show() {
        return view('monitor') ;
    }

    public function index(Request $req) {
        $file = $req->file('excelFile') ;

        (new SensorImport)->import($file) ;

        return back()->withStatus('Import Sensor Berhasil') ;
    }
}
