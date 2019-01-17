@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Evaluation Forms</span> / <span>Resource Person Evaluation {{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-edit"><span>&nbsp;Resource Person Evaluation Summary</span></i>
                </h3>
            </div>
            <div class="box-body no-padding">
                {!! Form::open(['action' => 'SummaryController@getResults', 'method' => 'POST']) !!}
                {!! csrf_field() !!}
                <div class="well">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="project">Project</label>
                                    {{-- <select id="project" name="project" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                        <option value="0">Select Project...</option>
                                        @foreach($projects as $proj)
                                            <option class="text-black" value={{ $proj->id }}>{{ $proj->project_name }}</option>
                                        @endforeach
                                    </select> --}}
                                    {!! Form::select("project",\App\Projects::pluck('project_name','id'),null,["class"=>"form-control","id"=>"project",'title'=>'Select Project']) !!}
                                    {!! form_error_message('project', $errors) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="training">Training</label>
                                    {!! Form::select("training_id",[],null,["class"=>"form-control", "id"=>"training_drop",'name'=>'training_drop']) !!}
                                    {!! form_error_message('training_drop', $errors) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="resource">Name of Resource Person</label>
                                    {!! Form::select("resource_id",[],null,["class"=>"form-control", "id"=>"resource_drop",'name'=>'resource_drop']) !!}
                                    {!! form_error_message('resource_drop', $errors) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="resource">Topic</label>
                                    <div id="topic">
                                        <input readonly type="text" name="topic" class="form-control" placeholder="Topic" value="{{ old('topic') }}">
                                    </div>
                                    {!! form_error_message('topic', $errors) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary col-md-12"><i class="fa fa-search"></i> Search</button>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <label class="text-info" for="note">Directions: Please rate your resource person using the scale of 1-5 where 1 is poor and 5 is excellent. Indicate your rating with (&check;) mark. </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table name="tosave" id="tbl-list" data-server="false" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center hidden">ID</th>
                                    <th class="text-center" style="width:500px"><i class="fa fa-fw fa-book text-muted"></i>Indicator</th>
                                    <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Poor (1)</th>
                                    <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Fair (2)</th>
                                    <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Moderate (3)</th>
                                    <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Good (4)</th>
                                    <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Excellent (5)</th>
                                    <th class="text-center hidden">IT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($resources as $aspect)
                                    <tr>
                                        <td class="hidden"><input type="text" name="aspect_id[]" value="{{$aspect->id}}"></td>
                                        <td>{{$aspect->indicator}}</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0</td>
                                        <td class="text-center">0</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </fieldset>
                </div>
                {!!form::close()!!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#project').on('change', function () {
            getTrainings($(this).val());
        });
        function getTrainings(id) {
            $.get("{{url('/gettrainings')}}/" + id, function (data) {
                $("#training_drop").html(data);
            });
        }
        $(document).ready(function () {
            getTrainings($('#project').val());
        });
    
    $('#training_drop').on('change focus', function () {
            getResource($(this).val());
        });
        function getResource(id) {
            $.get("{{url('/getResource')}}/" + id, function (data) {
                $("#resource_drop").html(data);
            });
        }
        $(document).ready(function () {
            getResource($('#training_drop').val());
        });

    $('#resource_drop').on('change focus', function () {
            getTopic($(this).val());
        });
        function getTopic(id) {
            $.get("{{url('/getTopic')}}/" + id, function (data) {
                $("#topic").html(data);
            });
        }
        $(document).ready(function () {
            getTopic($('#resource_drop').val());
        });
</script>
@endsection