<?php

use App\Http\Controllers\DESController;
use Illuminate\Support\Facades\Route;

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

Route::get('/chiasekhoa', [DESController::class, 'index']);
Route::post('/chiasekhoa', [DESController::class, 'chiasekhoa']);
Route::get('/khoiphuckhoa', [DESController::class, 'khoiphuckhoa']);
Route::post('/khoiphuckhoa', [DESController::class, 'khoiphuc']);
Route::get('/mahoades', [DESController::class, 'mahoa']);
Route::post('/mahoades', [DESController::class, 'mahoades']);
Route::post('/giaimades', [DESController::class, 'giaimades']);
