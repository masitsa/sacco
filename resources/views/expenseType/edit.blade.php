@extends('layouts.master')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Edit Expense Type</div>
            <div class="card-body">
               <form method="POST" action="/expensesType/{{$expensesTypes->id}}">
                  @csrf
                  <div class="form-group row">
                     <label for="user_first_name" class="col-md-4 col-form-label text-md-right">Expense Name</label>
                     <div class="col-md-6">
                        <input class="form-control" type="text" name="expense_type_name" value="{{$expensesTypes->expense_type_name}}">
                     </div>
                  </div>
                  
                  <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        Submit
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
