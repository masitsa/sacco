<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    //
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('role_user_status', 'deleted', 'deleted_on', 'deleted_by', 'created_by');
    }
}
