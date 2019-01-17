@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Evaluation Forms</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-edit"><span>&nbsp;Resource Person Evaluation</span></i>
                </h3>
            </div>
            <div class="box-body no-padding">
                @include('flash::message')
                {!! Form::open(['action' => 'ResourceEvaluationController@store', 'method' => 'POST']) !!}
                {!! csrf_field() !!}
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project">Project</label>
                                <select id="project" name="project" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="0">Select Project...</option>
                                    @foreach($projects as $proj)
                                        <option class="text-black" value={{ $proj->id }}>{{ $proj->project_name }}</option>
                                    @endforeach
                                </select>
                                {{-- {!! Form::select("project",\App\Projects::pluck('project_name','id'),null,["class"=>"form-control","id"=>"project",'title'=>'Select Project']) !!} --}}
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
                                    <input type="text" name="topic" class="form-control" placeholder="Topic" value="{{ old('topic') }}">
                                </div>
                                {!! form_error_message('topic', $errors) !!}
                            </div>
                        </div>
                    </div>
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
                            @php($j=1)
                            @foreach($resources as $resource)
                                <tr>
                                    <td class="hidden"><input type="text" name="indicator_id[]" value="{{$resource->id}}"></td>
                                    <td class="text-uppercase" style="vertical-align:middle;"><h5>{{$resource->indicator}}</h5></td>
                                    @php($i=1)
                                    @foreach($evals as $eval)
                                        <td class="text-center" style="vertical-align:middle;">
                                            <label class="c-css-toggle toggle-button">
                                                <input type="radio" name="indicator_eval[]{{$j}}" value="{{$eval->id}}">
                                                <div class="c-css-toggle__button">
                                                    <div class="c-css-toggle__button__knob">
                                                    <div class="c-css-toggle__button__knob__off">&times;</div> 
                                                    <div class="c-css-toggle__button__knob__pommel"></div> 
                                                    <div class="c-css-toggle__button__knob__on" data-toggle="tooltip" title="{{$eval->name}}"><h6 class="text-truncate" style="margin-top:1px;margin-left:-11px">{{$eval->name}}</h6></div>
                                                    </div>
                                                </div>
                                            </label> 
                                        </td>
                                    <td class="hidden">{{$i}}</td>
                                    @php($i++)
                                    @endforeach
                                </tr>
                            @php($j++)
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Other Comments (Please Specify):</label>
                                <textarea role="text" name="comment" maxlength="255" class="form-control" placeholder="Write your comment here" style="height:100px;"></textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
                @include('admin.partials.form_footer')
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
<script>
    $('div.alert').not('.alert-important').delay(8000).slideUp(350);
</script>
@endsection