<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $fillable=[
      'patients_id' ,
      'patients_folder'  ,
        'biller_id',
        'bill_amount',
        'bill_dep',
        'bill_hospital'
    ];

    public function items(){
        return $this->hasMany('App\BillItems','bill_id','id');
    }
}
