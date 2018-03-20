@extends('layout.base')

@section('title')
    Add Patients
@endsection

@push('stylesheet')
@endpush
@push('breadcramps')
    <ol class="breadcrumb">
        <li class=""><a href="{{route('patient.index')}}">Patients</a></li>
        <li class="active"><a href="{{route('patient.create')}}">New Patients</a></li>
    </ol>
@endpush
@section('contents')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="panel panel-default">
        <form action="{{route('patient.store')}}" method="post">
            {{csrf_field()}}
            <div class="panel-heading">
                <h2>New Patient</h2>
                <div class="panel-ctrls" style="padding-top: 10px;">
                </div>
            </div>
            <div class="panel-body">

                <div class="grid-form">
                    <fieldset>
                        <legend>Patient's Personal Details </legend>

                        <div data-row-span="3">
                            {{--<div data-field-span="1">--}}
                                {{--<label>Title</label>--}}
                                {{--<label><input type="radio" name="customer-title[]"> Mr.</label> &nbsp;--}}
                                {{--<label><input type="radio" name="customer-title[]"> Mrs.</label> &nbsp;--}}
                                {{--<label><input type="radio" name="customer-title[]"> Ms.</label>--}}
                            {{--</div>--}}
                            <div data-field-span="1">
                                <label>Surname Name</label>
                                <input type="text" name="last_name">
                            </div>
                            <div data-field-span="1">
                                <label>First Name</label>
                                <input type="text" name="first_name">
                            </div>
                            <div data-field-span="1">
                                <label>Other Name</label>
                                <input type="text" name="other_name">
                            </div>
                        </div>
                        <div data-row-span="4">
                            <div data-field-span="1">
                                <label>Gender</label>
                                <select name="gender" class="form-control" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($gender as $item)
                                        @if(!empty(old('gender')))
                                            @if(old('gender')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->gender_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->gender_name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->gender_name}}</option>

                                        @endif
                                    @endforeach
                                </select>&nbsp;
                            </div>
                            <div data-field-span="1">
                                <label>Date of birth</label>
                                <input type="date" name="dob" class="form-control">
                            </div>
                            <div data-field-span="2">
                                <label>Place of Birth</label>
                                <input type="text" name="place_of_birth">
                            </div>

                        </div>
                        <div data-row-span="4">
                            <div data-field-span="1">
                                <label>Nationality</label>
                                <select name="nationality" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($country as $item)
                                        @if(!empty(old('nationality')))
                                            @if(old('nationality')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->country_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->country_name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->country_name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div data-field-span="1">
                                <label>Religion</label>
                                <select name="religion" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($religion as $item)
                                        @if(!empty(old('religion')))
                                            @if(old('religion')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->religion_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->religion_name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->religion_name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div data-field-span="1">
                                <label>Ethnicity</label>
                                <select name="ethnicity" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($ethnicity as $item)
                                        @if(!empty(old('ethnicity')))
                                            @if(old('ethnicity')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div data-field-span="1">
                                <label>Race</label>
                                <select name="race" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($race as $item)
                                        @if(!empty(old('race')))
                                            @if(old('race')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div data-row-span="5">
                            <div data-field-span="1">
                                <label>Mobile No.</label>
                                <input type="text" name="patient_phone_number">
                            </div>
                            <div data-field-span="2">
                                <label>Address</label>
                                <input type="text" name="address">
                            </div>
                            <div data-field-span="2">
                                <label>Occcupation</label>
                                <input type="text"name="occcupation">
                            </div>

                        </div>
                        <div data-row-span="5">
                            <div data-field-span="1">
                                <label>Educational Status</label>
                                <select name="educational_status" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($educational_status as $item)
                                        @if(!empty(old('educational_status')))
                                            @if(old('educational_status')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->edu_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->edu_name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->edu_name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div data-field-span="1">
                                <label>Marital Status</label>
                                <select name="marital_status" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($marital_status as $item)
                                        @if(!empty(old('marital_status')))
                                            @if(old('marital_status')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->ms_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->ms_name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->ms_name}}</option>

                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div data-field-span="2">
                                <label>Next Of Kin Name</label>
                                <input type="text" name="next_of_king_name">
                            </div>

                        </div>
<div data-row-span="3">
    <div data-field-span="1">
        <label>Next Of Kin Relationship</label>
        <select name="next_of_king_relationship" id="">
            <option value="" >-- select--</option>
            @foreach($next_of_king_relationship as $item)
                @if(!empty(old('next_of_king_relationship')))
                    @if(old('next_of_king_relationship')==$item->id)
                        <option value="{{$item->id}}" selected>{{$item->name}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                @else

                    <option value="{{$item->id}}">{{$item->name}}</option>

                @endif
            @endforeach
        </select>
    </div>
    <div data-field-span="2">
        <label>Next Of Kin Contact</label>
        <input type="text" name="next_of_king_contact">
    </div>

</div>
                        <br>
                        <fieldset>
                            <legend>Referral Information</legend>
                            <div data-row-span="2">
                                <div data-field-span="1">
                                    <label>Referring Hospital/Clinic</label>
                                    <input type="text" name="referring_hospital_Clinic">
                                </div>
                                <div data-field-span="1">
                                    <label>Emergency Referral</label>
                                    <label><input value="Yes" type="radio" name="emergency_referral"> Yes</label> &nbsp;
                                    <label><input value="No" type="radio" name="emergency_referral"> No</label> &nbsp;

                                </div>
                            </div>
                            <div data-row-span="1">
                                <div data-field-span="1">
                                    <label>Reason for Referral</label>
                                    <input type="text" name="reason_for_referral">
                                </div>

                            </div>

                        </fieldset>
                    </fieldset>
                    <fieldset>
                        <legend>Patient's  Hospital Information</legend>
                        <div data-row-span="3">
                            <div data-field-span="1">
                                <label>Patient Group</label>
                                <select name="patient_group" class="form-control" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($patient_group as $item)
                                        @if(!empty(old('patient_group')))
                                            @if(old('patient_group')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endif
                                    @endforeach
                                </select>&nbsp;
                            </div>
                            <div data-field-span="1">
                                <label>Patient Type</label>
                                <select name="type_of_patient" class="form-control" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($type_of_patient as $item)
                                        @if(!empty(old('type_of_patient')))
                                            @if(old('type_of_patient')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endif
                                    @endforeach
                                </select>&nbsp;
                            </div>
                            <div data-field-span="1">
                                <label>Clinical Visit</label>
                                <select name="clinical_visit" class="form-control" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($clinical_visit as $item)
                                        @if(!empty(old('clinical_visit')))
                                            @if(old('clinical_visit')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endif
                                    @endforeach
                                </select>&nbsp;
                            </div>

                        </div>
                        <div data-row-span="3">
                            <div data-field-span="1">

                                <label>Parity</label>
                                <select name="parity" class="form-control" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($parity as $item)
                                        @if(!empty(old('parity')))
                                            @if(old('parity')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->parity_name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->parity_name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->parity_name}}</option>

                                        @endif
                                    @endforeach
                                </select>&nbsp;
                            </div>
                            <div data-field-span="1">
                                <label>Facility Category</label>
                                <select name="facility_category" class="form-control" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($type_of_patient as $item)
                                        @if(!empty(old('facility_category')))
                                            @if(old('facility_category')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endif
                                    @endforeach
                                </select>&nbsp;
                            </div>
                            <div data-field-span="1">
                                <label>Facility Status</label>
                                    <input type="text" name="facility_status">
                            </div>

                        </div>
                        <div data-row-span="3">


                            <div data-field-span="1">
                                <label>Gestational Age</label>
                                <select name="gestational_age" class="form-control" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($gestational_age as $item)
                                        @if(!empty(old('gestational_age')))
                                            @if(old('gestational_age')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endif
                                    @endforeach
                                </select>&nbsp;
                            </div>
                            <div data-field-span="1">
                                <label>Insurance Name</label>
                                <select name="insurance_name" class="form-control" id="">
                                    <option value="" >-- select--</option>
                                    @foreach($insurance_name as $item)
                                        @if(!empty(old('insurance_name')))
                                            @if(old('insurance_name')==$item->id)
                                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endif
                                        @else

                                            <option value="{{$item->id}}">{{$item->name}}</option>

                                        @endif
                                    @endforeach
                                </select>&nbsp;
                            </div>

                            <div data-field-span="1">
                                <label>Insurance Number</label>
                                <input type="text" name="insurance_number">
                            </div>
                        </div>
                    </fieldset>



                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group col-sm-12 text-center">
                    <input type="submit" class="btn btn-default" name="" id="" value="Submit">
                    <a href="{{route('patient.index')}}" class="btn btn-orange" name="" id=""><i
                                class="ti ti-back-left"></i>Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    @if(session()->has('pine-msg'))
        <script>
            {!! session("swal-msg")!!}
        </script>


    @endif

@endpush