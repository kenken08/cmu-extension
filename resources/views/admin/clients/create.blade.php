@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-edit"></i></span>
                        <span>{{ isset($user->name)? 'Edit ' . $user->name. '': 'Create a new User' }}</span>
                    </h3>
                </div>

                <div class="box-body no-padding">

                    <div class="col-sm-12">
                        <div class=" well-sm well-toolbar">
                        <!--<form action="/home/users/edit/{{--$user->id--}}" accept-charset="UTF-8" method="POST">
                                <input type="hidden" name="_token" value="{{-- csrf_token() --}}"/>
                                <input type="hidden" name="email" value="{{-- ($errors->any()? old('email') : $user->email) --}}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-small btn-primary btn-flat btn-submit pull-right">
                                            <i class="fa fa-refresh"></i> Send Forgot Password
                                            Instructions
                                        </button>
                                    </div>
                                </div>
                        </form>-->
                    </div>
                </div>
                    <!--<form id="form-edit" method="POST" action="/home/users/edit/{{--(isset($user)? "/{$user->id}" : '')--}}" accept-charset="UTF-8" enctype="multipart/form-data">-->
                    {!! Form::open(['action' => ['UserController@create', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        {{Form::token()}}
                        <!--<input name="_method" type="hidden" value="{{--isset($user)? 'PUT':'POST'--}}">-->
                        {{form::hidden('_method', isset($user)? 'PUT' : 'POST')}}

                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('name', $errors) }}">
                                        <label for="firstname">Firstname</label>
                                        <div class="input-group">
                                            {{Form::text('name','', ['class'=>'form-control', 'placeholder'=>'Full name'])}}
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                        {!! form_error_message('name', $errors) !!}
                                    </div>
                                </div>

                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('name', $errors) }}">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            {{Form::email('name','', ['class'=>'form-control', 'placeholder'=>'Email'])}}
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        </div>
                                        {!! form_error_message('name', $errors) !!}
                                    </div>
                                </div>
                            </div>
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
