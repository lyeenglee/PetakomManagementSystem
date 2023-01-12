@extends('layouts.app')

@section('content')

@section('title', 'Student View Committee Menu')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> 
        <h3 style="text-align:center;font-weight: bold;">Committee List</h3><br/>

            <!-- display all Majlis Tertinggi committee here-->
            <h3 style="font-weight: bold;">Majlis Tertinggi</h3>
            @foreach($comitteeListMT as $item)
            <div class="card" onclick="location.href='{{ url('/student/election/viewCommittee/' . $item->electionID) }}'">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="electionTable" >
                            <tbody>
                                <tr>
                                    <td class="col-3" style="text-align: center; vertical-align: middle;">
                                        <img src="{{ asset('electionAssets/CandidateImage/'. $item->filePath) }}" alt="candidate logo" style="max-width:50%;height:auto;"/>
                                    </td>
                                    <td class="col-9" style="vertical-align: middle; ">
                                        <h3 style="font-weight: bold;">{{ $item->position}}</h3>
                                        <h5 style="font-weight: bold;">{{ $item->name}}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br/>
            @endforeach

            <br/>

            <!-- display all Majlis Eksekutif committee here-->
            <h3 style="font-weight: bold;">Majlis Eksekutif</h3>
            @foreach($comitteeListME as $item)
            <div class="card" onclick="location.href='{{ url('/student/election/viewCommittee/' . $item->electionID) }}'">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless" id="electionTable" >
                            <tbody>
                                <tr>
                                    <td class="col-3" style="text-align: center; vertical-align: middle;">
                                        <img src="{{ asset('electionAssets/CandidateImage/'. $item->filePath) }}" alt="candidate logo" style="max-width:50%;height:auto;"/>
                                    </td>
                                    <td class="col-9" style="vertical-align: middle; ">
                                        <h3 style="font-weight: bold;">{{ $item->position}}</h3>
                                        <h5 style="font-weight: bold;">{{ $item->name}}</h5>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br/>
            @endforeach
        </div>
    </div>
</div>


@endsection