<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard');
// });
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/monitor', [App\Http\Controllers\MonitorController::class, 'index'])->name('monitor');

Route::get('/graphic', [App\Http\Controllers\GraphicController::class, 'index'])->name('graphic');

Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');

Route::get('/user/delete', [App\Http\Controllers\DeleteController::class, 'index'])->name('user.delete');

Route::get('/user/edit', [App\Http\Controllers\EditController::class, 'index'])->name('user.edit');

Route::get('/user/admin', [App\Http\Controllers\AddAdminController::class, 'index'])->name('user.admin');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// function () {
//     $id = Auth::id();
//     $loggedin = User::find($id);
//     return view('dashboard', ['loggedin' => $loggedin]);
// }
Route::get('/sensor/export', [App\Http\Controllers\ExportSensorController::class, 'index'])->name('sensor.export') ;

Route::get('/sensor/import', [App\Http\Controllers\ImportSensorController::class, 'show'])->name('sensor.import.show') ;

Route::post('/sensor/import', [App\Http\Controllers\ImportSensorController::class, 'index'])->name('sensor.import') ;

Route::get('/sensor/setstatus/{id}/{status}', [App\Http\Controllers\StatusController::class, 'setSensorStatus'])->name('sensor.status') ;

Auth::routes();

