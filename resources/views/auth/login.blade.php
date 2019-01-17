@extends('layouts.website')

@section('content')
<br>
<div class="container animated fadeIn">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-custom text-white">{{ __('LOGIN') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-mail Address" autofocus>
                                    <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope"></i></span></div>
                                </div>
                                {!! form_error_message('email', $errors) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
                                    <div class="input-group-append"><span class="input-group-text"><i class="fa fa-lock"></i></span></div>
                                </div>
                                {!! form_error_message('password', $errors) !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-0">
                                <div class="checkbox">
                                    <label class="form-check-label">
                                        <input class="custom-checkbox" type="checkbox" value=""> Remember Me
                                        <span class="form-check-sign">
                                            <span class="check"></span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 offset-md-6">
                                    <button type="submit" class="btn btn-primary btn-flat btn-submit">
                                        Sign In
                                        <i class="fa fa-sign-in"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-block">
                            <div class="row">
                                <div class="col-sm-8">New to {{ config('app.name') }}?
                                    <a href="/register">
                                        Register here
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><br>
@endsection
