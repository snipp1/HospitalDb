<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department_patients extends Model
{
    //
    protected $fillable=[
        'patients_id','department_id','in_date','moved_by'
    ];
}
