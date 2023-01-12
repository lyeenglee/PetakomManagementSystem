<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\bulletinController;
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

//Manage Elections
//Menu
Route::get('/committee/election/menu', [ElectionController::class, 'committeeMenu']);
Route::get('/coordinator/election/menu', [ElectionController::class, 'coordinatorMenu']);
Route::get('/dean/election/menu', [ElectionController::class, 'deanMenu']);
Route::get('/hod/election/menu', [ElectionController::class, 'hodMenu']);
Route::get('/lecturer/election/menu', [ElectionController::class, 'lecturerMenu']);
Route::get('/student/election/menu', [ElectionController::class, 'studentMenu']);

//Election- Committee
Route::get('/committee/election/addCandidate', [ElectionController::class, 'committeeAddCandidate']);
Route::post('/committee/election/menu', [ElectionController::class, 'committeeStoreCandidate']);
Route::get('/committee/election/viewCandidate/{id}', [ElectionController::class, 'committeeViewCandidate']);
Route::get('/committee/election/editCandidate/{id}', [ElectionController::class, 'committeeEditCandidate']);
Route::patch('/committee/election/edit/{id}', [ElectionController::class, 'committeeEditCandidateDetails']);
Route::delete('/committee/election/delete/{id}', [ElectionController::class, 'committeeRemoveCandidateDetails']);

//Election- Coordinator
Route::get('/coordinator/election/approveCandidate/{id}', [ElectionController::class, 'coordinatorApproveCandidate']);
Route::patch('/coordinator/election/edit/{id}', [ElectionController::class, 'coordinatorApproveCandidateDetails']);

//Election- Student
Route::get('/student/election/studentViewCandidateMenu', [ElectionController::class, 'studentViewCandidateMenu']);
Route::get('/student/election/viewCandidate/{id}', [ElectionController::class, 'studentViewCandidate']);
Route::get('/student/election/studentVoteCandidateMenu', [ElectionController::class, 'studentVoteCandidatePage']);
Route::patch('/student/election/studentVoteCandidate', [ElectionController::class, 'studentVoteCandidate']);
Route::get('/student/election/studentViewCommitteeMenu', [ElectionController::class, 'studentViewCommitteeMenu']);
Route::get('/student/election/viewCommittee/{id}', [ElectionController::class, 'studentViewCommittee']);

//Election- Dean
Route::get('/dean/election/viewCommittee/{id}', [ElectionController::class, 'deanViewCommittee']);

//Election- HOD
Route::get('/hod/election/viewCommittee/{id}', [ElectionController::class, 'hodViewCommittee']);

//Election- Lecturer
Route::get('/lecturer/election/viewCommittee/{id}', [ElectionController::class, 'lecturerViewCommittee']);

//Manage Bulletin
//Menu
Route::resource("/bulletin", bulletinController::class);
Route::get('/coordinator/bulletin/menu', [bulletinController::class, 'coordinatorMenu']);
Route::get('/dean/bulletin/menu', [bulletinController::class, 'deanMenu']);
Route::get('/hod/bulletin/menu', [bulletinController::class, 'hodMenu']);
Route::get('/lecturer/bulletin/menu', [bulletinController::class, 'lecturerMenu']);
Route::get('/student/bulletin/menu', [bulletinController::class, 'studentMenu']);

//View Bulletin
Route::get('/coordinator/bulletin/menu/viewBulletin/{id}', [bulletinController::class, 'coordinatorMenu']);
Route::get('/dean/bulletin/menu/viewBulletin/{id}', [bulletinController::class, 'deanMenu']);
Route::get('/hod/bulletin/menu/viewBulletin/{id}', [bulletinController::class, 'hodMenu']);
Route::get('/lecturer/bulletin/menu/viewBulletin/{id}', [bulletinController::class, 'lecturerMenu']);
Route::get('/student/bulletin/menu/viewBulletin/{id}', [bulletinController::class, 'studentMenu']);
