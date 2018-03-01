<?php

namespace App\Http\Controllers;

use App\ItemisedBill;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ItemisedBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.Itemisedbill.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.Itemisedbill.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'cost'=>'required',
            ]);
        //
        ItemisedBill::create($request->except('_token'));
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ItemisedBill  $itemisedBill
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $item=ItemisedBill::all();
       return DataTables::of($item)->addColumn('action', function ($data) {
           return '<a href="' . route('itemisedbill.edit', $data->id) . '" class="btn btn-info btn-sm"><i class="ti ti-pencil"></i></a> ' .
               '<a href="' . route('itemisedbill.delete', $data->id) . '" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></a>';
       })->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ItemisedBill  $itemisedBill
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemisedBill $itemisedBill)
    {
        //
        return view('admin.Itemisedbill.edit',compact('itemisedBill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ItemisedBill  $itemisedBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemisedBill $itemisedBill)
    {
        $this->validate($request,
            [
                'name'=>'required',
                'cost'=>'required',
            ]);
        //
        $itemisedBill->name=$request->input('name');
        $itemisedBill->cost=$request->input('cost');;
        $itemisedBill->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ItemisedBill  $itemisedBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemisedBill $itemisedBill)
    {
        //
        if (auth()->user()->can('delete_item_bill')){
            $itemisedBill->delete();
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors("You dont Have Permission to do this action");
        }
    }
    public function pull(ItemisedBill $itemisedBill){
//        dd($itemisedBill);
        return response()->json(['data'=>$itemisedBill]);
    }
}
