@extends('layouts.studentnav')

@section('content')

@section('title', 'Student Voting Page')

<style>
    img {
        max-width:200px;
        height:200px;
    }   

    label{
        font-size: 24px;
    }
</style>

@php
    //get election end time 
    foreach ($acitivityEndTimeList as $item) {
        $time = $item->endTime;
    }

    //get current date
    $date = date('m/d/Y', time());

    //merge cuurent date with election end time 
    $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 style="text-align:center;font-weight: bold;">Voting List</h3><br/>
            <h1 class="text-danger" id="voteTimeLbl"></h1><br/>

            <!-- Post form-->
            <form id="form" action="{{ url('/student/election/studentVoteCandidate')}}" method="POST">
                @csrf
                @method("PATCH")

                @php
                    //initialize empty arraylist for Majlis Tertinggi
                    $firstMTCandidate = array();
                    $secondMTCandidate = array();
                    $thirdMTCandidate = array();

                    //initialize empty arraylist for Majlis Eksekutif
                    $firstMECandidate = array();
                    $secondMECandidate = array();
                    $thirdMECandidate = array();
                @endphp

                <!-- set data to arraylist for Majlis Tertinggi candidate -->
                @foreach($candidateListMT as $item)
                    @php
                        //Assign candidate details to first arraylist
                        if($loop->iteration % 3 == 1){
                            array_push($firstMTCandidate, $item);
                        }   
                            //Assign candidate details to second arraylist
                            else if($loop->iteration % 3 == 2){
                                array_push($secondMTCandidate, $item);
                            }
                        //Assign candidate details to third arraylist
                        else{
                            array_push($thirdMTCandidate, $item);
                        }
                    @endphp
                @endforeach
                
                <!-- set data to arraylist for Majlis Eksekutif candidate -->
                @foreach($candidateListME as $item)
                    @php
                        //Assign candidate details to first arraylist
                        if($loop->iteration % 3 == 1){
                            array_push($firstMECandidate, $item);
                        }   
                            //Assign candidate details to second arraylist
                            else if($loop->iteration % 3 == 2){
                                array_push($secondMECandidate, $item);
                            }
                        //Assign candidate details to third arraylist
                        else{
                            array_push($thirdMECandidate, $item);
                        }
                    @endphp
                @endforeach

                <!-- Vote area for Majlis Tertinggi -->
                <span>
                    <label>Majlis Tertinggi</label>
                    <label class="text-danger" style="margin-left: 5%">Vote left: </label>
                    <label class="text-danger" id="votesLeftMT">2</label>
                </span>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="electionTable" style="border-collapse: separate; border-spacing: 20px">
                            <tbody>
                                <!-- Loop through all arraylist -->
                                @for ($i = 0; $i < count($firstMTCandidate); $i++)
                                <tr>
                                    <!-- Print the left card candidate if arraylist not empty -->
                                    @if(!empty($firstMTCandidate[$i]))
                                    <td class="col-4" style="text-align: center; vertical-align: center; border:1px solid" onclick="clickCandidate(this, 'MT', {{$firstMTCandidate[$i]->electionID}})">
                                        <img src="{{ asset('electionAssets/CandidateImage/'. $firstMTCandidate[$i]->filePath) }}" alt="candidate logo" />
                                        <h5 class="card-title">{{($firstMTCandidate[$i]->name)}}</h5>
                                    </td>
                                    @endif
                                    <!-- Print the middle card candidate if arraylist not empty -->
                                    @if(!empty($secondMTCandidate[$i]))
                                    <td class="col-4" style="text-align: center; vertical-align: center; border:1px solid" onclick="clickCandidate(this,'MT', {{$secondMTCandidate[$i]->electionID}})">
                                        <img src="{{ asset('electionAssets/CandidateImage/'. $secondMTCandidate[$i]->filePath) }}" alt="candidate logo" />
                                        <h5 class="card-title">{{($secondMTCandidate[$i]->name)}}</h5>
                                    </td>
                                    @endif
                                    <!-- Print the right card candidate if arraylist not empty -->
                                    @if(!empty($thirdMTCandidate[$i]))
                                    <td class="col-4" style="text-align: center; vertical-align: center; border:1px solid" onclick="clickCandidate(this,'MT', {{$thirdMTCandidate[$i]->electionID}})">
                                        <img src="{{ asset('electionAssets/CandidateImage/'. $thirdMTCandidate[$i]->filePath) }}" alt="candidate logo" />
                                        <h5 class="card-title">{{($thirdMTCandidate[$i]->name)}}</h5>
                                    </td>
                                    @endif
                                </tr>
                                <tr></tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Vote area for Majlis Eksekutif -->
                <span>
                    <label>Majlis Eksekutif</label>
                    <label class="text-danger" style="margin-left: 5%">Vote left: </label>
                    <label class="text-danger" id="votesLeftME">3</label>
                </span>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="electionTable" style="border-collapse: separate; border-spacing: 20px">
                            <tbody>
                                <!-- Loop through all arraylist -->
                                @for ($i = 0; $i < count($firstMECandidate); $i++)
                                <tr>
                                     <!-- Print the left card candidate if arraylist not empty -->
                                     @if(!empty($firstMECandidate[$i]))
                                    <td class="col-4" style="text-align: center; vertical-align: center; border:1px solid" onclick="clickCandidate(this,'ME', {{$firstMECandidate[$i]->electionID}})">
                                        <img src="{{ asset('electionAssets/CandidateImage/'. $firstMECandidate[$i]->filePath) }}" alt="candidate logo" />
                                        <h5 class="card-title">{{($firstMECandidate[$i]->name)}}</h5>
                                    </td>
                                    @endif
                                    <!-- Print the middle card candidate if arraylist not empty -->
                                    @if(!empty($secondMECandidate[$i]))
                                    <td class="col-4" style="text-align: center; vertical-align: center; border:1px solid" onclick="clickCandidate(this,'ME', {{$secondMECandidate[$i]->electionID}})">
                                        <img src="{{ asset('electionAssets/CandidateImage/'. $secondMECandidate[$i]->filePath) }}" alt="candidate logo" />
                                        <h5 class="card-title">{{($secondMECandidate[$i]->name)}}</h5>
                                    </td>
                                    @endif
                                    <!-- Print the right card candidate if arraylist not empty -->
                                    @if(!empty($thirdMECandidate[$i]))
                                    <td class="col-4" style="text-align: center; vertical-align: center; border:1px solid" onclick="clickCandidate(this,'ME', {{$thirdMECandidate[$i]->electionID}})">
                                        <img src="{{ asset('electionAssets/CandidateImage/'. $thirdMECandidate[$i]->filePath) }}" alt="candidate logo" />
                                        <h5 class="card-title">{{($thirdMECandidate[$i]->name)}}</h5>
                                    </td>
                                    @endif
                                </tr>
                                <tr></tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <input type="hidden" id="electionIDList" name="electionIDList"/>
                

                <!-- Submit and Cancel Btn Field -->
                <div class="col">
                    <div class="text-center">
                        <button class="col-2 btn btn-success pull-right" type="submit">Save</button>
                        <a href="{{ url('/student/election/menu') }}" class="col-2 btn btn-secondary pull-right">Back</a>
                    </div>
                </div>    
            </form>
        </div>
    </div>
