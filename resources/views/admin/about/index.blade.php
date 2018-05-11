@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-question-circle"></i></span>
                    <span>About Us</span>
                </h3>
            </div>
            <div class="box-body">
            {!! Form::open(['action' => 'AboutController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{Form::token()}}
                <div class="col-md-12">
                    <label for="about">About Content</label>
                @foreach($about as $ab)
                    {{-- <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea> --}}
                    <textarea class="form-control summernote" id="article-content" name="content" rows="18">{{$ab->about}}</textarea>
                @endforeach
                </div>
            </div>
            <div class="form-footer">
                <button class="btn btn-labeled btn-primary btn-submit">
                    <span class="btn-label"><i class="fa fa-fw fa-save"></i></span>Save Changes
                </button>
                <a href="javascript:window.history.back();" class="btn btn-labeled btn-default">
                    <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                </a>
            </div>
            {!! form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            setDateTimePickerRange('#active_from', '#active_to');

            initSummerNote('.summernote');
            $('#form-edit').on('submit', function ()
            {
                $('#article-content').html($('.summernote').val());
                return true;
            });
        })
    </script>
@endsection