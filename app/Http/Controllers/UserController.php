<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
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

    public function display()
    {
        $user = User::all();
        return view('ManageRegistration.userList')->with('user', $user);
    }

    public function assign($id)
    {
        $user = User::find($id);
        return view('ManageRegistration.editRole')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $user->update($input);
        return redirect('/lists')->with('flash_message', 'Updated!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/lists')->with('success', 'deleted!'); 
    }
}
