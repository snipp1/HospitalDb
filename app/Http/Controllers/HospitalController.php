<?php

namespace App\Http\Controllers;

use App\AuditTrails;
use App\Hospital;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.hospital.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.hospital.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'postal_address'=>'required',
            'location'=>'required',
            'website'=>'sometimes',
            'sms_username'=>'sometimes',
            'sms_password'=>'sometimes' ,
            'email_username'=>'sometimes',
            'email_password'=>'sometimes' ,'product_key'=>'sometimes'
        ]);
        //

        $hospital=Hospital::create($request->except('_token'));
        $msg=\auth()->user()->username.' Added a new Hospital to the system with name '.$hospital->name;

        session()->flash('pine-msg',['pine_title'=>'SUCCESSFUL','pine_body'=>'You have successfully added New Hospital','pine_type'=>'success','pine_icon'=>'ti ti-check']);
        AuditTrails::create([
            'user_id'=>\auth()->id(),'date_made'=>date(now()),'activity'=>$msg
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       return DataTables::of(Hospital::all())->addColumn('action',function ($data){
           if ($data->is_locked==0){
               return '<a href="' . route('hospital.view', $data->id) . '" title="view details of Hospital" class="btn btn-info btn-sm"><i class="ti ti-eye"></i></a> ' .
               '<a href="' . route('hospital.edit', $data->id) . '" title="edit details of Hospital" class="btn btn-info btn-sm"><i class="ti ti-pencil"></i></a> ' .
                   '<a href="' . route('hospital.lock', $data->id) . '" title="Lock Hospital" class="btn btn-danger btn-sm"><i class="ti ti-lock"></i></a> '.
                   '<a href="' . route('hospital.delete', $data->id) . '" title="Delete Hospital" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>';
           }else{
               return '<a href="' . route('hospital.view', $data->id) . '" title="view details of Hospital" class="btn btn-info btn-sm"><i class="ti ti-eye"></i></a> ' .
                   '<a href="' . route('hospital.edit', $data->id) . '" title="edit details of Hospital" class="btn btn-info btn-sm"><i class="ti ti-pencil"></i></a> ' .
                   '<a href="' . route('hospital.lock', $data->id) . '" title="Unlock Hospital"class="btn btn-warning btn-sm"><i class="ti ti-unlock"></i></a> '.
                   '<a href="' . route('hospital.delete', $data->id) . '" title="Delete Hospital" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>';
           }
       })->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit(Hospital $hospital)
    {
        //
        return view('admin.hospital.edit',compact('hospital'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        //
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'postal_address'=>'required',
            'location'=>'required',
            'website'=>'sometimes',
            'sms_username'=>'sometimes',
            'sms_password'=>'sometimes' ,
            'email_username'=>'sometimes',
            'email_password'=>'sometimes' ,'product_key'=>'sometimes'
        ]);
        $old_name=$hospital->name;
        $hospital->name=$request->input('name');
            $hospital->email=$request->input('email');
            $hospital->phone=$request->input('phone');
            $hospital->postal_address=$request->input('postal_address');
            $hospital->location=$request->input('location');
            $hospital->website=$request->input('website');
            $hospital->sms_username=$request->input('sms_username');
            $hospital->sms_password=$request->input('sms_password');
            $hospital->email_username=$request->input('email_username');
            $hospital->email_password=$request->input('email_password');
            $hospital->product_key=$request->input('product_key');

        $msg=\auth()->user()->username.' Edited a Hospital in the system with old name'.$old_name.' and new name '.$hospital->name;
            $hospital->save();


        session()->flash('pine-msg',['pine_title'=>'UPDATED','pine_body'=>'You have successfully Updated Hospital','pine_type'=>'success','pine_icon'=>'ti ti-check']);
        AuditTrails::create([
            'user_id'=>\auth()->id(),'date_made'=>date(now()),'activity'=>$msg
        ]);
            return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        //
        $msg=\auth()->user()->username.' Deleted a Hospital in the system with old name'.$hospital->name;

        $hospital->delete();
        session()->flash('pine-msg',['pine_title'=>'Deleted','pine_body'=>'You have successfully Deleted Hospital','pine_type'=>'danger','pine_icon'=>'ti ti-check']);
        AuditTrails::create([
            'user_id'=>\auth()->id(),'date_made'=>date(now()),'activity'=>$msg
        ]);
        return redirect()->back();
    }

    public function lock(Hospital $hospital){
        if ($hospital->is_locked==0){
            $hospital->is_locked=1;
            $msg=\auth()->user()->username.' Locked a Hospital in the system with name '.$hospital->name;
$locked='LOCKED';
            $color='danger';
        }else{
            $hospital->is_locked=0;
            $msg=\auth()->user()->username.' unLocked a Hospital in the system with name '.$hospital->name;
            $locked='UnLOCKED';
            $color='success';
        }
        $hospital->save();


        session()->flash('pine-msg',['pine_title'=>$locked,'pine_body'=>'You have successfully Updated Hospital','pine_type'=>$color,'pine_icon'=>'ti ti-check']);
        AuditTrails::create([
            'user_id'=>\auth()->id(),'date_made'=>date(now()),'activity'=>$msg
        ]);
        return redirect()->back();
    }

    public function view(Hospital $hospital){
//        TODO : some view for hospital details
        return view('admin.hospital.edit',compact('hospital'));

    }
}
