@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Assign Roles') }}</div>
                <br>
                <div class="card-body">
                
                <form action="{{ url('/lists/' .$user->id) }}" method="post">
                    {!! csrf_field() !!}
                    @method("PATCH")
                    <input type="hidden" name="id" id="id" value="{{$user->id}}" id="id" />
                    <label>Name</label></br>
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"></br>
                    <label>Email Address</label></br>
                    <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control"></br>
                    <label>User Id</label></br>
                    <input type="text" name="user_id" id="user_id" value="{{$user->user_id}}" class="form-control"></br>
                    <label>Role</label></br>
                        <input type="radio" name="option" id="option" value="coordinator">
                        <label>Coordinator</label>
                        <input type="radio" name="option" id="option" value="commitee" style="margin-left: 10px;">
                        <label>Commitee</label>
                        <input type="radio" name="option" id="option" value="student" style="margin-left: 10px;">
                        <label>Student</label>
                        <input type="radio" name="option" id="option" value="lecturer" style="margin-left: 10px;">
                        <label>Lecturer</label>
                        <input type="radio" name="option" id="option" value="HOD" style="margin-left: 10px;">
                        <label>HOD</label>
                        <input type="radio" name="option" id="option" value="dean" style="margin-left: 10px;">
                        <label>Dean</label>
                    </br></br>
                    <input type="submit" value="Update" class="btn btn-success">
                    <input type="button" name="Cancel" class="btn btn-dark" value="Cancel" onClick="window.location='/lists';" />
                </form>
  
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
