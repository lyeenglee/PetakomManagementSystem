<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('ManageRegistration.home');
    }

    public function coordinatorHome()
    {
        return view('ManageRegistration.coordinator_home');
    }

    public function commiteeHome()
    {
        return view('ManageRegistration.commitee_home');
    }

    public function deanHome()
    {
        return view('ManageRegistration.dean_home');
    }

    public function lecturerHome()
    {
        return view('ManageRegistration.lecturer_home');
    }

    public function hodHome()
    {
        return view('ManageRegistration.hod_home');
    }
}
