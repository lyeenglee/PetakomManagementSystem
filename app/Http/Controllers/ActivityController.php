<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

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
        $input = new Activity();
        $posterUrl=$request->posterUrl;
        $filename=time().'.'.$posterUrl->getClientOriginalExtension();
        $request->posterUrl->move('activityAssets',$filename);

        $input->activityName = $request->activityName;
        $input->activityDescription = $request->activityDescription;
        $input->activityStatus = $request->activityStatus;
        $input->startDate = $request->startDate;
        $input->endDate = $request->endDate;
        $input->startTime = $request->startTime;
        $input->endTime = $request->endTime;
        $input->activityVenue = $request->activityVenue;
        $input->grantAmount = $request->grantAmount;
        $input->proposalUrl = $request->proposalUrl;
        $input->posterUrl = $filename;

        $input->save();

        // $input = $request->all();
        // Activity::create($input);
        return redirect('activity')->with('flash_message', 'Activity Addedd!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show($activityID)
    {
        $activity= Activity::find($activityID);
        return view('ManageActivity.committee_view_activity')->with('activities', $activity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit($activityID)
    {
        $activity = Activity::find($activityID);
        return view('ManageActivity.committee_update_activity')->with('activities', $activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $activityID)
    {
        $activity = Activity::find($activityID);
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
    public function destroy($activityID)
    {
        Activity::destroy($activityID);
        return redirect('activity')->with('flash_message', 'Activity deleted!');  
    }

    public function coordinatorMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.coordinator_activity_menu')->with('activities', $activity);
    }

    public function coordinatorView($activityID)
    {
        $activity= Activity::find($activityID);
        return view('ManageActivity.coordinator_view_activity')->with('activities', $activity);
    }

    public function deanMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.dean_activity_menu')->with('activities', $activity);
    }

    public function deanView($activityID)
    {
        $activity= Activity::find($activityID);
        return view('ManageActivity.dean_view_activity')->with('activities', $activity);
    }

    public function HODMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.HOD_activity_menu')->with('activities', $activity);
    }

    public function HODView($activityID)
    {
        $activity= Activity::find($activityID);
        return view('ManageActivity.HOD_view_activity')->with('activities', $activity);
    }

    public function lecturerMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.lecturer_activity_menu')->with('activities', $activity);
    }

    public function lecturerView($activityID)
    {
        $activity= Activity::find($activityID);
        return view('ManageActivity.lecturer_view_activity')->with('activities', $activity);
    }

    public function studentMenu()
    {
        $activity = Activity::all();
        return view('ManageActivity.student_activity_menu')->with('activities', $activity);
    }

    public function studentView($activityID)
    {
        $activity= Activity::find($activityID);
        return view('ManageActivity.student_view_activity')->with('activities', $activity);
    }
}
