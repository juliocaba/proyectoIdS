<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\InventarioController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\TurnoController;
use App\Http\Controllers\Admin\EstadisticaController;
use App\Http\Controllers\FullCalenderController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/estadistica', function () {
    return view('admin/estadistica/estadistica');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/prueba', [HomeController::class, 'index'])->name('prueba');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('estadistica', EstadisticaController::class, ["as" => 'admin']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('inventarios', InventarioController::class, ["as" => 'admin']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('clientes', ClienteController::class, ["as" => 'admin']);
});

Route::get('stats', [EstadisticaController::class, 'stats']);
Route::get('fullcalender', [FullCalenderController::class, 'index']);
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

Route::group(['prefix' => 'admin'], function () {
    Route::resource('turnos', TurnoController::class, ["as" => 'admin']);
});