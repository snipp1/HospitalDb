<?php

namespace App\Http\Controllers;

use App\BillPayment;
use App\Bills;
use App\Patient;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BillPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.payments.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient)
    {
        //
        return view('admin.payments.show', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BillPayment $billPayment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $this->validate($request, [
            'search' => 'required'
        ]);
        $patients = Patient::query()->where('folder_number', $request->input('search'))
            ->orWhere('first_name', 'like', $request->input('search') . '%')
            ->orWhere('other_name', 'like', $request->input('search') . '%')
            ->orWhere('last_name', 'like', $request->input('search') . '%')
            ->get();// add query for by department and by hospital
        return DataTables::of($patients)->addColumn('action', function ($data) {
            return '<a href="' . route('patient.billing.payment.create', $data->id) . '" class="btn btn-info btn-sm"><i class="fa fa-money"></i></a> ';
        })->editColumn('name', function ($data) {
            return $data->last_name . " " . $data->first_name . " " . $data->other_name;
        })->editColumn('gender', function ($data) {
            return $data->gender()->first()->gender_name;
        })->toJson();
    }

    public function bills(Patient $patient)
    {
        $bills = $patient->bills()->where('is_paid', 0);
        // add query for by department and by hospital
        return DataTables::of($bills)->addColumn('action', function ($data) use ($patient) {
            return '<a href="#" onclick="showDetails('.$data->id.')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a> ' .
                '<a href="#" onclick="payBill('.$data->id.')" class="btn btn-success btn-sm"><i class="fa fa-money"></i></a> ';
        })->editColumn('id',function ($data) use ($patient){
            if (!empty($patient->department()->where('is_active',1)->first())){
                return $patient->department()->where('is_active',1)->first()->acronym.$data->id;
            }else{
                return "null";
            }
        })->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillPayment $billPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(BillPayment $billPayment)
    {
        //
    }

    public function view(Bills $bills)
    {
$items=$bills->items();
return DataTables::of($items)->addColumn('name',function ($data){
    return $data->itemised->name;
})->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\BillPayment $billPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillPayment $billPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillPayment $billPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillPayment $billPayment)
    {
        //
    }
}
