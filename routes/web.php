<?php

use App\Http\Controllers\UserController;
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

//manage registration
// student middleware
Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home'); 
// coordinator middleware
Route::get('/coordinator/home', [App\Http\Controllers\UserController::class, 'coordinatorHome'])->name('coordinator_home.home')->middleware('coordinator');
// lecturer middleware
Route::get('/lecturer/home', [App\Http\Controllers\UserController::class, 'lecturerHome'])->name('lecturer_home.home')->middleware('lecturer');
//hod middleware
Route::get('/HOD/home', [App\Http\Controllers\UserController::class, 'hodHome'])->name('hod_home.home')->middleware('hod');
//commitee middleware
Route::get('/committee/home', [App\Http\Controllers\UserController::class, 'commiteeHome'])->name('commitee_home.home')->middleware('commitee');
//dean middleware
Route::get('/dean/home', [App\Http\Controllers\UserController::class, 'deanHome'])->name('dean_home.home')->middleware('dean');
//assign roles
Route::get('/lists',[App\http\controllers\UserController::class,'display'])->name('users.display');
Route::get('/lists/{id}/editRole',[App\http\controllers\UserController::class,'assign'])->name('users.assign');
Route::patch("/lists/{id}/",'App\http\Controllers\UserController@update');
Route::delete("/lists/{id}",'App\http\Controllers\UserController@destroy');