<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $proposal = Proposal::all();
        return view('ManageProposal.actor_activity_menu')->with('proposals', $proposal);;

        $proposal = User::get();
        return view('proposals',compact('proposals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ManageProposal.committee_add_proposal');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        Proposal::create($input);
        return redirect('/committee/activity/menu')->with('flash_message', 'Proposal Submit Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($proposalID)
    {
        //
        $proposal = Proposal::find($proposalID);
        return view('ManageProposal.coordinator_view_proposal')->with('proposals', $proposal);

     
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


    //Committee Activity Menu CRUD
    public function committeeMenu()
    {
        $proposal = Proposal::all();
        return view('ManageProposal.committee_activity_menu')->with('proposals', $proposal);
    }

    public function addProposal()
    {
        $proposal = Proposal::all();
        return view('ManageProposal.committee_add_proposal')->with('proposals', $proposal);
    }

    public function viewStatus($proposalID)
    {
        $proposal = Proposal::all($proposalID);
        return view('ManageProposal.committee_view_Status')->with('proposals', $proposal);
    }

    public function downloadReport()
    {
        $proposal = Proposal::all();
        return view('ManageProposal.committee_download_report')->with('proposals', $proposal);
    }

    //Coordinator Activity Menu 
    public function coordinatorMenu()
    {
        $proposal = Proposal::all();
        return view('ManageProposal.coordinator_activity_menu')->with('proposals', $proposal);
    }

    public function coordinatorView($proposalID)
    {
        $proposal= Proposal::find($proposalID);
        return view('ManageProposal.coordinator_view_proposal')->with('proposals', $proposal);
    }


    public function coordinatorApprove()
    {
        $proposal = Proposal::all();
        return view('ManageProposal.coordinator_approve_proposal')->with('proposals', $proposal);
    }



    //Dean Activity Menu
    public function deanMenu()
    {
        $proposal = Proposal::all();
        return view('ManageProposal.dean_activity_menu')->with('proposals', $proposal);
    }

    public function deanView($proposalID)
    {
        $proposal= Proposal::find($proposalID);
        return view('ManageProposal.dean_view_proposal')->with('proposals', $proposal);
    }
    
    public function deanApprove()
    {
        $proposal = Proposal::all();
        return view('ManageProposal.dean_approve_proposal')->with('proposals', $proposal);
    }




    public function changeStatus(Request $request)
    {
        $proposal = User::find($request->user_id);
        $proposal->status = $request->status;
        $proposal->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
