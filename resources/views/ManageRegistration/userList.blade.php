@extends('layouts.coordinatornav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List of Users') }}</div>
                <br>
                <div class="card-body">
                
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>User Id</th>
                                    <th>Role</th>
                                    <th>More Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $users)
                                    <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->user_id }}</td>
                                    <td>{{ $users->option }}</td>
                                      
                                    <td class="border px-4 py-2 text-center">
                                        <!-- <a href="{{ url('' . $users->id) }}" title="View"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>       -->
                                        <a href="{{ url('/lists/' . $users->id. '/editRole')}}" title="Edit"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Assign</button></a>
                                        <form method="POST" action="{{ url('/lists/' . $users->id)}}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>                                 
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                
                            </table>
                            <a href="{{ url('/coordinator/home')}}" title="Back" style="display: flex;justify-content: center;align-items: center;"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Back</button></a>
                        </div>
  
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
