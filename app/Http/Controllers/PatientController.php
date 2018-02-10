<?php

namespace App\Http\Controllers;

use App\ClinicalVisit;
use App\Country;
use App\Education;
use App\Ehnicity;
use App\FacilityCategory;
use App\Gender;
use App\GestationalAge;
use App\MaritalStatus;
use App\NextOfKinRelationship;
use App\Parity;
use App\Patient;
use App\PatientGroup;
use App\Race;
use App\Religion;
use App\TypeOfInsurance;
use App\TypeOfPatient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $country=Country::all();
        $religion=Religion::all();
        $marital_status=MaritalStatus::all();
        $ethnicity=Ehnicity::all();
        $educational_status=Education::all();
        $race=Race::all();
        $gender=Gender::all();
        $type_of_patient=TypeOfPatient::all();
        $patient_group=PatientGroup::all();
        $parity=Parity::all();
        $clinical_visit=ClinicalVisit::all();
        $facility_category=FacilityCategory::all();
        $gestational_age=GestationalAge::all();
        $insurance_name=TypeOfInsurance::all();
        $next_of_king_relationship=NextOfKinRelationship::all();
        return view('admin.patients.add',
            compact('clinical_visit',
            'type_of_patient','patient_group',
            'gender','country','next_of_king_relationship',
            'religion','marital_status','ethnicity',
            'educational_status','race','parity',
            'facility_category','gestational_age','insurance_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $users=auth()->user();
        if (empty($users->department)){
            return redirect()->back()->withInput()->withErrors("You are Not Under a department, Can not Register Patients");
        }else{
            $dep=$users->department->acronym;

//        Todo unique ids here
        $date=date('y');

        $patients= Patient::create($request->except('_token'));
        $patients_folder="KBTH/".$dep."/".$patients->id."/".$date;
        $patients->folder_number=$patients_folder;
        $patients->save();
        }
        session()->flash('pine-msg',['pine_title'=>'Registered','pine_body'=>'You have successfully add a Patient','pine_type'=>'success','pine_icon'=>'ti ti-check']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //

    }
}
