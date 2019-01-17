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
                    <i class="fa fa-edit"><span>&nbsp;Training Evaluation Summary</span></i>
                </h3>
            </div>
            <div class="box-body no-padding">
                {!! Form::open(['action' => 'TrainingsEvaluationController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                {!! csrf_field() !!}
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="project">Project</label>
                                <select id="project" name="project" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    <option value="0">Select Project...</option>
                                    @foreach($projects as $proj)
                                        <option class="text-black" value={{$proj->id}}>{{$proj->project_name}}</option>
                                    @endforeach
                                </select>
                                {{-- {!! Form::select("project",\App\Projects::pluck('project_name','id'),null,["class"=>"form-control","id"=>"project"]) !!} --}}
                                {!! form_error_message('project', $errors) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="training">Training</label>
                                {{-- <select id="training_drop" name="training_drop" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" onchange="">
                                    <option value="">Select Training...</option>
                                    @foreach($trainings as $training)
                                        <option value={{$training->id}}>{{$training->training_name}}</option>
                                    @endforeach
                                </select> --}}
                                {!! Form::select("training_id",[],null,["class"=>"form-control", "id"=>"training_drop",'name'=>'training_drop']) !!}
                                {!! form_error_message('training_drop', $errors) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="evaluator">Name of Evaluator</label>
                                {{-- <select id="nameofevaluator" name="nameofevaluator" class="selectpicker form-control" Placeholder="Select Evaluator or Type Evaluator Name" data-show-subtext="true" data-live-search="true" editable="True">
                                        @foreach($details as $detail)
                                            @if($detail->training_id)
                                                @foreach($attendees as $attendee)
                                                    @if($detail->attendee_id == $attendee->id)
                                                        <option value={{$attendee->id}}>{{$attendee->fname.' '.$attendee->lname}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                </select> --}}
                                {!! Form::select("nameofevaluator",[],null,["class"=>"form-control", "id"=>"nameofevaluator"]) !!}
                                {!! form_error_message('nameofevaluator', $errors) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource">Date</label>
                                <div class="input-group">
                                    <input id="date" type="text" class="form-control" name="date" placeholder="Select date" value="{{ old('dateoftraining') }}">
                                    <span id="dateoftraining" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                                {!! form_error_message('date', $errors) !!}
                            </div>
                        </div>
                    </div>
                    <table name="tosave" id="tbl-list" data-server="false" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center hidden">ID</th>
                                <th class="text-center" style="width:500px;vertical-align:middle"><i class="fa fa-fw fa-book text-muted" on></i>ASPECT</th>
                                <th class="text-center" style="vertical-align:middle"><i class="fa fa-fw  text-muted"></i>&check;BEST</th>
                                <th class="text-center" style="vertical-align:middle"><i class="fa fa-fw  text-muted"></i>&check;BETTER</th>
                                <th class="text-center" style="vertical-align:middle"><i class="fa fa-fw  text-muted"></i>&check;GOOD</th>
                                <th class="text-center" style="vertical-align:middle"><i class="fa fa-fw  text-muted"></i>&check;FAIR</th>
                                <th style="width:110px" style="vertical-align:middle"><i class="fa fa-fw  text-muted"></i>&check;NEEDS IMPROVEMENT</th>
                                <th class="text-center hidden">IT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($j=1)
                            @foreach($aspects as $aspect)
                                <tr>
                                    <td class="hidden"><input type="text" name="aspect_id[]" value="{{$aspect->id}}"></td>
                                    <td class="text-uppercase" style="vertical-align:middle;"><h5>{{$aspect->name}}</h5></td>
                                    @php($i=1)
                                    @foreach($evals as $eval)
                                        <td class="text-center" style="vertical-align:middle;">
                                            <label class="c-css-toggle toggle-button">
                                                {{-- <input id="{{$j}}" type="radio" name="aspect_eval[]{{$j}}" value="{{$eval->id}}">  --}}
                                                <input id="{{$j}}" type="radio" name="aspect_eval[]{{$j}}" value="{{$eval->id}}">
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
                                <label>Remarks:</label>
                                <textarea role="text" name="remarks" maxlength="255" class="form-control" placeholder="Write your comment here" style="height:100px;"></textarea>
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
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            $("#date").datetimepicker({
                maxDate: new Date(),
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })

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
        
        // Evaluator
        $('#training_drop').on('change focus keydown', function () {
            getEvaluator($(this).val());
        });
        function getEvaluator(id) {
            $.get("{{url('/getevaluator')}}/" + id, function (data) {
                $("#nameofevaluator").html(data);
            });
        }
        $(document).ready(function () {
            getEvaluator($('#training_drop').val());
        });
    </script>
@endsection