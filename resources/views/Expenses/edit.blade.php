@extends('layouts.official')

@section('content')
<div class="container">
    <form  action="/expenses/{{$expenses->id}}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group col-md-6">
            <br>
            <label for="firstName">Expense Type</label>
            <input class="form-control" type="text" name="expense_name" value="{{$expenses->expense_name}}">
        </div>
        <div class="form-group col-md-6">
            <br>
            <label for="expenseName">Employer Name</label>
            <select name="expenseName_id" id="expenseName_id" class="form-control">
                <option value="">Select Expense Type</option>
                @foreach($expensetypes as $expensetype)
                    <option value="{{$expensetype->id}}">{{$expensetype->expense_type_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-6">
            <a href="/documents" class="btn btn-warning">Go Back</a>
            <button class="btn btn-primary sm" type="submit">update</button>
        </div>
    </form>
@endsection
