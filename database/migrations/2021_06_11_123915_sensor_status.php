<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SensorStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensorstatus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status');
        });

        $sensors = array(
            array('name' => 'Sensor Arus', 'status' => 1), 
            array('name' => 'Sensor Tegangan', 'status' => 1), 
            array('name' => 'Sensor Getaran', 'status' => 1), 
            array('name' => 'Sensor Thermocouple', 'status' => 1) 
         ) ;
         
         foreach($sensors as $sensor) {
             DB::table('sensorstatus')->insert(
                 $sensor
             ) ;
         }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensorstatus');
    }
}
