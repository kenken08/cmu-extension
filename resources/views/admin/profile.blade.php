@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <img src="/storage/profile_images/{{user()->profile_image}}" class="img-circle" alt="User Image" style="width: 25px;">
                        <span>Update Profile</span>
                    </h3>
                </div>

                <div class="box-body no-padding">

                    {!! Form::open(['action' => ['ProfileController@update', user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{Form::token()}}
                        {{form::hidden('_method', 'PUT')}}

                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                        <label for="firstname">Firstname</label>
                                        <div class="input-group">
                                            <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="{{ ($errors->any()? old('firstname') : user()->firstname) }}">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                        {!! form_error_message('firstname', $errors) !!}
                                    </div>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                        <label for="email">Lastname</label>
                                        <div class="input-group">
                                            <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="{{ ($errors->any()? old('lastname') : user()->lastname) }}">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                        {!! form_error_message('lastname', $errors) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-6">
                                    <section class="form-group {{ form_error_class('email', $errors) }}">
                                        <label for="email">Email Address (readonly)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ ($errors->any()? old('email') : user()->email) }}" readonly>
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        {!! form_error_message('email', $errors) !!}
                                    </section>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('password', $errors) }}">
                                        <label for="password">Password <small> (leave blank to keep it unchanged)</small></label>
                                        <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="" >
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        </div>
                                        {!! form_error_message('password', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('born_at', $errors) }}">
                                        <label for="password">Date of Birth</label>
                                        <div class="input-group">
                                            <input id="born_at" type="text" class="form-control" name="born_at" placeholder="Select your birth date" value="{{ ($errors->any()? old('born_at') : auth()->user()->born_at) }}">
                                            <span id="born_at" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        {!! form_error_message('born_at', $errors) !!}
                                    </div>
                                </div>

                                <div class="col-md-6">
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

                            <section class="form-group {{ form_error_class('photo', $errors) }}">
                                <label>Profile image (250 x 250)</label>
                                <div class="input-group input-group-sm">
                                    <input id="photo-label" type="text" class="form-control" readonly placeholder="Browse for an image">
                                    <span class="input-group-btn">
                                  <button type="button" class="btn btn-default" onclick="document.getElementById('profile_image').click();">Browse</button>
                                </span>
                                    <input id="profile_image" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="profile_image" onchange="document.getElementById('photo-label').value = this.value">
                                </div>
                                {!! form_error_message('profile_image', $errors) !!}
                            </section>

                            @if(user()->profile_image)
                                <section>
                                    <img src="/storage/profile_images/{{auth()->user()->profile_image}}" name="profile_image" style="max-height: 300px;">
                                    <input type="hidden" name="image" value="{{auth()->user()->profile_image }}">
                                </section>
                            @endif
                        </fieldset>

                        @include('admin.partials.form_footer')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            $("#born_at").datetimepicker({
                maxDate: new Date(),
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection