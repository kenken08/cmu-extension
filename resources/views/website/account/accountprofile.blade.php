@extends('layouts.website')

@section('content')
@include('website.account.account-breadcrumbs')
<section>
    <div class="row">
        <div class="container">
            <div class="row">
                @include('website.account.accountsidebar')&emsp;
                <div class="col-md-8">
                    <div class="col-lg-12">
                        <div class="card1" style="width:800px">
                            <div class="card-header" style="border:black;border-top: 5px solid orangered!important;background:rgb(34, 49, 63);color:white">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>
                                                <span><i class="fa fa-user"></i></span>
                                                <span>Profile</span>
                                            </h3>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>
                                                <span class="pull-right">
                                                    <a id="edit" href="" class="text-light btn btn-sm btn-primary" onclick="event.preventDefault()"><i class="fa fa-edit">Edit Profile</i></a>
                                                </span>
                                                <span id="btn-cancel" class="hidden pull-right">
                                                    <a id="cancel" href="" class="text-light btn btn-sm btn-danger" onclick="event.preventDefault()"><i class="fa fa-times">Cancel</i></a>
                                                </span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['id'=>'edit-profile','action' => ['ProfileController@update', user()->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                {{Form::token()}}
                                {{form::hidden('_method', 'PUT')}}
                                    <fieldset>
                                        {{-- <input type="text" name="validate" class="hidden"> --}}
                                        @if(user()->profile_image)
                                            <section class="text-center">
                                                <img class="img img-circle" src="/storage/profile_images/{{auth()->user()->profile_image}}" name="profile_image" style="height:100px; width:100px;">
                                                <input type="hidden" name="image" value="{{auth()->user()->profile_image }}">
                                            </section>
                                            <br>
                                        @endif
                                        <div class="row">
                                            <div class="col col-6">
                                                <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                                    <label for="firstname">Firstname</label>
                                                    <div class="input-group">
                                                        <input type="text" name="firstname" class="form-control" placeholder="Firstname" value="{{ ($errors->any()? old('firstname') : user()->firstname) }}">
                                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
                                                    </div>
                                                    {!! form_error_message('firstname', $errors) !!}
                                                </div>
                                            </div>
                
                                            <div class="col col-6">
                                                <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                                    <label for="email">Lastname</label>
                                                    <div class="input-group">
                                                        <input type="text" name="lastname" class="form-control" placeholder="Lastname" value="{{ ($errors->any()? old('lastname') : user()->lastname) }}">
                                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-user"></i></span></div>
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
                                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                                                    </div>
                                                    {!! form_error_message('email', $errors) !!}
                                                </section>
                                            </div>
                
                                            <div class="col-md-6">
                                                <div class="form-group {{ form_error_class('contactno', $errors) }}">
                                                    <label>Contact Number</label>
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" id="contactno" name="contactno" placeholder="09xxxxxxxxx" value="{{ ($errors->any()? old('contactno') : user()->contactno) }}">
                                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-mobile"></i></span></div>
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
                                                        <input id="born_at" type="date" class="form-control" name="born_at" placeholder="Select your birth date" value="{{ ($errors->any()? old('born_at') : auth()->user()->born_at) }}">
                                                        <div class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                                    </div>
                                                    {!! form_error_message('born_at', $errors) !!}
                                                </div>
                                            </div>
                
                                            <div class="col-md-6">
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
                                            </div>
                                        </div>
                                    </fieldset>
                                {!! Form::close() !!}
                            </div>
                            <div class="card-footer">
                                <div id="foot" class="hidden">
                                    <button class="btn btn-labeled btn-success btn-submit pull-right" onclick="document.getElementById('edit-profile').submit()">
                                        <span class="btn-label"><i class="fa fa-fw fa-save"></i></span>Save Changes
                                    </button>
                                
                                    <a href="javascript:window.history.back();" class="btn btn-labeled btn-default">
                                        <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $('#edit').on('click', function(){
        $('#foot').removeClass('hidden');
        $('#btn-cancel').removeClass('hidden');
        $('#edit').addClass('hidden');
        $(this).addClass('hi');
    });
    $('#btn-cancel').on('click', function(){
        $('#foot').addClass('hidden');
        $('#btn-cancel').addClass('hidden');
        $('#edit').removeClass('hidden');
        $(this).addClass('hi');
    });
</script>
@endsection