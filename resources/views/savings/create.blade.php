@extends('layouts.official')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-body">
                        <h4>Create Savings</h4>
                        <form class="form-horizontal" action="/savings" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="member_id"/>
                            <div class="form-group">
                                <label for="savingtype">Saving type</label>
                                <select class="form-control" name="saving_type_id">
                                    <option selected>choose type...</option>
                                    @foreach($saving_types as $saving_type)
                                        @if($saving_type->id == "1")
                                            <option value="{{$saving_type->id}}">{{"Shared Capital"}}</option>
                                        @endif
                                        @if($saving_type->id == "2")
                                            <option value="{{$saving_type->id}}">{{"Share Contribution"}}</option>
                                        @endif
                                        @if($saving_type->id == "3")
                                            <option value="{{$saving_type->id}}">{{"Withdrawals"}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Saving amount</label>
                                <input type="number" class="form-control" name="saving_amount" placeholder="enter amount...">
                            </div>
                    
                            <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>        
        </div>
    </div>
@endsection