<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
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

//Manage Activity
Route::resource("/activity", ActivityController::class);
Route::get('/coordinator/activity/menu', [App\Http\Controllers\ActivityController::class, 'coordinatorMenu'])->name('coordinator_activity_menu');
Route::get('/dean/activity/menu', [App\Http\Controllers\ActivityController::class, 'deanMenu'])->name('dean_activity_menu');
Route::get('/HOD/activity/menu', [App\Http\Controllers\ActivityController::class, 'HODMenu'])->name('HOD_activity_menu');
Route::get('/lecturer/activity/menu', [App\Http\Controllers\ActivityController::class, 'lecturerMenu'])->name('lecturer_activity_menu');
Route::get('/student/activity/menu', [App\Http\Controllers\ActivityController::class, 'studentMenu'])->name('student_activity_menu');

Route::get('/viewActivity/{id}/coordinatorView',[App\http\controllers\ActivityController::class,'coordinatorView'])->name('activities.coordinatorView');
Route::get('/viewActivity/{id}/deanView',[App\http\controllers\ActivityController::class,'deanView'])->name('activities.deanView');
Route::get('/viewActivity/{id}/HODView',[App\http\controllers\ActivityController::class,'HODView'])->name('activities.HODView');
Route::get('/viewActivity/{id}/lecturerView',[App\http\controllers\ActivityController::class,'lecturerView'])->name('activities.lecturerView');
Route::get('/viewActivity/{id}/studentView',[App\http\controllers\ActivityController::class,'studentView'])->name('activities.studentView');

//Manage Elections
Route::get('/committee/election/menu', [App\Http\Controllers\ElectionController::class, 'committeeMenu'])->name('election_menu_comittee');
