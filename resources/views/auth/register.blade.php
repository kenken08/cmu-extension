@extends('layouts.website')

@section('content')
<br>
<div class="container animated fadeIn">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-custom text-white">{{ __('REGISTER') }}</div>

                <div class="card-body">
                    {!! Form::open(['action' => 'UserController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @csrf
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                        <label for="firstname">Firstname</label>
                                        <div class="input-group">
                                            <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="{{ old('firstname') }}" required autofocus>
                                        </div>
                                        {!! form_error_message('firstname', $errors) !!}
                                    </div>
                                </div>
            
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                        <label for="lastname">Lastname</label>
                                        <div class="input-group">
                                            <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="{{ old('lastname') }}">
                                        </div>
                                        {!! form_error_message('lastname', $errors) !!}
                                    </div>
                                </div>
                            </div>
            
                            <div class="row">
                                <div class="col-md-6">
                                    <section class="form-group {{ form_error_class('email', $errors) }}">
                                        <label for="email">Email Address</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email Address">
                                        </div>
                                        {!! form_error_message('email', $errors) !!}
                                    </section>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('born_at', $errors) }}">
                                        <label for="password">Date of Birth</label>
                                        <div class="input">
                                            <input id="born_at" type="date" class="form-control" name="born_at" placeholder="Select your birth date" value="{{ old('born_at')}}">
                                        </div>
                                        {!! form_error_message('born_at', $errors) !!}
                                    </div>
                                </div>
                            </div>
        
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('password', $errors) }}">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" >
                                        </div>
                                        {!! form_error_message('password', $errors) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('password_confirmation', $errors) }}">
                                        <label>Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="id-password_confirmation" name="password_confirmation" placeholder="Password Confirm">
                                        </div>
                                        {!! form_error_message('password_confirmation', $errors) !!}
                                    </div>
                                </div>
                            </div>
                        <div class="form-footer">
                            <div class="row">
                                <div class="col-4">
                                    <a class="btn btn-link btn-sm padding-left-0" href="{{ route('login') }}">I have an account!</a>
                                </div>
                                <div class="col-md-8">
                                    <div class="pull-right">
                                        <a href="javascript:window.history.back();" class="btn btn-labeled btn-default">
                                            <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                                        </a>
                                        <button class="btn btn-labeled btn-primary btn-submit">
                                            <span class="btn-label"><i class="fa fa-fw fa-save"></i></span>{{__('Register')}}
                                        </button>
                                    </div>
                                </div>
                            </div>           
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div><br>
@endsection
@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            $("#born_at").datetimepicker({
                maxDate: new Date();
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection