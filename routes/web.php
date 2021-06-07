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


Auth::routes();

