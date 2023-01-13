@extends('layouts.app')
@include('flash-message')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center">{{_('EDIT BULLETIN') }}</div>
                <div class="card-body">
                    <form action="{{ url('bulletin/' .$bulletins->bulletinID) }}" method="POST">
                        @csrf
                        @method("PATCH")
                        <input  type="hidden" name="id" id="id" value="{{$bulletins->id}}" id="id" />
                        <div class="row mb-3">
                            <label for="bulletinTitle" class="col-md-4 col-form-label">{{_('TITLE') }}</label>
                            <div class="col=md-6">
                                <input id="bulletinTitle" type="text" class="form-control" name="bulletinTitle" value="{{$bulletins->bulletinTitle}}" required/>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bulletinDescription" class="col-md-4 col-form-label">{{_('DESCRIPTION') }}</label>
                            <div class="col=md-6">
                                <textarea id="bulletinDescription" type="text" class="form-control" name="bulletinDescription" rows="5" required>{{$bulletins->bulletinDescription}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bulletinDate" class="col-md-3 col-form-label ">{{_('DATE')}} </label>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input id="bulletinDate" type="date" class="form-control" name="bulletinDate" value="{{$bulletins->bulletinDate}}" required/>
                            </div>
                        </div>
                        
                        <div class="col">
                            <div class="text-end">
                                <button class="col-2 btn btn-success pull-right" type="submit">Edit</button>
                                <a href="{{ url('/bulletin') }}" class="col-2 btn btn-secondary pull-right">Cancel</a>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection