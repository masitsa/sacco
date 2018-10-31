@extends('layouts.master')

@section('content')
<br>
<a href="/users"  class="btn btn-primary">Go Back</a> <br> <br>
<table class="table table-condensed table-striped table-bordered table-hover">
   <tr>
      <th>Role Name</th>
      <th>User Role Status</th>
      <th>deleted</th>
      <th>deleted on</th>
      <th>deleted by</th>
      <th>created by</th>
      <th>created at</th>
      <th>Updated at</th>
      <th colspan="2">Actions</th>
    </tr>
    @foreach($user->roles as $role)
    <tr>
        @if($role->pivot->role_id == $role->id)
            <td>{{$role->role_name}}</td>
        @endif
        @if($role->pivot->role_user_status == 0)
            <td style="color:red;">InActive</td>
        @endif
        @if($role->pivot->role_user_status == 1)
            <td style="color:green;">Active</td>
        @endif
        @if($role->pivot->deleted == 0)
            <td style="color:green;">Not Deleted</td>
        @endif
        @if($role->pivot->deleted == 1)
            <td style="color:red;">Deleted</td>
        @endif
        @if($role->pivot->deleted_on == NULL)
        <td>-</td>
        @else
       <td>{{$role->pivot->deleted_on}}</td>
        @endif
        @if($role->pivot->deleted_by == NULL)
        <td>-</td>
        @else
       <td>{{Auth::user()->user_first_name}}</td>
        @endif
        <td>{{Auth::user()->user_first_name}}</td>
        <td>{{$role->pivot->created_at->toFormattedDateString()}}</td>
        <td>{{$role->pivot->updated_at->toFormattedDateString()}}</td>
        <td>
            
                <!-- Button trigger modal -->
                @if($role->pivot->deleted == 1)
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUserRole" style="margin-bottom:5px;cursor:not-allowed;" disabled>Edit userrole</button><br>
                @else
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUserRole" style="margin-bottom:5px;">Edit userrole</button><br>
                @endif
                
                <!-- Modal -->
                <div class="modal fade" id="editUserRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="/userroleupdate/{{$user->id}}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                {{--  <div class="form-group col-md-6">
                                    <label for="role_id"> Role Name</label>
                                    <select name="role_id" class="form-control">
                                        @foreach($allroles as $singlerole)
                                            <option value="{{$singlerole->id}}">{{$singlerole->role_name}}</option>
                                        @endforeach
                                    </select>
                                </div>  --}}
                                <div class="form-group col-md-6">
                                    <label for="role_user_status"> Role User Status</label>
                                    <select name="role_user_status" class="form-control">
                                        <option value="" default>Select a Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">InActive</option>
                                    </select>
                                    <input type="hidden" name="role_id" value="{{$role->pivot->role_id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update user role</button>                                    
                                </div>
                            </form> 
                        </div>
                    </div>
                    </div>
                </div>
               
            <form action="/userroledestroy/{{$user->id}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                {{--  <button type="submit" class="btn btn-sm btn-primary">Edit user role</button>  --}}
                <input type="hidden" name="role_id" value="{{$role->pivot->role_id}}">
                <button type="submit" class="btn btn-sm btn-danger">Delete user role</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection('content')