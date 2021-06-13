<?php

namespace App\Exports;

use App\Models\Sensor;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Http\Request;

class SensorExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct($mulai, $akhir)
    {
        $this->mulai = $mulai.' 00:00:00' ;
        $this->akhir = $akhir.' 23:59:59' ;
    }

    public function headings(): array
    {
        return [
            'Sensor Amphere (A)',
            'Sensor Tegangan (V)',
            'Sensor Getaran (Hz)',
            'Sensor Thermocouple (°C)',
            'Waktu Masuk'
        ];
    }

    public function query()
    {
        return Sensor::query()
        ->select('sensor1', 'sensor2', 'sensor3', 'sensor4', 'created_at')
        ->where('created_at', '>', $this->mulai)
        ->where('created_at', '<=', $this->akhir) ;
    }
}
