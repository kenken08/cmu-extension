@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card2" style="margin-top:70px">
            <div class="box-body">
                <img class="img img-circle" src="/storage/profile_images/{{auth()->user()->profile_image}}" alt="{{user()->firstname}}" style="width:150px;height:150px; margin-top:-85px">
                <br>
                <br>
                <h3><i class="fa -fa-fw fa-user-circle"></i>&nbsp;<br>{{auth()->user()->firstname.' '.auth()->user()->lastname}}</h3>
                <p><i class="fa fa-fw fa-birthday-cake"></i>&nbsp;{{date('M d, Y', strtotime(auth()->user()->born_at))}}</p>
                @if(user()->contactno == null)
                    <p><i class="fa fa-fw fa-mobile"></i>&nbsp;Not Set</p>
                @else
                    <p><i class="fa fa-fw fa-mobile"></i>&nbsp;{{ auth()->user()->contactno }}</p>
                @endif
                <p><i class="fa fa-fw fa-envelope"></i>&nbsp;{{auth()->user()->email}}</p>
            </div>
        </div>
    </div>
    {!! Form::open(['action'=>'HomeController@changepassword','method'=>'POST'])!!}
    {!! csrf_field() !!}
    <div class="col-md-8">
        <div class="box box-success1">
            <div class="box-header">
                <h4><i class="fa fa-edit"></i> Change Password</h4>
            </div>
            <div class="box-body">
                <div class="col col-12">
                    <div class="form-group {{ form_error_class('old_password', $errors) }}">
                        <label for="password">Current Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        </div>
                        {!! form_error_message('old_password', $errors) !!}
                    </div>
                </div>

                <div class="col col-12">
                    <div class="form-group {{ form_error_class('password', $errors) }}">
                        <label for="password">New Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" >
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        </div>
                        {!! form_error_message('password', $errors) !!}
                    </div>
                </div>

                <div class="col col-12">
                    <div class="form-group {{ form_error_class('password_confirmation', $errors) }}">
                        <label>Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="id-password_confirmation" name="password_confirmation" placeholder="Password Confirm" value="{{ ($errors->any()? old('password_confirmation') : user()->password_confirmation) }}">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        </div>
                        {!! form_error_message('password_confirmation', $errors) !!}
                    </div>
                </div>
            </div>
            @include('admin.partials.form_footer')
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection