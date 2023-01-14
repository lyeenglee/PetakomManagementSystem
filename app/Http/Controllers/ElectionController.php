<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Auth;

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
        $authID = auth()->user()->id;

        $userID= User::find($authID);

        //get election where there exist election
        $acitivityEndTimeList = DB::table('activities')
            ->where('proposalUrl', "Election")->get();

        return view('ManageElection.election_menu_student')
            ->with('userID', $userID)
            ->with('acitivityEndTimeList', $acitivityEndTimeList);
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

        return redirect('/committee/election/menu')->with('success', 'Candidate Addedd!');
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
        return redirect('/committee/election/menu')->with('success', 'Candidate Updated!');
    }

    public function committeeRemoveCandidateDetails($electionID){

        $selectedElectionID= Election::find($electionID);

        //Delete the old image+
        $this->removeImage($selectedElectionID->filePath);

        $selectedElectionID->delete();
        return redirect('/committee/election/menu')->with('success', 'Candidate Removed!');
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
            $flash_message = "Candidate Approved!";
        }
        //if request decline
        else{
            $selectedElectionID->approveStatus = false;
            //save reject reason to db
            $selectedElectionID->rejectReason = $request->electionRejectReason;
            $flash_message = "Candidate Rejected!";
        }

        $selectedElectionID->save();
        return redirect('/coordinator/election/menu')->with('success', $flash_message);
    }

    public function studentViewCandidateMenu()
    {
        //retrieve approved candidate
        $approvedList = DB::table('elections')->where('approveStatus', 1)->get();
        return view('ManageElection.student_view_candidate_menu')->with('candidateList', $approvedList);
    }

    public function studentVoteCandidatePage()
    {
        //retrieve the candidate elected
        $candidateList = DB::table('elections')->where('approveStatus', 1)->get();

        //set the Majlis Tertinggi committee into list
        $candidateListMT = $candidateList->where('category', "Majlis Tertinggi");
        //retrieve the Majlis Eksekutif committee into list
        $candidateListME = $candidateList->where('category', "Majlis Eksekutif");

        //get election where there exist election
        $acitivityEndTimeList = DB::table('activities')
            ->where('proposalUrl', "Election")->get();

        return view('ManageElection.student_vote_candidate')
            ->with('candidateListMT', $candidateListMT)
            ->with('candidateListME', $candidateListME)
            ->with('acitivityEndTimeList', $acitivityEndTimeList);
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
    
    public function studentVoteCandidate(Request $request)
    {
        //retrieve the election list in string from view
        $electionIDStr = $request->electionIDList;
        //change the string to arraylist
        $electionIDList= preg_split('@,@', $electionIDStr, -1, PREG_SPLIT_NO_EMPTY);


        foreach ($electionIDList as $electionID) {

            $currentElectionID= Election::find($electionID);

            $votes = $currentElectionID->vote;

            //add 1 vote to the candidate
            is_null($votes) ? $currentElectionID->vote = 1 : $currentElectionID->vote += 1;

            //save vote data to DB
            $currentElectionID->save();
        }

        return redirect('/student/election/menu')->with('success', "Vote Done");
    }
}
