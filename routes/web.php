<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProposalController;
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


//Manage Proposal
Route::resource("/proposal", ProposalController::class);

//actor activity menu
Route::get('/committee/activity/menu', [App\Http\Controllers\ProposalController::class, 'committeeMenu'])->name('committee_activity_menu');
Route::get('/coordinator/activity/menu', [App\Http\Controllers\ProposalController::class, 'coordinatorMenu'])->name('coordinator_activity_menu');
Route::get('/dean/activity/menu', [App\Http\Controllers\ProposalController::class, 'deanMenu'])->name('dean_activity_menu');

//proposal looping
Route::get('/viewProposal/{proposalID}',[App\http\controllers\ProposalController::class,'coordinatorView'])->name('proposals.coordinatorView');
Route::get('/viewProposal/{proposalID}',[App\http\controllers\ProposalController::class,'deanView'])->name('proposals.deanView');

//committeee activity actions
Route::get('/committee/addProposal', [App\Http\Controllers\ProposalController::class, 'addProposal'])->name('committee_add_proposal');
Route::get('/committee/viewStatus', [App\Http\Controllers\ProposalController::class, 'viewStatus'])->name('committee_view_status');
Route::get('/committee/download', [App\Http\Controllers\ProposalController::class, 'downloadReport'])->name('committee_download_report');

//coordinator activity actions
Route::get('/coordinator/approve', [App\Http\Controllers\ProposalController::class, 'coordinatorApprove'])->name('coordinator_approve_proposal');

//dean activity actions
Route::get('/dean/approve', [App\Http\Controllers\ProposalController::class, 'deanApprove'])->name('dean_approve_proposal');

//Toggle Button for Status
Route::get('users', 'ProposalController@index');
Route::get('changeStatus', 'ProposalController@changeStatus');