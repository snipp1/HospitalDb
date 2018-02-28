@extends('layout.base')

@section('title')
      Patient's Bill List
@endsection

@push('stylesheet')
@endpush
@push('breadcramps')
    <ol class="breadcrumb">
        <li class=""><a href="{{route('patient.billing.payment.index')}}">Patient's Bill List </a></li>

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
        <form action="{{route('patient.billing.payment.store')}}" method="post">
            {{csrf_field()}}
            <div class="panel-heading">
<h2>Patient's Bill List</h2>

            </div>
            <div class="panel-body">
                <table id="ayear-table" class=" table table-striped " cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Bill ID</th>
                        <th>Bill Amount</th>
                        <th>Paid Amount</th>
                        <th>Arrears</th>
                        <th>Paid Date</th>
                        {{--<th>Date of Birth</th>--}}
                        {{--<th>Email</th>--}}
                        {{--<th>Phone</th>--}}
                        {{--<th>Hospital</th>--}}
                        {{--<th>Department</th>--}}
                        {{--<th>Status</th>--}}
                        {{--<th>Online</th>--}}
                        <th>Action</th>

                    </tr>
                    </thead>

                </table>
            </div>

        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h2 class="modal-title">Modal title</h2>
                </div>
                <div class="modal-body">
                    <div class=" clearfix row">
                        <table id="myModal-table" class=" table table-striped " cellspacing="0" width="100%">
                            <thead>
                            <tr>

                                <th>Item Name</th>
                                <th>Amount</th>

                            </tr>
                            </thead>

                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- Modal -->
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h2 class="modal-title">Modal title</h2>
                </div>
                <div class="modal-body">
                    <div class=" clearfix row">
                        <div class="form-group col-sm-offset-2 col-sm-8 ">
                            <label class="col-sm-12 control-label">Amount Paid</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" value="{{old('paid_amount')}}" name="paid_amount" id="paid_amount"
                                       placeholder="">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    <button type="button" id="pay_bill" class="btn btn-default">Submit</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

@push('scripts')
    <script>

        var maintable;
        function showDetails(ids) {
            var id=ids;
            var url = '{{ route("patient.billing.payment.view", [":bills"]) }}';
            url = url.replace(':bills', id);
            Details(url);
            $("#myModal").modal()
        }

        function payBill(ids) {
            var bill_id=ids;
            var paid_amount=$('#paid_amount').val()
// $("#myModal1").modal();
//            maintable.ajax.reload();

        }
    $(function () {
        var id='{!! $patient->id !!}'
        var url = '{{ route("patient.billing.payment.bill", [":patient"]) }}';
        url = url.replace(':patient', id);
    datatabes(url);
    //            alert('mel')
    //submit

    })

    function datatabes(url) {
        maintable=$('#ayear-table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    dom: 'rtip',
    destroy: true,
    ajax: {url:url,type:'POST','headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }},

    columns: [
    { data: 'id', name: 'id' },
    { data: 'bill_amount', name: 'bill_amount' },
    { data: 'paid_amount', name: 'paid_amount' },
    { data: 'arrears', name: 'arrears' },
    { data: 'paid_date', name: 'paid_date' },
    //                { data: 'charge_method', name: 'charge_method' },
    //                { data: 'created_at', name: 'created_by' },
    { data: 'action', name: 'Actions' ,orderable:false ,searchable:false},
    ]
    });
    }

    function Details(url) {
    $('#myModal-table').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    dom: 'rtip',
    destroy: true,
    ajax: {url:url,type:'POST','headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }},

    columns: [
    { data: 'name', name: 'name' },
    { data: 'item_price', name: 'item_price' }
    ]
    });
    }
    </script>

@endpush