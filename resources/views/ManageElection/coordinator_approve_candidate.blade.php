@extends('layouts.app')

@section('content')

@section('title', 'Coordinator Approve Candidate')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{_('Approve candidate') }}</div>
                <div class="card-body">
                    <!-- Post form-->
                    <form action="{{ url('/coordinator/election/edit/'.$electionID->electionID)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
                        <!-- Name Field -->
                        <div class="row mb-3">
                            <label for="electionName" class="col-md-4 col-form-label">{{_('Name') }}</label>
                            <div class="col=md-6">
                                <input id="electionName" type="text" class="form-control" name="electionName" value="{{$electionID->name}}"  readonly/>
                            </div>
                        </div>

                        <!-- Year Field -->
                        <div class="row mb-3">
                            <label for="electionYear" class="col-md-4 col-form-label">{{_('Year') }}</label>
                            <div class="col=md-6">
                                <input id="electionYear" type="number" min="1" max="10" class="form-control" name="electionYear" value="{{$electionID->year}}" readonly/>
                            </div>
                        </div>

                        <!-- Category Field -->
                        <div class="row mb-3">
                            <label for="electionDescription" class="col-md-4 col-form-label">{{_('Category') }}</label>
                            <div class="form-check">
                                <input type="radio" name="eletionCategory" id="majlisTertinggiRdb" value="Majlis Tertinggi" {{ ($electionID->category=="Majlis Tertinggi")? "checked" : "" }} disabled>
                                <label class="radio-inline" style="margin-right: 5%" for="majlisTertinggiRdb">
                                    Majlis Tertinggi
                                </label>
                                <input type="radio" name="eletionCategory" id="majlisEksekutifRdb" value="Majlis Eksekutif" {{ ($electionID->category=="Majlis Eksekutif")? "checked" : "" }} disabled>
                                <label class="radio-inline" style="margin-right: 5%" for="majlisEksekutifRdb">
                                    Majlis Eksekutif
                                </label>
                            </div>
                        </div>

                        <!-- Course Field -->
                        <div class="row mb-3">
                            <label for="electionDescription" class="col-md-4 col-form-label">{{_('Course') }}</label>
                            <div class="form-check">
                                <input type="radio" name="electionCourse" id="softwareEngineeringRdb" value="Software Engineering" {{ ($electionID->course=="Software Engineering")? "checked" : "" }} disabled>
                                <label class="radio-inline" style="margin-right: 5%" for="softwareEngineeringRdb">
                                    Software Engineering
                                </label>
                                <input type="radio" name="electionCourse" id="computerNetworkRdb" value="Computer Systems & Networking" {{ ($electionID->course=="Computer Systems & Networking")? "checked" : "" }} disabled>
                                <label class="radio-inline" style="margin-right: 5%" for="computerNetworkRdb">
                                    Computer Systems & Networking
                                </label>
                                <input type="radio" name="electionCourse" id="graphicsMultimediaRbd" value="Graphics & Multimedia Technology" {{ ($electionID->course=="Graphics & Multimedia Technology")? "checked" : "" }} disabled>
                                <label class="radio-inline" style="margin-right: 5%" for="graphicsMultimediaRbd">
                                    Graphics & Multimedia Technology
                                </label>
                            </div>
                        </div>

                        <!-- Manifesto Field -->
                        <div class="row mb-3">
                            <label for="electionManifesto" class="col-md-4 col-form-label">{{_('Manifesto') }}</label>
                            <div class="col=md-6">
                                <textarea id="electionManifesto" type="text" class="form-control" name="electionManifesto" rows="5" readonly>{{$electionID->manifesto}}</textarea>
                            </div>
                        </div>

                        <!-- Candidate Image Field -->
                        <div class="row mb-3">
                            <label for="electionImage" class="col-form-label">{{_('Candidate Image') }}</label>
                            <img src="{{ asset('electionAssets/CandidateImage/'. $electionID->filePath) }}" alt="image of candidate" style="max-width:20%;height:auto;"/>
                        </div>

                        <!-- Approve Status Field -->
                        <div class="row mb-3">
                            <label for="electionDescription" class="col-md-4 col-form-label">{{_('Approve Status') }}</label>
                            <div class="form-check">
                                <input type="radio" name="approveStatus" id="approveRdb" value="Approve" onclick="hideRejectField()">
                                <label class="radio-inline" style="margin-right: 5%" for="majlisTertinggiRdb">
                                    Approve
                                </label>
                                <input type="radio" name="approveStatus" id="declineRdb" value="Decline" onclick="showRejectField()">
                                <label class="radio-inline" style="margin-right: 5%" for="majlisEksekutifRdb">
                                    Decline
                                </label>
                            </div>
                        </div>

                        <!-- Reject Field -->
                        <div class="row mb-5" id="rejectDiv" style="display: none" >
                            <label for="electionName" class="col-md-6 col-form-label">Reject Reason (Only fill when need to reject) </label>
                            <div class="col=md-6">
                                <input id="electionRejectReason" type="text" class="form-control" name="electionRejectReason"/>
                            </div>
                        </div>

                        <!-- Submit and Cancel Btn Field -->
                        <div class="col">
                            <div class="text-end">
                                <button class="col-2 btn btn-success pull-right" type="submit">Submit</button>
                                <a href="{{ url('/coordiantor/election/menu') }}" class="col-2 btn btn-secondary pull-right">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showRejectField() {
        document.getElementById("rejectDiv").style.display = "block";
    }

    function hideRejectField() {
        document.getElementById("rejectDiv").style.display = "none";
    }
</script>
@endsection