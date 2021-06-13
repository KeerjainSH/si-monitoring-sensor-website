<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorStatus;

class StatusController extends Controller
{
    public function setSensorStatus($id, $status) {
        $sensor = SensorStatus::find($id) ;
        $sensor->update(['status' => $status]) ;
        return back()->withStatus('Status Sensor Berhasil Diubah') ;
    }
}
