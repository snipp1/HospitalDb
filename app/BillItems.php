<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillItems extends Model
{
    //
    protected $fillable=[
'bill_id','item_id','item_price'
    ];

    public function itemised()
    {
        return $this->hasOne('App\ItemisedBill','id','item_id');

   }

}
