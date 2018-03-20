<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable=[
        'acronym','description','hospital_id'
    ];

    public function hospital(){
        return $this->belongsTo('App\Hospital','hospital_id','id');
    }
//    public function patients(){
//        return $this->hasManyThrough('App\Patient','department_patients','department_id','id');
//    }
}
