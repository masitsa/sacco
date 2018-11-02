@extends('layouts.official')

@section('content')
  
        <br>
        <table class="table table-bordered table-condensed table-striped table-hover">
            <tr>
                <th>Id</th>
                <th>Employer Name</th>
                <th>Employer Email</th>
                <th>Employer Phone Number</th>
                <th>Employer Postal address </th>
                <th>Deleted</th>
                <th>Deleted on</th>
                <th>Deleted by</th>
                <th>Created by</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th colspan="4" style="text-align:center"> Actions</th>
            </tr>
            @foreach($employers as $employer)
                <tr>
                    <td>{{ $employer->id }}</td>
                    <td>{{ $employer->employer_name }}</td>
                    @if($employer->employer_email == NULL)
                        <td>-</td>
                    @else
                        <td>{{ $employer->employer_email }}</td>
                    @endif
                    @if($employer->employer_phone_number == NULL)
                        <td>-</td>
                    @else
                        <td>{{ $employer->employer_phone_number }}</td>
                    @endif
                    @if($employer->employer_postal_address == NULL)
                        <td>-</td>
                    @else
                        <td>{{ $employer->employer_postal_address }}</td>
                    @endif
                    @if($employer->deleted == 0)
                    <td style="color:green;">Not Deleted</td>
                    @endif
                    @if($employer->deleted == 1)
                        <td style="color:red;">Deleted</td>
                    @endif
                    @if($employer->deleted_by == NULL || "")
                        <td>-</td>
                    @else
                    <td>{{Auth::user()->user_first_name}}</td>
                    @endif
                    @if($employer->deleted_on == NULL || "")
                        <td>-</td>
                    @else
                    <td>{{$employer->deleted_on}}</td>
                    @endif
                    @if($employer->created_by == NULL)
                        <td>-</td>
                    @else
                        <td>{{ $employer->created_by }}</td>
                    @endif
                    @if($employer->created_at == NULL)
                        <td>-</td>
                    @else
                        <td>{{ $employer->created_at->toFormattedDateString() }}</td>
                    @endif
                    <td>{{ $employer->updated_at }}</td>
                    <td><a href ="/employer/edit/{{$employer->id}}" class="btn btn-sm btn-primary">edit</a></td>
                    <td> 
                        <form action="/employerdelete/{{$employer->id}}" method="POST">
                            @csrf
                            {{ method_field('PATCH') }}
                            <button onclick=" return confirm ('are you sure you want to delete')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
@endsection