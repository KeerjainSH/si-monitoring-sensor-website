<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\SensorExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportSensorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $req) {
        return (new SensorExport($req->input('tglawal'), $req->input('tglakhir')))
        ->download('data.pdf', \Maatwebsite\Excel\Excel::DOMPDF) ;
    }
}
