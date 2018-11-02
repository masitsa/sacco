<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    protected $guarded = [];

    
    public function expenseType()
    {
        return $this->belongsTo('App\ExpenseType');

}
    public function user()
        {
            return $this->belongsTo('App\User');

    }

    

}
