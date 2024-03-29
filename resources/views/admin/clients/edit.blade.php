@extends('layouts.admin')

@section('content')
<div class="row mt-5">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"> <span>Dashboard</span> / Users / <span>{{$title}}</span></i>
    </div><hr>
</div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($user->firstname)? 'Edit ' . $user->firstname.' '. $user->lastname. '' : 'Create a new User' }}</span>
                    </h3>
                </div>
                    {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::token()}}
                    {{form::hidden('_method', isset($user)? 'PUT' : 'POST')}}
                            <fieldset>
                                <div class="row">
                                    <div class="col col-6">
                                        <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                            <label for="firstname">Firstname</label>
                                            <div class="input-group">
                                                <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="{{ ($errors->any()? old('firstname') : $user->firstname) }}">
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            </div>
                                            {!! form_error_message('firstname', $errors) !!}
                                        </div>
                                    </div>
    
                                    <div class="col col-6">
                                        <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                            <label for="lastname">Lastname</label>
                                            <div class="input-group">
                                                <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="{{ ($errors->any()? old('lastname') : $user->lastname) }}">
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
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ ($errors->any()? old('email') : $user->email) }}" readonly>
                                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            </div>
                                            {!! form_error_message('email', $errors) !!}
                                        </section>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ form_error_class('contactno', $errors) }}">
                                            <label>Contact Number</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="contactno" name="contactno" placeholder="09xxxxxxxxx" value="{{ ($errors->any()? old('contactno') : user()->contactno) }}">
                                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                            </div>
                                            {!! form_error_message('contactno', $errors) !!}
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ form_error_class('born_at', $errors) }}">
                                            <label for="password">Date of Birth</label>
                                            <div class="input-group">
                                                <input id="born_at" type="text" class="form-control" name="born_at" placeholder="Select your birth date" value="{{ ($errors->any()? old('born_at') : $user->born_at) }}">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            </div>
                                            {!! form_error_message('born_at', $errors) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="role">Role</label>
                                            <select id="role" name="role" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" onchange="">
                                                <option value='{{$user->admin}}'>Choose Role</option>
                                                <option value='1'>Admin</option>
                                                <option value='2'>Units</option>
                                            </select>
                                            {!! form_error_message('training_id', $errors) !!}
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
                                @if($user->profile_image)
                                    <section>
                                        <img src="/storage/profile_images/{{$user->profile_image}}" style="max-height: 300px;">
                                        <input type="hidden" name="image" value="{{ $user->profile_image }}">
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
        $(function () {
            $("#born_at").datetimepicker({
                viewMode: 'years',
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection
