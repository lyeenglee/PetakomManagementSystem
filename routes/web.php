<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// student middleware
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
// coordinator middleware
Route::get('/coordinator/home', [App\Http\Controllers\HomeController::class, 'coordinatorHome'])->name('coordinator_home.home')->middleware('coordinator');
// lecturer middleware
Route::get('/lecturer/home', [App\Http\Controllers\HomeController::class, 'lecturerHome'])->name('lecturer_home.home')->middleware('lecturer');
//hod middleware
Route::get('/HOD/home', [App\Http\Controllers\HomeController::class, 'hodHome'])->name('hod_home.home')->middleware('hod');
//commitee middleware
Route::get('/committee/home', [App\Http\Controllers\HomeController::class, 'commiteeHome'])->name('commitee_home.home')->middleware('commitee');
//dean middleware
Route::get('/dean/home', [App\Http\Controllers\HomeController::class, 'deanHome'])->name('dean_home.home')->middleware('dean');

//register

// Route::prefix('coordinator')->middleware('auth')->group(function(){
//     Route::get('/home',[HomeController::class,'coordinatorHome'])->name('coordinator.home');
// });
