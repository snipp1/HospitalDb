<?php

namespace App\Http\Controllers;

use App\ClinicalVisit;
use App\Country;
use App\department_patients;
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
use  PDF;
use Yajra\DataTables\Facades\DataTables;

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
        return view('admin.patients.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $country = Country::all();
        $religion = Religion::all();
        $marital_status = MaritalStatus::all();
        $ethnicity = Ehnicity::all();
        $educational_status = Education::all();
        $race = Race::all();
        $gender = Gender::all();
        $type_of_patient = TypeOfPatient::all();
        $patient_group = PatientGroup::all();
        $parity = Parity::all();
        $clinical_visit = ClinicalVisit::all();
        $facility_category = FacilityCategory::all();
        $gestational_age = GestationalAge::all();
        $insurance_name = TypeOfInsurance::all();
        $next_of_king_relationship = NextOfKinRelationship::all();
        return view('admin.patients.add',
            compact('clinical_visit',
                'type_of_patient', 'patient_group',
                'gender', 'country', 'next_of_king_relationship',
                'religion', 'marital_status', 'ethnicity',
                'educational_status', 'race', 'parity',
                'facility_category', 'gestational_age', 'insurance_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required'
        ]);
        //
        $users = auth()->user();
        if (empty($users->department)) {
            return redirect()->back()->withInput()->withErrors("You are Not Under a department, Can not Register Patients");
        } else {
            $dep = $users->department->acronym;
            $hp = $users->hospital->acronym;

//        Todo unique ids here
            $date = date('y');

            $patients = Patient::create($request->except('_token'));
            $patients_folder = $hp . "/" . $dep . "/" . $patients->id . "/" . $date;
            $patients->folder_number = $patients_folder;
            $patients->save();
            department_patients::create([
                'patients_id' => $patients->id
                , 'department_id' => $users->department->id
                , 'in_date' => date(now())
                , 'moved_by' => $users->id
                , 'is_active' => 1
            ]);
        }
        session()->flash('pine-msg', ['pine_title' => 'Registered', 'pine_body' => 'You have successfully add a Patient', 'pine_type' => 'success', 'pine_icon' => 'ti ti-check']);
        session()->flash('swal-msg', 'swal({html:true,title:"Successful", text:"The Patients Folder Number is <strong style=\"color: blue;\">'.$patients->folder_number.'</strong>", type:"success",showCancelButton: true,confirmButtonText:"Print Details",cancelButtonText:"Close",closeOnConfirm: false,closeOnCancel:true})');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        return DataTables::of(Patient::all())->addColumn('action', function ($data) {
            return
//                '<a href="' . route('patient.bill', $data->id) . '" class="btn btn-info btn-sm"><i class="fa fa-money"></i></a> ' .
                '<a href="' . route('patient.edit', $data->id) . '" class="btn btn-info btn-sm"><i class="ti ti-pencil"></i></a> ' .
                '<a href="' . route('patient.delete', $data->id) . '" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>';
        })->editColumn('name', function ($data) {
            return $data->last_name . " " . $data->first_name . " " . $data->other_name;
        })->editColumn('gender', function ($data) {
            return $data->gender()->first()->gender_name;
        })->toJson();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
        $country = Country::all();
        $religion = Religion::all();
        $marital_status = MaritalStatus::all();
        $ethnicity = Ehnicity::all();
        $educational_status = Education::all();
        $race = Race::all();
        $gender = Gender::all();
        $type_of_patient = TypeOfPatient::all();
        $patient_group = PatientGroup::all();
        $parity = Parity::all();
        $clinical_visit = ClinicalVisit::all();
        $facility_category = FacilityCategory::all();
        $gestational_age = GestationalAge::all();
        $insurance_name = TypeOfInsurance::all();
        $next_of_king_relationship = NextOfKinRelationship::all();
        return view('admin.patients.edit',
            compact('clinical_visit',
                'type_of_patient', 'patient_group',
                'gender', 'country', 'next_of_king_relationship',
                'religion', 'marital_status', 'ethnicity',
                'educational_status', 'race', 'parity',
                'facility_category', 'gestational_age', 'insurance_name', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required'
        ]);
        //
        $users = auth()->user();
        if (empty($users->department)) {
            return redirect()->back()->withInput()->withErrors("You are Not Under a department, Can not Update Patients");
        } else {

            $patient->first_name=$request->input('first_name');
            $patient->other_name=$request->input('other_name');
            $patient->last_name=$request->input('last_name');
            $patient->gender=$request->input('gender');
            $patient->dob=$request->input('dob');
            $patient->nationality=$request->input('nationality');
            $patient->parity=$request->input('parity');
            $patient->address=$request->input('address');
            $patient->occcupation=$request->input('occcupation');
            $patient->marital_status=$request->input('marital_status');
            $patient->religion=$request->input('religion');
            $patient->educational_status=$request->input('educational_status');
            $patient->patient_phone_number=$request->input('patient_phone_number');
            $patient->place_of_birth=$request->input('place_of_birth');
            $patient->ethnicity=$request->input('ethnicity');
            $patient->patient_group=$request->input('patient_group');
            $patient->next_of_king_name=$request->input('next_of_king_name');
            $patient->next_of_king_relationship=$request->input('next_of_king_relationship');
            $patient->next_of_king_contact=$request->input('next_of_king_contact');
            $patient->referring_hospital_Clinic=$request->input('referring_hospital_Clinic');
            $patient->race=$request->input('race');
            $patient->facility_category=$request->input('facility_category');
            $patient->facility_status=$request->input('facility_status');
            $patient->emergency_referral=$request->input('emergency_referral');
            $patient->gestational_age=$request->input('gestational_age');
            $patient->reason_for_referral=$request->input('reason_for_referral');
            $patient->clinical_visit=$request->input('clinical_visit');
            $patient->type_of_patient=$request->input('type_of_patient');
            $patient->insurance_name=$request->input('insurance_name');
            $patient->insurance_number=$request->input('insurance_number');

            $patient->save();
            session()->flash('pine-msg', ['pine_title' => 'Updated', 'pine_body' => 'You have successfully updated Patient data', 'pine_type' => 'success', 'pine_icon' => 'ti ti-check']);
            return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        if (auth()->user()->can('delete_patient')) {
            $patient->delete();
            session()->flash('pine-msg', ['pine_title' => 'Deleted', 'pine_body' => 'You have successfully Deleted a Patient', 'pine_type' => 'danger', 'pine_icon' => 'ti ti-check']);
            return redirect()->back();

        } else {
            return redirect()->back()->withErrors("You Dont Have Permission To delete Patients");
        }

    }

    public function bill(Patient $patient)
    {

        return view('admin.patients.view', compact('patient'));

    }

    public function prints()
    {
//        dd('mel');
        $data = array('name' => 'mel');
        $pdf = PDF::loadView('errors.403', $data);
//    return $pdf->download('invoice.pdf');
        $pdf->save(storage_path() . '/userFolders/uniquename11.pdf');
        return $pdf->stream();
    }
}
