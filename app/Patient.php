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


}
