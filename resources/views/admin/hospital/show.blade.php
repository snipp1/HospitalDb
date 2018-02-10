@extends('layout.base')

@section('title')
    Hospital
@endsection

@push('stylesheet')
@endpush
@push('breadcramps')
    <ol class="breadcrumb">


        <li class="active"><a href="{{route('hospital.index')}}">Hospital</a></li>

    </ol>
@endpush
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Hospital</h2>
            <div class="panel-ctrls" style="padding-top: 10px;" >
                <a href="{{route('hospital.create')}}" class="btn btn-default"><i class="ti ti-pencil"></i> Add Hospital</a>
            </div>
        </div>
        <div class="panel-body ">

            <table id="ayear-table" class=" table table-striped " cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th> Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Website</th>
                    <th>Location</th>
                    <th>Action</th>
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
                ajax: {url:'{!! route('hospital.show') !!}',type:'POST','headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }},
                columns: [

                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'website', name: 'website' },
                    { data: 'location', name: 'loaction' },
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