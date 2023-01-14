<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $calendar = Calendar::all();
        return view('ManageCalendar.calendar')->with('calendar', $calendar);;

        $calendar = User::get();
        return view('calendar',compact('calendar'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $calendar = Calendar::find($id);
        return view('ManageCalendar.view_date_activity')->with('calendar', $calendar);

     
    }

    //Calendar View Activity
    public function downloadActivityDet()
    {
        $calendar = Calendar::all();
        return view('ManageCalendar.view_date_activity')->with('calendar', $calendar);
    }

    public function coordinatorMenu()
    {
        $calendar = Calendar::all();
        return view('ManageCalendar.calendar')->with('calendar', $calendar);
    }

    public function committeeMenu()
    {
        $calendar = Calendar::all();
        return view('ManageCalendar.calendar')->with('calendar', $calendar);
    }

    public function lecturerMenu()
    {
        $calendar = Calendar::all();
        return view('ManageCalendar.calendar')->with('calendar', $calendar);
    }

    public function hodMenu()
    {
        $calendar = Calendar::all();
        return view('ManageCalendar.calendar')->with('calendar', $calendar);
    }

    public function studentMenu()
    {
        $calendar = Calendar::all();
        return view('ManageCalendar.calendar')->with('calendar', $calendar);
    }

}
