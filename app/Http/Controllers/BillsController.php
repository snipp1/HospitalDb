<?php

namespace App\Http\Controllers;

use App\BillItems;
use App\Bills;
use App\ItemisedBill;
use App\Patient;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.Bill.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
       $itm= ItemisedBill::all();

return view('admin.Bill.make',compact('patient','itm'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users=auth()->user();
        $patient=Patient::find($request->input('patient_id'));
       $bill= Bills::create([
            'patients_id'=>$patient->id,
            'patients_folder'=>$patient->folder_number,
            'biller_id'=>$users->id,
            'bill_amount'=>$request->input('bill_amount'),
            'bill_dep'=>$users->department->id,
            'bill_hospital'=>$users->hospital->id,
        ]);
       if (!empty($request->input('billitem'))){
           for ($x=0;$x< sizeof($request->input('billitem'));$x++){
               BillItems::create([
                   'bill_id'=>$bill->id,
                   'item_id'=>$request->input('billitem')[$x],
                   'item_price'=>$request->input('billitem_amount')[$x]
               ]);
           }
       }
        //
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request,[
           'search'=>'required'
        ]);
        $patients=Patient::query()->where('folder_number',$request->input('search'))
            ->orWhere('first_name','like',$request->input('search').'%')
            ->orWhere('other_name','like',$request->input('search').'%')
            ->orWhere('last_name','like',$request->input('search').'%')
            ->get();// add query for by department and by hospital
        return DataTables::of($patients)->addColumn('action',function ($data){
            return '<a href="' . route('patient.billing.create', $data->id) . '" class="btn btn-info btn-sm"><i class="fa fa-money"></i></a> ';
        })->editColumn('name',function ($data){
            return $data->last_name." ".$data->first_name." ".$data->other_name;
        })->editColumn('gender',function ($data){
            return $data->gender()->first()->gender_name;
        })->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function edit(Bills $bills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bills $bills)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bills $bills)
    {
        //
    }
}
