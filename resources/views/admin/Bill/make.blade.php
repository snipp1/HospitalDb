@extends('layout.base')

@section('title')
     Bill Patients
@endsection

@push('stylesheet')
@endpush
@push('breadcramps')
    <ol class="breadcrumb">
        <li class=""><a href="{{route('patient.billing.index')}}">Patients List </a></li>

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
    <div class="row">
        <div class="form-group col-sm-6 ">
            <div class="col-sm-12">
                <input readonly type="text" class="form-control" value="{{$patient->folder_number }}" name="name"
                       placeholder="Unique role name">
            </div>
        </div>

        <div class="form-group col-sm-6 ">

            <div class="col-sm-12">
                <input readonly type="text" class="form-control" value="{{$patient->last_name." ".$patient->first_name." ".$patient->other_name}}" name="cost"
                       placeholder="Description">
            </div>
        </div>

    </div>

    <div class="panel panel-default">
        <form action="{{route('patient.billing.store')}}" method="post">
            {{csrf_field()}}
            <div class="panel-heading">

                <div class="panel-ctrls" style="padding-top: 10px;padding-bottom: 10px; width: 100% !important;">
                    <div class="col-sm-6">
                        <select name="" class="form-control" id="bill_item">
                            <option value="">-- Select --</option>
                            @foreach($itm as $item)
                                @if(!empty(old('hospital_id')))
                                    @if(old('hospital_id')==$item->id)
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
                    <div class="col-sm-4">
                        <input type="text" name="bill_item_amount"  class="form-control" id="bill_item_amount" readonly >
                    </div>
                    <div class="col-sm-2">
                        <input type="button" name="" id="add_to_order" class="btn btn-success" value="add">
                    </div>

                    </div>
            </div>
            <div class="panel-body">
                <input type="text" name="patient_id" id="" value="{{$patient->id}}" hidden>
                <input type="text" name="bill_amount" id="bill_amount" value="" hidden>
                <div class="row">
                    <div class="col-sm-9">
                        <table id="load-table" class=" table table-striped m-n " cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Itemised Bill</th>
                                <th>Cost</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="order_list">

                            </tbody>

                        </table>
                    </div>
                    <div class="col-sm-3">
                        <div class="info-tile info-tile-alt tile-brown">
                            <div class="tile-icon"><i class="ti ti-shopping-cart"></i></div>
                            <div class="tile-heading"><span>Total Amount</span></div>
                            <div class="tile-body">GH₵ <span id="main_total">0</span></div>

                        </div>
                    </div>
                </div>
                    {{--<div class="form-group col-sm-4 ">--}}
                        {{--<label class="col-sm-12 control-label">Itemised Bill name</label>--}}
                        {{--<div class="col-sm-12">--}}
                            {{--<input type="text" class="form-control" value="{{$itemisedBill->name or old('name')}}" name="name"--}}
                                   {{--placeholder="Unique role name">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="form-group col-sm-4 ">--}}
                        {{--<label class="col-sm-12 control-label">Amount</label>--}}
                        {{--<div class="col-sm-12">--}}
                            {{--<input type="text" class="form-control" value="{{$itemisedBill->cost or old('cost')}}" name="cost"--}}
                                   {{--placeholder="Description">--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            </div>
            <div class="panel-footer">
                <div class="form-group col-sm-12 text-center">
                    <input type="submit" class="btn btn-default" name="" id="" value="Submit">
                    <a href="{{route('patient.billing.index')}}" class="btn btn-orange" name="" id=""><i
                                class="ti ti-back-left"></i>Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $('#bill_item').on("change", function () {
            var id = $(this).val();
            if (!id) {
                $('#bill_item_amount').val("");
            } else {
                var url = '{{ route("itemisedbill.pull", [":itemisedBill"]) }}';
                url = url.replace(':itemisedBill', id);
                {{--url = url.replace(':medicine', id);--}}
                $.get(url, function (data) {
                    console.log(data);

                    $('#bill_item_amount').val(data.data.cost);
//                alert(data.qnty_bought)
//                    $('#item_qnty').val(data[0].qnty_bought)
//                    $('#unit_prices').val(data[0].unit_price)
//                    $('#order_qnty').trigger('keyup');
                }, "json")
            }

        })
        
        $('#add_to_order').on('click', function () {
            var bill_item = $("#bill_item").val();
            var bill_item_amount = $('#bill_item_amount').val();
            var bill_item_name=$("#bill_item option:selected").text();
            if(bill_item=="" || bill_item_amount=="" ){
                alert("Select Item ")
            }else{

//                amount= round(amount, 2).toFixed(2);
//                object='{"med_name":"'+ med_name +'","med_id":'+ med+',"unit_text":"'+opt_text+'","unittype":'+unit+',"qnty":'+qnty+',"amount":'+amount+'}'
//           json='['+object+']'
                $('#order_list').append('<tr>' +
                    '                    <td ><input type="text" name="billitem[]" class="" id="" style="display: none;" value="'+bill_item+'"></td>' +
                    '                    <td> <input type="text" name="" class="form-control" id="" readonly value="'+bill_item_name+'"></td>' +
                    '                    <td> <input type="text" name="billitem_amount[]" class="form-control" id="" readonly value="'+bill_item_amount+'"></td>' +
                    '                    <td><button class="btn btn-danger btn-sm order_item_remove" value="" type="button"><i class="ti ti-close"></i></button></td>' +
                    '                </tr>')
//                arrays.push(object);
//                console.log(arrays);
                calculateTotal();
            }
        })

        $('#order_list').on("click",".order_item_remove",function () {
            var id=$(this).val();
           var parent= $(this).parents('tr')
           var values= parent.find('td:eq(2) input[name="billitem_amount[]"]').val();
//           var values= parent.find('td input[name="billitem_amount"]').val();
//           alert(values);
            parent.remove();
            total-=parseFloat(values);
            $('#main_total').html(total)
            $('#bill_amount').val(total)
            //alert(some)
        })

        var   total=0.00;
        function calculateTotal() {
//
         total+=parseFloat($('#bill_item_amount').val());

            var r_total=round(total, 2).toFixed(2)

            $('#main_total').html(r_total)
            $('#bill_amount').val(r_total)
        }

        function round(value, exp) {
            if (typeof exp === 'undefined' || +exp === 0)
                return Math.round(value);

            value = +value;
            exp = +exp;

            if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0))
                return NaN;

            // Shift
            value = value.toString().split('e');
            value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp)));

            // Shift back
            value = value.toString().split('e');
            return +(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp));
        }
    </script>

@endpush