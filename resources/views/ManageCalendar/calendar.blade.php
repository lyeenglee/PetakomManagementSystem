@extends('layouts.app')

@section('content')
<title>Calendar</title>
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8"> 
        <h3 style="text-align:center;font-weight: bold;">Select the Chararcter. </h3><br>

            <br>
            <div class="text-center">

              <a href="{{ url('/committee/activity/menu') }}" class="col-2 btn btn-success" title="Committee Menu">Committee</a>
              <a href="{{ url('/coordinator/activity/menu') }}" class="col-2 btn btn-primary" title="Coordinator Menu">Coordinator</a>
              <a href="{{ url('/dean/activity/menu')  }}" class="col-2 btn btn-secondary" title="Dean Menu">Dean</a>

            </div>
            
        </div>
    </div>
</div>















@endsection