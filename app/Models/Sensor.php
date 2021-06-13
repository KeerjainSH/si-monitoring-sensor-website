<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Sensor extends Model
{
    use HasFactory;

    protected $table = 'sensor' ;

    protected $fillable = [
        'sensor1',
        'sensor2',
        'sensor3',
        'sensor4'
    ];

    // public function getCreatedAtAttribute($date)
    // {   
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d H:i:s');
    // }
}
