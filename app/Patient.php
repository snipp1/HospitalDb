<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    //
    protected $fillable = [
        'folder_number',
        'first_name',
        'other_name',
        'last_name',
        'gender',
        'dob',//
        'nationality',//
        'parity',//
        'address',//
        'occcupation',//
        'marital_status',//
        'religion',//
        'educational_status',//
        'patient_phone_number',//
        'place_of_birth',//
        'ethnicity',//
        'patient_group',//
        'next_of_king_name',//
        'next_of_king_relationship',//
        'next_of_king_contact',//
        'referring_hospital_Clinic',//
        'race',//
        'facility_category',//
        'facility_status',//
        'emergency_referral',//
        'gestational_age',//
        'reason_for_referral',//
        'clinical_visit',//
        'type_of_patient',//
        'insurance_name',//
        'insurance_number',
    ];

public function gender(){
    return $this->hasOne('App\Gender','id','gender');
}
public function country(){
    return $this->hasOne('App\Country','id','nationality');
}
public function religion(){
    return $this->hasOne('App\Religion','id','religion');
}
public function ethnicity(){
    return $this->hasOne('App\Ehnicity','id','ethnicity');
}
public function race(){
    return $this->hasOne('App\Race','id','race');
}
public function marital(){
    return $this->hasOne('App\MaritalStatus','id','marital_status');
}
public function education(){
    return $this->hasOne('App\Education','id','educational_status');
}
public function next_kin_re(){
    return $this->hasOne('App\NextOfKinRelationship','id','next_of_king_relationship');
}
public function patien_group(){
    return $this->hasOne('App\PatientGroup','id','patient_group');
}
public function type_of_patien(){
    return $this->hasOne('App\TypeOfPatient','id','type_of_patient');
}
public function clinical_visit(){
    return $this->hasOne('App\ClinicalVisit','id','clinical_visit');
}
public function parity(){
    return $this->hasOne('App\Parity','id','parity');
}
public function facility_category(){
    return $this->hasOne('App\FacilityCategory','id','facility_category');
}
public function gestational_age(){
    return $this->hasOne('App\GestationalAge','id','gestational_age');
}
public function insurance_name(){
    return $this->hasOne('App\TypeOfInsurance','id','insurance_name');
}
public function bills(){
    return $this->hasMany('App\Bills','patients_id','id');
}
public function department(){
    return $this->belongsToMany('App\Department','department_patients','patients_id','department_id','id','id');
}
}
