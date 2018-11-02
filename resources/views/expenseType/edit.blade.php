@extends('layouts.official')
@section('content')
<div class="container">
   <div class="row justify-content-left">
      <div class="col-md-6">
         <div class="card">
         <div class="card-header">Edit Expense</div>
            <form method="POST" action="/expenses/{{$expenses->id}}">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <div class="form-group" >
               <label for="expense_name" class="col-md-4 col-form-label text-md-right">Expense Name</label>
               <div class="col-md-6">
                  <input type="text" class="form-control" name="expense_name"  value="{{$expenses->expense_name}}">
                  </div>
               </div>
               <div class="form-group ">
                     <label for="expense_type" class="col-md-4 col-form-label text-md-right">Expense Type</label>
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
                     <div>
              
               <a href="expenses" class="btn btn-warning">Go Back</a>
               <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection