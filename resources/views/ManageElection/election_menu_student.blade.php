@extends('layouts.studentnav')

@section('content')

@section('title', 'Student Election Management')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
        @include('flash-message')
        <h3 style="text-align:center;font-weight: bold;">Election Menu</h3><br>

            <!-- View Candidate Card -->
            <div class="card" onclick="location.href='/student/election/studentViewCandidateMenu'">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="electionTable" >
                            <tbody>
                                <tr>
                                    <td class="col-6" style="text-align: center;"><img src="{{ asset('electionAssets/StudentMenuImage/candidate.png') }}" alt="candidate logo" style="max-width:30%;height:auto;"/></td>
                                    <td class="col-6" style="vertical-align: middle; ">
                                        <h1 style="font-weight: bold;">View Candidate</h1>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br/>

            @php

                $gotElectionOnGoing = false;

                //set timezome to Malaysia time 
                date_default_timezone_set("Asia/Kuala_Lumpur");

                //if there is onging election
                if(count($acitivityEndTimeList) != 0){

                    //get election end time 
                    foreach ($acitivityEndTimeList as $item) {
                        $time = $item->endTime;
                    }

                    //if current time still got election 
                    if(strtotime($time) > time()){
                        $gotElectionOnGoing = true;
                    }
                }
            @endphp


            <!-- Vote Candidate Card -->
            <!-- If current time got election and user haven't vote -->
            @if ($userID->vote_status == 0 && $gotElectionOnGoing == true)
                <div class="card" onclick="location.href='/student/election/studentVoteCandidateMenu'">
            @else
                <!-- If current time does not have election or user haven't vote -->
                <div class="card" style="opacity: 0.5;">
            @endif  
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="electionTable">
                            <tbody>
                                <tr>
                                    <td class="col-6" style="text-align: center;"><img src="{{ asset('electionAssets/StudentMenuImage/vote.png') }}" alt="vote logo" style="max-width:30%;height:auto;"/></td>
                                    <td class="col-6"style="vertical-align: middle;">
                                        <h1 style="font-weight: bold;">Vote Candidate</h1>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br/>
            <!--View Committee Card -->
            <div class="card" onclick="location.href='/student/election/studentViewCommitteeMenu'">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="electionTable">
                            <tbody>
                                <tr>
                                    <td class="col-6" style="text-align: center;"><img src="{{ asset('electionAssets/StudentMenuImage/committee.png') }}" alt="committee logo" style="max-width:30%;height:auto;"/></td>
                                    <td class="col-6"style="vertical-align: middle;">
                                        <h1 style="font-weight: bold;">View Committee</h1>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection