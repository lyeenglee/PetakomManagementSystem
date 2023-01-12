<?php

namespace App\Http\Controllers;

use App\Models\Election;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

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
        //retrieve the null (unapproved/ unreject) candidate
        $unapproveList = DB::table('elections')->where('approveStatus', null)->get();

        //retrieve the old (rejected) candidate
        $rejectedList = DB::table('elections')->where('approveStatus', 0)->get();

        $electionList = Election::all();
        return view('ManageElection.election_menu_comittee')
            ->with('unapproveList', $unapproveList)
            ->with('rejectedList',$rejectedList);
    }

    public function coordinatorMenu()
    {
        //retrieve the null (unapproved/ unreject) candidate
        $unapproveList = DB::table('elections')->where('approveStatus', null)->get();
        return view('ManageElection.election_menu_coordinator')->with('electionList', $unapproveList);
    }

    public function deanMenu()
    {
        return $this->retrieveCommitteeData('ManageElection.election_menu_dean');
    }

    public function hodMenu()
    {
        return $this->retrieveCommitteeData('ManageElection.election_menu_hod');
    }

    public function lecturerMenu()
    {
        return $this->retrieveCommitteeData('ManageElection.election_menu_lecturer');
    }

    public function studentMenu()
    {
        return view('ManageElection.election_menu_student');
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

        return redirect('/committee/election/menu');
    }
    
    public function committeeViewCandidate($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.committee_view_candidate')->with('electionID', $selectedElectionID);
    }
    
    public function committeeEditCandidate($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.committee_edit_candidate')->with('electionID', $selectedElectionID);
    }

    private function removeImage($filePath){
        $old_image_path = "electionAssets/CandidateImage/" . $filePath; 

        if(File::exists($old_image_path)) {
            File::delete($old_image_path);
        }
    }

    public function committeeEditCandidateDetails(Request $request, $electionID)
    {
        $selectedElectionID= Election::find($electionID);

        $selectedElectionID->name = $request->electionName;
        $selectedElectionID->year = $request->electionYear;
        $selectedElectionID->category = $request->eletionCategory;
        $selectedElectionID->course = $request->electionCourse;
        $selectedElectionID->manifesto = $request->electionManifesto;

        //get the image 
        $electionImage=$request->electionImage;

        //if new image upload
        if($electionImage!="") {
            //Delete the old image
            $this->removeImage($selectedElectionID->filePath);

            //set the filename of the image by using current time (add the file type like png/jpg/jpeg)
            $filename=time().'.'.$electionImage->getClientOriginalExtension();
            //save the image into the local directory file
            $electionImage->move('electionAssets/CandidateImage',$filename);

            $selectedElectionID->filePath = $filename;
        }

        //set the approve status to null (normally work for candidate that has been reject)
        $selectedElectionID->approveStatus = null;
        $selectedElectionID->rejectReason = null;

        $selectedElectionID->save();
        return redirect('/committee/election/menu');
    }

    public function committeeRemoveCandidateDetails($electionID){

        $selectedElectionID= Election::find($electionID);

        //Delete the old image+
        $this->removeImage($selectedElectionID->filePath);

        $selectedElectionID->delete();
        return redirect('/committee/election/menu');
    }

    public function coordinatorApproveCandidate($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.coordinator_approve_candidate')->with('electionID', $selectedElectionID);
    }

    public function coordinatorApproveCandidateDetails(Request $request, $electionID)
    {
        $selectedElectionID= Election::find($electionID);

        //if request approve
        if($request->approveStatus =="Approve"){
            //make candidate become votable
            $selectedElectionID->approveStatus = true;
        }
        //if request decline
        else{
            $selectedElectionID->approveStatus = false;
            //save reject reason to db
            $selectedElectionID->rejectReason = $request->electionRejectReason;
        }

        $selectedElectionID->save();
        return redirect('/coordinator/election/menu');
    }

    public function studentViewCandidateMenu()
    {
        //retrieve approved candidate
        $approvedList = DB::table('elections')->where('approveStatus', 1)->get();
        return view('ManageElection.student_view_candidate_menu')->with('candidateList', $approvedList);
    }

    public function studentVoteCandidate()
    {
        //retrieve approved candidate
        $approvedList = DB::table('elections')->where('approveStatus', 1)->get();
        return view('ManageElection.student_vote_candidate')->with('candidateList', $approvedList);
    }

    public function studentViewCommitteeMenu()
    {
        return $this->retrieveCommitteeData('ManageElection.student_view_committee_menu');
    }

    public function studentViewCandidate($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.student_view_candidate')->with('electionID', $selectedElectionID);
    }
    
    public function studentViewCommittee($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.student_view_committee')->with('electionID', $selectedElectionID);
    }

    public function retrieveCommitteeData($url){
        //retrieve the commitee elected
        $comitteeList = DB::table('elections')->where('positionStatus', 1)->get();

        //set the Majlis Tertinggi committee into list
        $comitteeListMT = $comitteeList->where('category', "Majlis Tertinggi");
        //retrieve the Majlis Eksekutif committee into list
        $comitteeListME = $comitteeList->where('category', "Majlis Eksekutif");

        return view($url)
            ->with('comitteeListMT', $comitteeListMT)
            ->with('comitteeListME', $comitteeListME);
    }
    
    public function deanViewCommittee($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.dean_view_committee')->with('electionID', $selectedElectionID);
    }

    public function hodViewCommittee($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.hod_view_committee')->with('electionID', $selectedElectionID);
    }

    public function lecturerViewCommittee($electionID)
    {
        $selectedElectionID= Election::find($electionID);
        return view('ManageElection.lecturer_view_committee')->with('electionID', $selectedElectionID);
    }
}
