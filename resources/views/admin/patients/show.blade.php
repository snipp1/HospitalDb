@extends('layout.base')

@section('title')
    Users
@endsection

@push('stylesheet')
@endpush
@push('breadcramps')
    <ol class="breadcrumb">


        <li class="active"><a href="{{route('users.index')}}">Users</a></li>

    </ol>
@endpush
@section('contents')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Users</h2>
            <div class="panel-ctrls" style="padding-top: 10px;" >
                <a href="{{route('users.create')}}" class="btn btn-default"><i class="ti ti-pencil"></i> Add Users</a>
            </div>
        </div>
        <div class="panel-body ">

            <table id="ayear-table" class=" table table-striped " cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Shift</th>
                    {{--<th>Name</th>--}}
                    {{--<th>Gender</th>--}}
                    {{--<th>Username</th>--}}
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
        $(function() {
            $('#ayear-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                dom: 'Blfrtip',
                ajax: {url:'{!! route('patient.show') !!}',type:'POST','headers': {'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }},
                columns: [


                    { data: 'folder_number', name: 'folder_number' },
//                    { data: 'name', name: 'name' },
//                    { data: 'gender', name: 'gender' },
//                    { data: 'username', name: 'username' },
//                    { data: 'email', name: 'email' },
//                    { data: 'official_phone', name: 'official_phone' },
//                    { data: 'hospital_id', name: 'pharmacy_id' },
//                    { data: 'department_id', name: 'brunch_id' },
//                    { data: 'is_locked', name: 'is_locked' },
//                    { data: 'is_login', name: 'is_login' },
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