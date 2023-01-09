@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{_('HOD View Activity Details') }}</div>
                <div class="card-body">
                    <h2>{{$activities->activityName}}</h2>
                    <form>
                        <br>
                        <div class="wrap">
                           <iframe class="frame" src="/activityAssets/{{$activities->posterUrl}}"></iframe>
                        </div>

                        <div class="row mb-3">
                            <strong for="activityDescription" class="col-md-4 col-form-label">{{_('Details') }}</strong>
                            <div class="col=md-6">
                                <textarea id="activityDescription" type="text" class="form-control" name="activityDescription" rows="10" readonly>{{$activities->activityDescription}}</textarea>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="text-end">
                                <a href="{{ url('/coordinator/activity/menu/') }}" class="col-2 btn btn-secondary pull-right" title="Add New Student">Back</a>
                            </div>
                        </div> 

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .wrap {
    width: 600px;
    height: 650px;
    padding: 0;
    overflow: hidden;
    margin-left:auto;
    margin-right:auto;
}

.frame {
    width: 2500px;
    height: 2200px;
    border: 0;
    -ms-transform: scale(0.30);
    -moz-transform: scale(0.30);
    -o-transform: scale(0.30);
    -webkit-transform: scale(0.30);
    transform: scale(0.30);

    -ms-transform-origin: 0 0;
    -moz-transform-origin: 0 0;
    -o-transform-origin: 0 0;
    -webkit-transform-origin: 0 0;
    transform-origin: 0 0;
}
</style>
@endsection