</div>

<script>
    //Count down function
    // Set the date we're counting down to
    var countDownDate = new 
    Date("<?php echo $combinedDT; ?>").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {
        // Get today's date and time
        var now = new Date().getTime();
            
        // Find the distance between now and the count down date
        var distance = countDownDate - now;
            
        // Time calculations for days, hours, minutes and seconds
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
        // Output the result in an element with id="voteTimeLbl"
        document.getElementById("voteTimeLbl").innerHTML = "Voting Time Left : "  + hours + "h "
        + minutes + "m " + seconds + "s ";
            
        // If the count down is over, write some text 
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("voteTimeLbl").innerHTML = "EXPIRED";
            window.location.href = "{{ route('vote_expired')}}";
        }
    }, 1000);


    //Initialize array for all selectedCandidateId
    selectedCandidateId = [];
    selectedCell = [];

    //function to reduce the vote when user click on/ choose to vote the candidate
    function clickCandidate(tdCell, category, electionID) {

        //change string to int
        var votesLeftMT = getVoteLeftMT();
        var votesLeftME = getVoteLeftME();

        //check whether the candidate is selected
        var selected = checkCandidateSelectedOrNot(electionID)

        //deduct vote of Majlis Tertinggi
        if(category.localeCompare("MT") == 0){

            //call function to process then return back latest vote
            votesLeftMT = processClickForMTandME(category, votesLeftMT, selected, tdCell , selectedCell, selectedCandidateId, electionID);

            //display vote left for Majlis Tertinggi
            document.getElementById("votesLeftMT").innerHTML = votesLeftMT;
        }

        //deduct vote of Majlis Eksekutif
        if(category.localeCompare("ME") == 0 ){
            //call function to process then return back latest vote
            votesLeftME = processClickForMTandME(category, votesLeftME, selected, tdCell , selectedCell, selectedCandidateId, electionID);

            //display vote left for Majlis Tertinggi
            document.getElementById("votesLeftME").innerHTML = votesLeftME;
        }
    }

    function getVoteLeftMT(){
        //Initialize variable //Initialize variable 
        var votesLeftMTStr = document.getElementById("votesLeftMT").textContent;
        var votesLeftMT = parseInt(votesLeftMTStr);

        return votesLeftMT; 
    }

    function getVoteLeftME(){
        //Initialize variable //Initialize variable 
        var votesLeftMEStr = document.getElementById("votesLeftME").textContent;
        var votesLeftME = parseInt(votesLeftMEStr);

        return votesLeftME; 
    }

    function processClickForMTandME(category, vote, selected, tdCell , selectedCell, selectedCandidateId, electionID){
        //still got vote left for Majlis Tertinggi
        if(vote > 0){
            //select the candidate
            if(selected == false){
                vote = voteCandidate(vote,selected, tdCell , selectedCell, selectedCandidateId, electionID);
            }
            //deselect the candidate
            else{
                vote = notVoteCandidate(vote,selected, tdCell , selectedCell, selectedCandidateId, electionID);
            }
        }
        else{
                //deselect the candidate
            if(selected){
                vote = notVoteCandidate(vote,selected, tdCell , selectedCell, selectedCandidateId, electionID);
            }
        }

        return vote;
    }

    function checkCandidateSelectedOrNot(electionID){

        //if does not exist same id with current selected (default false)
        var existCandidate= false; 
        
        //loop through all selectedCandidateId (selected candidate's ID) 
        for(let i =0; i< selectedCandidateId.length ; i++){
            //if exist same id with current selected
            if(selectedCandidateId[i] == electionID ){
                existCandidate= true;   
            }
        }

        return existCandidate;
    }

    function voteCandidate(vote,selected, tdCell , selectedCell, selectedCandidateId, electionID){
        vote --;
        //push selected candidate to arraylist
        selectedCandidateId.push(electionID);
        //push selected cell to arraylist 
        selectedCell.push(tdCell);
        //call function change color when user select
        changeBorderColor(selected, tdCell , selectedCell);

        return vote;
    }

    function notVoteCandidate(vote,selected, tdCell , selectedCell, selectedCandidateId, electionID){
        vote ++;
        //call function change color when user deselect
        changeBorderColor(selected, tdCell , selectedCell);
        //remove the election Id from arraylist
        removeElectionID(selectedCandidateId, electionID);
        //remove the selected cell from arraylist
        removeSelectedCell(selectedCell, tdCell);

        return vote;
    }

    function changeBorderColor(selected, tdCell, selectedCell){
        //if candidate selected b4, change color back to black (deselect)
        if(selected){
            //change that cell to black when deselect
            for(var x in selectedCell){
                if(tdCell == selectedCell[x]){
                    tdCell.style.borderColor = "black";
                }
            }
        }
        //if candidate not selected b4, change color to blue (select)
        if(!selected){
            //change that cell to blue when select
            for(var x in selectedCell){
                if(tdCell == selectedCell[x]){
                    tdCell.style.borderColor = "blue";
                }
            }
        }
    }

    function removeElectionID(selectedCandidateId, currentID){
        for(let i =0; i< selectedCandidateId.length ; i++){
            //if exist same id with current selected
            if(selectedCandidateId[i] == currentID ){
                delete selectedCandidateId[i];
            }
        }
    }

    function removeSelectedCell(selectedCell, tdCell){
        for(let i =0; i< selectedCell.length ; i++){
            //if exist same id with current selected
            if(selectedCell[i] == tdCell ){
                delete selectedCell[i];
            }
        }
    }

    //add form submit event listener to validate and preapare
    const form = document.getElementById('form');
    form.addEventListener('submit', formSubmitPreparation);

    function formSubmitPreparation(event){

        //check vote finish for MT and ME (continue if no vote left)
        if(getVoteLeftMT()<=0 && getVoteLeftME()<=0){
            //change the arraylist to string
            strElectionID= selectedCandidateId.toString()
            //set the updated electionID arraylist to html p hidden tag
            document.getElementById("electionIDList").value = strElectionID;
        }
        else{
            alert("You still have votes left");
            event.preventDefault();
        }
    }

</script>

@endsection


