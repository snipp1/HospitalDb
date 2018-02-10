@extends('layout.base')

@section('title')
    Edit Hospital
@endsection

@push('stylesheet')
@endpush
@push('breadcramps')
    <ol class="breadcrumb">
        <li class=""><a href="{{route('hospital.index')}}">Hospital</a></li>

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
        <form action="{{route('hospital.update',$hospital->id)}}" method="post">
            {{csrf_field()}}
            <div class="panel-heading">
                <h2>Edit Hospital</h2>
                <div class="panel-ctrls" style="padding-top: 10px;">

                </div>
            </div>
            <div class="panel-body">

                <div class="row">
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">Hospital Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{$hospital->name or old('name')}}" name="name"
                                   placeholder="Unique role name">
                        </div>
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">Hospital Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" value="{{$hospital->email or old('email')}}" name="email"
                                   placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">Hospital Phone</label>
                        <div class="col-sm-12">
                            <input type="tel" class="form-control" value="{{$hospital->phone or old('phone')}}" name="phone"
                                   placeholder="phone">
                        </div>
                    </div>
                    <div class="form-group col-sm-6 ">
                        <label class="col-sm-12 control-label">Hospital Post Address</label>
                        <div class="col-sm-12">
                            <textarea name="postal_address" class="form-control" id="" style="resize: none;" >{{$hospital->postal_address or old('postal_address')}}</textarea>

                        </div>
                    </div>
                    <div class="form-group col-sm-6 ">
                        <label class="col-sm-12 control-label">Hospital Location</label>
                        <div class="col-sm-12">
                            <textarea name="location" class="form-control" id="" style="resize: none;" >{{$hospital->location or old('location')}}</textarea>

                        </div>
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">Website</label>
                        <div class="col-sm-12">
                            <input type="url" class="form-control" value="{{$hospital->website or old('website')}}" name="website"
                                   placeholder="website">
                        </div>
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">SMS Username</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{$hospital->sms_username or old('sms_username')}}" name="sms_username"
                                   placeholder="sms username">
                        </div>
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">SMS Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" value="{{$hospital->sms_password or old('sms_password')}}" name="sms_password"
                                   placeholder="sms password">
                        </div>
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">Email Username</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" value="{{$hospital->email_username or old('email_username')}}" name="email_username"
                                   placeholder="email username">
                        </div>
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">Email Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" value="{{$hospital->email_password or old('email_password')}}" name="email_password"
                                   placeholder="email password">
                        </div>
                    </div>
                    <div class="form-group col-sm-4 ">
                        <label class="col-sm-12 control-label">Product key</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" value="{{ $hospital->product_key or old('product_key')}}" name="product_key"
                                   placeholder="product key">
                        </div>
                    </div>

                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group col-sm-12 text-center">
                    <input type="submit" class="btn btn-default" name="" id="" value="Submit">
                    <a href="{{route('hospital.index')}}" class="btn btn-orange" name="" id=""><i
                                class="ti ti-back-left"></i>Back</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')


@endpush