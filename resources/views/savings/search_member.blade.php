@extends('layouts.official')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-body">
                        <h4>Member Search</h4>
                        <form action="/search" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" name="member_number" class="form-control" placeholder="enter member number...">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success">
                                        <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        @if(isset($details))
                            <p>Search details for <b>Member Number: {{$query}}</b> are: </p>
                            <h4>Member details</h4>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Employment No</th>
                                        <th>ID No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>B/A Number</th>
                                        <th>Member Number</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $member)
                                    <tr>
                                        <td>{{$member->employer_id}}</td>
                                        <td>{{$member->member_national_id}}</td>
                                        <td>{{$member->member_first_name}}</td>
                                        <td>{{$member->member_last_name}}</td>
                                        <td>{{$member->member_email}}</td>
                                        <td>{{$member->member_phone_number}}</td>
                                        <td>{{$member->member_bank_account_number}}</td>
                                        <td>{{$member->member_number}}</td>
                                        <td><a href="/savings/create/{{$member->id}}" class="btn btn-success btn-sm">Create Saving</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @elseif(isset($message))
                            <p>{{$message}}</p>
                        @endif
                    </div>
                </div>
            </div>        
        </div>
    </div>
@endsection