@extends('layouts.app')
@include('flash-message')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align:center">{{_('VIEW BULLETIN') }}</div>
                <div class="card-body">
                    <form action="{{ url('bulletin/' .$bulletins->bulletinID) }}" method="POST">
                        @csrf
                        <input  type="hidden" name="id" id="id" value="{{$bulletins->id}}" id="id" />
                        <div class="row mb-3">
                            <label for="bulletinTitle" class="col-md-4 col-form-label">{{_('TITLE :') }}  {{$bulletins->bulletinTitle}}</label>
                        </div>

                        <div class="row mb-3">
                            <label for="bulletinDescription" class="col-md-4 col-form-label">{{_('DESCRIPTION') }}<br>{{$bulletins->bulletinDescription}}</label>       
                        </div>

                        <div class="row mb-3">
                            <label for="bulletinDate" class="col-md-3 col-form-label ">{{_('DATE')}}<br>{{$bulletins->bulletinDate}}</label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection