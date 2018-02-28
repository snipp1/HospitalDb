@extends('layout.base')

@section('title')
    Patients List For Payments
@endsection

@push('stylesheet')
@endpush
@push('breadcramps')
    <ol class="breadcrumb">


        <li class="active"><a href="{{route('patient.index')}}">Patients</a></li>

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
        <div class="panel-heading">
            <h2> Patients List For Payments</h2>
            <div class="panel-ctrls" style="padding-top: 10px; width: 40%;" >
                <input type="text" class="form-control " name="" id="folder_search" placeholder="Enter Patient Folder or Name" style="width:80% !important; display: inline-block" >
                <button class="btn btn-info clearfix" type="button" id="status_gene">Search</button>
                {{--<a href="{{route('patient.create')}}" class="btn btn-default"><i class="ti ti-pencil"></i> Add Patients</a>--}}
            </div>
        </div>
        <div class="panel-body ">

            <table id="ayear-table" class=" table table-striped " cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Folder Name</th>
                    <th>Patients Name</th>
                    <th>Gender</th>
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
        <div class="panel-footer"></div>
    </div>
@endsection

@push('scripts')
    <script>
        {{--$(function() {--}}
            {{--$('#ayear-table').DataTable({--}}
                {{--processing: true,--}}
                {{--serverSide: true,--}}
                {{--responsive: true,--}}
                {{--dom: 'Blfrtip',--}}
                {{--ajax: {url:'{!! route('patient.show') !!}',type:'POST','headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'--}}
                {{--}},--}}
                {{--columns: [--}}


                    {{--{ data: 'folder_number', name: 'folder_number' },--}}
                    {{--{ data: 'name', name: 'name' },--}}
                    {{--{ data: 'gender', name: 'gender' },--}}
{{--//                    { data: 'dob', name: 'dob' },--}}
{{--//                    { data: 'email', name: 'email' },--}}
{{--//                    { data: 'official_phone', name: 'official_phone' },--}}
{{--//                    { data: 'hospital_id', name: 'pharmacy_id' },--}}
{{--//                    { data: 'department_id', name: 'brunch_id' },--}}
{{--//                    { data: 'is_locked', name: 'is_locked' },--}}
{{--//                    { data: 'is_login', name: 'is_login' },--}}
                    {{--{ data: 'action', name: 'action' ,orderable:false ,searchable:false},--}}
                {{--],--}}
                {{--buttons: [--}}
                    {{--'copy', 'csv', 'excel', 'pdf', 'print'--}}
                {{--],--}}
                {{--lengthMenu: [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]]--}}
            {{--});--}}
            {{--$('.input-sm').attr('placeholder','Search folder name');--}}
            {{--$('.input-sm[type="search"]').css('width','250px').css('height','35px').css('font-size','14px');--}}
            {{--$('.input-sm').addClass('form-control');--}}
            {{--$('.dt-buttons').addClass('btn-group');--}}
            {{--$('.dt-buttons a').addClass('btn btn-info');--}}
        {{--});--}}
        $('#status_gene').on('click',function () {
            var folder= $('#folder_search').val().trim();

            if (folder==""||folder==" "){
alert('Enter Folder Name or Patients Name')

            }else {
                var   url=  '{!! route('patient.billing.payment.show') !!}';
                var  data= {
                    'search': folder
                }
                datatabes(url,data);
//            alert('mel')
                //submit
            }
        })

        function datatabes(url,data) {
            $('#ayear-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                dom: 'rtip',
                destroy: true,
                ajax: {url:url,type:'POST','headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }, 'data':data},

                columns: [
                    { data: 'folder_number', name: 'folder_number' },
                    { data: 'name', name: 'name' },
                    { data: 'gender', name: 'gender' },
//                { data: 'charge_method', name: 'charge_method' },
//                { data: 'created_at', name: 'created_by' },
                { data: 'action', name: 'Actions' ,orderable:false ,searchable:false},
                ]
            });
        }
    </script>

@endpush