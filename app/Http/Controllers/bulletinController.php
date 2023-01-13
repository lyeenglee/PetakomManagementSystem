<?php

namespace App\Http\Controllers;

use App\Models\bulletin;
use Illuminate\Http\Request;

class bulletinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bulletin = bulletin::all();
        return view('ManageBulletin.committeeBulletin')->with('bulletins', $bulletin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManageBulletin.createBulletin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = new bulletin();
        //Request input from POST
        $input->bulletinTitle = $request->bulletinTitle;
        $input->bulletinDescription = $request->bulletinDescription;
        $input->bulletinDate = $request->bulletinDate;

        $input->save();
        return redirect('bulletin')->with('success', 'Bulletin Created!');;
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bulletinID)
    {
        //POST bulleitnID to edit page
        $bulletin = bulletin::find($bulletinID);
        return view('ManageBulletin.editBulletin')->with('bulletins', $bulletin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bulletinID)
    {
        //
        $bulletin = bulletin::find($bulletinID);
        $input = $request->all();
        $bulletin->update($input);

        return redirect('bulletin')->with('success', 'Bulletin Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bulletinID)
    {
        //
        bulletin::destroy($bulletinID);
        return redirect('bulletin')->with('success', 'Bulletin Deleted!');
    }

    //Route
    public function committeeMenu()
    {
        $bulletin = bulletin::all();
        return view('ManageBulletin.committeeBulletin')->with('bulletins', $bulletin);
    }

    public function coordinatorMenu()
    {
        $bulletin = bulletin::all();
        return view('ManageBulletin.Bulletin')->with('bulletins', $bulletin);
    }
    
    public function deanMenu()
    {
        $bulletin = bulletin::all();
        return view('ManageBulletin.Bulletin')->with('bulletins', $bulletin);
    }

    public function hodMenu()
    {
        $bulletin = bulletin::all();
        return view('ManageBulletin.Bulletin')->with('bulletins', $bulletin);
    }

    public function lecturerMenu()
    {
        $bulletin = bulletin::all();
        return view('ManageBulletin.Bulletin')->with('bulletins', $bulletin);
    }

    public function studentMenu()
    {
        $bulletin = bulletin::all();
        return view('ManageBulletin.Bulletin')->with('bulletins', $bulletin);
    }
}
