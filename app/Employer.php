<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;

class Employer extends Model
{
    protected $guarded = [];

    public function members(){
        return $this->hasMany(Member::class);
    }
}
