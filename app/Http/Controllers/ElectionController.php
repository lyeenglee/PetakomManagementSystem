<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //All route destination here 
    public function committeeMenu()
    {
        $electionList = Election::all();
        return view('ManageElection.election_menu_comittee')->with('electionList', $electionList);
    }

    public function coordinatorMenu()
    {
        $electionList = Election::all();
        return view('ManageElection.election_menu_coordinator')->with('electionList', $electionList);
    }

    public function deanMenu()
    {
        $electionList = Election::all();
        return view('ManageElection.election_menu_dean')->with('electionList', $electionList);
    }

    public function hodMenu()
    {
        $electionList = Election::all();
        return view('ManageElection.election_menu_hod')->with('electionList', $electionList);
    }

    public function lecturerMenu()
    {
        $electionList = Election::all();
        return view('ManageElection.election_menu_lecturer')->with('electionList', $electionList);
    }

    public function studentMenu()
    {
        $electionList = Election::all();
        return view('ManageElection.election_menu_student')->with('electionList', $electionList);
    }

    public function committeeAddCandidate()
    {
        $electionList = Election::all();
        return view('ManageElection.committee_add_candidate');
    }

    public function committeeStoreCandidate(Request $request){
        $input = new Election();

        //get the image 
        $electionImage=$request->electionImage;
        //set the filename of the image by using current time (add the file type like png/jpg/jpeg)
        $filename=time().'.'.$electionImage->getClientOriginalExtension();
        //save the image into the local directory file
        $electionImage->move('electionAssets/CandidateImage',$filename);

        $input->name = $request->electionName;
        $input->year = $request->electionYear;
        $input->category = $request->eletionCategory;
        $input->course = $request->electionCourse;
        $input->manifesto = $request->electionManifesto;
        $input->filePath = $filename;
        $input->save();

        return redirect('/committee/election/menu')->with('flash_message', 'Candidate Addedd!');
    }
    
    public function committeeViewCandidate($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.committee_view_candidate')->with('electionID', $selectedElectionID);
    }
}
