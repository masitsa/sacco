@extends('layouts.official')

@section('content')
    <div class="container"> <br>
        <form action="/employerstore" method="POST">
            @csrf
            <div class="form-group col-md-6">
                <label for="employer_name">Employer Name</label>
                <input type="text" class="form-control" name="employer_name" id="employername" >
            </div>
            <div class="form-group col-md-6">
                <label for="employer_email">Email address</label>
                <input type="email" class="form-control" name="employer_email" id="employer_email">
            </div>
            <div class="form-group col-md-6">
                <label for="employer_phone_number">Phone Number</label>
                <input type="text" class="form-control" name="employer_phone_number" id="employer_phone_number">
            </div>
            <div class="form-group col-md-6">
                <label for="employer_postal_address">Postal address</label>
                <input type="text" class="form-control" name="employer_postal_address" id="employer_postal_address">
            </div>
            <div class="form-group col-md-6">
                <button class="btn btn-primary sm" type="submit">Create Employer</button>
            </div>
        </form>
    </div>
@endsection