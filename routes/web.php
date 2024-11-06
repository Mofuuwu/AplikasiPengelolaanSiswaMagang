<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SekolahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UnitKerjaController;
use App\Models\Jurusan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::resource('schools', SekolahController::class);
Route::resource('workunits', UnitKerjaController::class);
Route::resource('majors', JurusanController::class);
Route::resource('students', SiswaController::class);

