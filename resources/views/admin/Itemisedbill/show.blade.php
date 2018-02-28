@extends('layout.base')

@section('title')
    Itemised Bill
@endsection

@push('stylesheet')
@endpush
@push('breadcramps')
    <ol class="breadcrumb">


        <li class="active"><a href="{{route('itemisedbill.index')}}">Itemised Bill</a></li>

    </ol>
@endpush
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Itemised Bill</h2>
            <div class="panel-ctrls" style="padding-top: 10px;" >
                <a href="{{route('itemisedbill.create')}}" class="btn btn-default"><i class="ti ti-pencil"></i> Add Itemised Bill</a>
            </div>
        </div>
        <div class="panel-body ">

            <table id="ayear-table" class=" table table-striped " cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Cost</th>
                    {{--<th>Description</th>--}}
                    <th>Actions</th>
                </tr>
                </thead>

            </table>
        </div>
        <div class="panel-footer"></div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#ayear-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                dom: 'lfrtip',
                ajax: {url:'{!! route('itemisedbill.show') !!}',type:'POST','headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }},
                columns: [

                    { data: 'name', name: 'name' },
                    { data: 'cost', name: 'cost' },
//                    { data: 'description', name: 'description' },
                    { data: 'action', name: 'action' ,orderable:false ,searchable:false},
                ],
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]
            });
            $('.input-sm').attr('placeholder','Search...');
            $('.input-sm').addClass('form-control');
            $('.dt-buttons').addClass('btn-group');
            $('.dt-buttons a').addClass('btn btn-info');
        });

    </script>

@endpush