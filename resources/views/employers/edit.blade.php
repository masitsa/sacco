@extends('layouts.official')

@section('content')
<div class="container">
    <form action="/employer/{{$employer->id}}" method="POST">
        @csrf
        <div class="form-group col-md-6">
            <label for="employer_name">Employer Name</label>
            <input type="text" class="form-control" name="employer_name" id="employername" value="{{$employer->employer_name}}">
        </div>
        <div class="form-group col-md-6">
            <label for="employer_email">Email address</label>
            <input type="email" class="form-control" name="employer_email" id="employer_email" value="{{$employer->employer_email}}">
        </div>
        <div class="form-group col-md-6">
            <label for="employer_phone_number">Phone Number</label>
            <input type="text" class="form-control" name="employer_phone_number" id="employer_phone_number" value="{{$employer->employer_phone_number}}">
        </div>
        <div class="form-group col-md-6">
            <label for="employer_postal_address">Postal address</label>
            <input type="text" class="form-control" name="employer_postal_address" id="employer_postal_address" value="{{$employer->employer_postal_address}}">
        </div>
        <div class="form-group col-md-6">
            <button class="btn btn-primary sm" type="submit">Update Employer</button>
        </div>
    </form>
</div>
@endsection