@extends('layouts.official')
@section('content')
<div class="container">
   <div class="row justify-content-left">
      <div class="col-md-6">
         <div class="card">
            <div class="card-header">Edit Expense type</div>
            <form method="POST" action="/expenses/{{$expensesTypes->id}}">
               {{ csrf_field() }}
               {{ method_field('PATCH') }}
               <div class="form-group" >
                  <label for="expense_type_name" class="col-md-4 col-form-label text-md-right">Expense Type Name</label>
                  <div class="col-md-6">
                     <input type="text" class="form-control" name="expense_type__name"  value="{{$expensesTypes->expense_type_name}}">
                  </div>
               </div>
               <a href="expenses" class="btn btn-warning">Go Back</a>
               <button type="submit" class="btn btn-primary">Update</button>
         </div>
         </form>
         </div>
      </div>
   </div>
</div>
</div>
@endsection
