<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = Activity::all();
        return view('ManageActivity.committee_activity_menu')->with('activities', $activity);;
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ManageActivity.committee_add_new_activity');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Activity::create($input);
        return redirect('activity')->with('flash_message', 'Activity Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activity= Activity::find($id);
        return view('ManageActivity.committee_view_activity')->with('activities', $activity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::find($id);
        return view('ManageActivity.committee_update_activity')->with('activities', $activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activity = Activity::find($id);
        $input = $request->all();
        $activity->update($input);
        return redirect('activity')->with('flash_message', 'activity Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::destroy($id);
        return redirect('activity')->with('flash_message', 'Activity deleted!');  
    }

    public function coordinatorMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.coordinator_activity_menu')->with('activities', $activity);
    }

    public function coordinatorView($id)
    {
        $activity= Activity::find($id);
        return view('ManageActivity.coordinator_view_activity')->with('activities', $activity);
    }

    public function deanMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.dean_activity_menu')->with('activities', $activity);
    }

    public function deanView($id)
    {
        $activity= Activity::find($id);
        return view('ManageActivity.dean_view_activity')->with('activities', $activity);
    }

    public function HODMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.HOD_activity_menu')->with('activities', $activity);
    }

    public function HODView($id)
    {
        $activity= Activity::find($id);
        return view('ManageActivity.HOD_view_activity')->with('activities', $activity);
    }

    public function lecturerMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.lecturer_activity_menu')->with('activities', $activity);
    }

    public function lecturerView($id)
    {
        $activity= Activity::find($id);
        return view('ManageActivity.lecturer_view_activity')->with('activities', $activity);
    }

    public function studentMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.student_activity_menu')->with('activities', $activity);
    }

    public function studentView($id)
    {
        $activity= Activity::find($id);
        return view('ManageActivity.student_view_activity')->with('activities', $activity);
    }
}
