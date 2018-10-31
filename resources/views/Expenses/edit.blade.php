@extends('layouts.official')
@section('content')
<div class="container">
   <div class="row justify-content-left">
      <div class="col-md-8">
         <div class="card">
            <form method="POST" action="/nextOfKin/{{$nextOfKin->id}}">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <div class="form-group" >
                  <label for="title">First Name</label>
                  <input type="text" class="form-control" name="next_of_kin_first_name"  value="{{$nextOfKin->next_of_kin_first_name}}">
               </div>
               <div class="form-group row">
                     <label for="user_first_name" class="col-md-4 col-form-label text-md-right">Expense Type</label>
                     <div class="col-md-6">
                        <select name="expense_type_id" class="form-control">
                           <option value="">--select Expense--</option>
                           @if(count($expensesTypes))
                           @foreach($expensesTypes as $expenseType)
                           <option value="{{$expenseType->id}}">{{$expenseType->expense_type_name}}</option>
                           @endforeach
                           @endif
                        </select>
                     </div>
              
               <a href="nextofkin" class="btn btn-warning">Go Back</a>
               <button type="submit" class="btn btn-primary">Update</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection