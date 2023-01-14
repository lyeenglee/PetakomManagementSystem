@extends('layouts.app')

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
            <!-- Vote Candidate Card -->
            <div class="card" onclick="location.href='/student/election/studentVoteCandidateMenu'">
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