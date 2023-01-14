@extends('layouts.coordinatornav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <br><h4 style="margin-left: 15px;">COORDINATOR DASHBOARD</h4>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <br/><br/>
                    <a href="{{ url('/lists') }}" class="btn btn-success btn-sm" title="user list">
                            User List
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
