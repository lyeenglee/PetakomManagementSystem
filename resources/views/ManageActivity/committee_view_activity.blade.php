@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{_('View Activity Details') }}</div>
                <div class="card-body">
                    <form>
                        
                        <!-- ID Field -->
                        <input  type="hidden" name="activityID" id="activityID" value="{{$activities->activityID}}" />

                        <!-- Name Field -->
                        <div class="row mb-3">
                            <label for="activityName" class="col-md-4 col-form-label">{{_('Name') }}</label>
                            <div class="col=md-6">
                                <input id="activityName" type="text" class="form-control" name="activityName" value="{{$activities->activityName}}" readonly/>
                            </div>
                        </div>

                         <!-- Start Date, End Date, Start Time, End Time Label -->
                        <div class="row mb-3">
                            <label for="startDate" class="col-md-3 col-form-label ">{{_('Start Date')}} </label>
                            <label for="endDate" class="col-md-3 col-form-label ">{{_('End Date')}} </label>
                            <label for="startTime" class="col-md-3 col-form-label ">{{_('Start Time')}} </label>
                            <label for="endTime" class="col-md-3 col-form-label">{{_('End Time')}} </label>
                        </div>

                        <div class="row">
                             <!-- Start Date Field -->
                            <div class="col">
                                <input id="startDate" type="date" class="form-control" name="startDate" value="{{$activities->startDate}}" readonly/>
                            </div>

                            <!-- End Date Field -->
                            <div class="col">
                                <input id="endDate" type="date" class="form-control" name="endDate" value="{{$activities->endDate}}" readonly/>
                            </div>

                            <!-- Start Time Field -->
                            <div class="col">
                                <input id="startTime" type="time" class="form-control" name="startTime" value="{{$activities->startTime}}" readonly/>
                            </div>

                            <!-- End Time Field -->
                            <div class="col">
                                <input id="endTime" type="time" class="form-control" name="endTime" value="{{$activities->endTime}}" readonly/>
                            </div>
                        </div>

                        <!-- Venue Field -->
                        <div class="row mb-3">
                            <label for="activityVenue" class="col-md-4 col-form-label">{{_('Venue') }}</label>
                            <div class="col=md-6">
                                <input id="activityVenue" type="text" class="form-control"name="activityVenue" value="{{$activities->activityVenue}}" readonly/>
                            </div>
                        </div>

                        <!-- Description Field -->
                        <div class="row mb-3">
                            <label for="activityDescription" class="col-md-4 col-form-label">{{_('Description') }}</label>
                            <div class="col=md-6">
                                <textarea id="activityDescription" type="text" class="form-control" name="activityDescription" rows="5" readonly>{{$activities->activityDescription}}</textarea>
                            </div>
                        </div>

                        <!-- Amount, Proposal Drop Down Label -->
                        <div class="row mb-3">
                            <label for="grantAmount" class="col-md-3 col-form-label ">{{_('Grant Amount')}} </label>
                            <label for="proposalUrl" class="col-md-8 col-form-label ">{{_('Proposal Url')}} </label>
                        </div>

                        <div class="row">
                             <!-- Amount Field -->
                            <div class="col-md-3">
                                <input id="grantAmount" type="number" class="form-control" name="grantAmount" value="{{$activities->grantAmount}}" readonly/>
                            </div>

                            <!-- Proposal DropDown Field -->
                            <div class="col-md-9">
                                <select id="proposalUrl" class="form-control" name="proposalUrl" readonly>
                                    <option selected>{{$activities->proposalUrl}}</option>
                                    <option >Student Development Programmes (SDP)</option>
                                    <option >FYPro-Com Carnival</option>
                                </select>
                            </div>
                        </div>

                        <!-- Poster Field -->
                        <div class="row mb-3">
                            <label for="posterUrl" class="col-form-label">{{_('Poster Url') }}</label>
                            <div class="col=md-6">
                                <div class="custom-file">
                                    <input id="posterUrl" type="text" class="form-control"name="posterUrl" value="{{$activities->posterUrl}}" readonly/>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Back Button -->
                        <div class="col">
                            <div class="text-end">
                                <a href="{{ url('/activity/') }}" class="col-2 btn btn-secondary pull-right" title="Back">Back</a>
                            </div>
                        </div>    

                        <!-- Get Activity Status Field (Do Not Delete)-->
                        <div class="row mb-3">
                            <label hidden id="todayDate">{{ now()->format('Y-m-d') }}</label>
                            <input hidden id="activityStatus" type="text" class="form-control"name="activityStatus"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

//Get Activiti Status Function
function myFunction() {
   var startValue = (document.getElementById("startDate").value) ;
   var endValue = document.getElementById("endDate").value ;
   var todayValue = document.getElementById("todayDate").innerHTML;

   var startDate = new Date(startValue);
   var endDate = new Date(endValue);
   var todayDate = new Date(todayValue);

   if(todayDate.getTime() < startDate.getTime() && todayDate.getTime() < endDate.getTime()){
    document.getElementById("activityStatus").value = "Up-Coming";  
   }
    else if(todayDate.getTime() > startDate.getTime() && todayDate.getTime() > endDate.getTime()){
    document.getElementById("activityStatus").value = "End";  
   }
   else if(todayDate.getTime() == startDate.getTime() && todayDate.getTime() < endDate.getTime()){
    document.getElementById("activityStatus").value = "On-Going1";  
   }
   else if(todayDate.getTime() == startDate.getTime() && todayDate.getTime() == endDate.getTime()){
    document.getElementById("activityStatus").value = "On-Going";  
   }
   else{
    document.getElementById("activityStatus").value = "Something Went Wrong";  
   }
}
</script>

@endsection