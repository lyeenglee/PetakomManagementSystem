@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 style="text-align:center;font-weight: bold;">View Candidate</h3><br/>
            <div class="card">
                <div class="card-body">
                    <!-- Display image and name -->
                    <div class="text-center">
                        <img src="{{ asset('electionAssets/CandidateImage/'. $electionID->filePath) }}" alt="image of candidate" style="max-width:20%;height:auto;"/>
                        <h3 class="card-title" style="font-weight: bold;">{{$electionID->name}}</h3><br/><br/>
                    </div>
                    

                    <div class="table-responsive" style="margin-left: auto; margin-right: auto; width: 70%;">
                        <table class="table table-borderless">
                            <tbody>
                                <!-- Display candidate year -->
                                <tr>
                                    <td class="col-5"><label>Year</label></td>
                                    <td class="col-7"><p style="font-weight: bold;">{{$electionID->year}} </p></td>
                                </tr>

                                <!-- Display candidate category -->
                                <tr>
                                    <td class="col-5"><label>Category</label></td>
                                    <td class="col-7"><p style="font-weight: bold;">{{$electionID->category}} </p></td>
                                </tr>

                                <!-- Display candidate course -->
                                <tr>
                                    <td class="col-5"><label>Course</label></td>
                                    <td class="col-7"><p style="font-weight: bold;">{{$electionID->course}} </p></td>
                                </tr>

                                <!-- Display candidate manifesto -->
                                <tr>
                                    <td class="col-5"><label>Manifesto</label></td>
                                    <td class="col-7"><p style="font-weight: bold;">{{$electionID->manifesto}} </p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Submit and Cancel Btn Field -->
                    <div class="col">
                        <div class="text-center">
                            <a href="{{ url('/committee/election/menu') }}" class="col-2 btn btn-secondary pull-right">Back</a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection