<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hospital extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[
      'name','email','phone','postal_address','location',
        'website','sms_username','sms_password' ,'email_username',
        'email_password' ,'product_key','is_locked','is_registered'

    ];
}
