<?php

namespace App\Imports;

use App\Models\Sensor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SensorImport implements ToModel, WIthHeadingRow
{
    use Importable ;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sensor([
            'sensor1' => $row['sensor1'],
            'sensor2' => $row['sensor2'],
            'sensor3' => $row['sensor3'],
            'sensor4' => $row['sensor4']
        ]);
    }
}
