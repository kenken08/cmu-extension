@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-edit"><span>&nbsp;Training Evaluation</span></i>
                </h3>
            </div>
            <div class="box-body no-padding">
                {!! Form::open(['action' => 'TrainingsEvaluationController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                {!! csrf_field() !!}
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="proj_id">Project</label>
                                <select id="proj_id" name="proj_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    @foreach($projects as $proj)
                                        <option value={{$proj->id}}>{{$proj->project_name}}</option>
                                    @endforeach
                                </select>
                                {!! form_error_message('proj_id', $errors) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="training">Training</label>
                                <select id="training_id" name="training_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    @foreach($trainings as $training)
                                        <option value={{$training->id}}>{{$training->training_name}}</option>
                                    @endforeach
                                </select>
                                {!! form_error_message('training_id', $errors) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="evaluator">Name of Evaluator</label>
                                <select id="nameofevaluator" name="nameofevaluator" class="selectpicker form-control" Placeholder="Select Evaluator or Type Evaluator Name" data-show-subtext="true" data-live-search="true" editable="True">
                                        @foreach($attendees as $attendee)
                                            <option value={{$attendee->id}}>{{$attendee->fname.' '.$attendee->lname}}</option>
                                        @endforeach
                                </select>
                                {!! form_error_message('resource', $errors) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource">Date</label>
                                <div class="input-group">
                                    <input id="dateoftraining" type="text" class="form-control" name="dateoftraining" placeholder="Select date" value="{{ old('dateoftraining') }}">
                                    <span id="dateoftraining" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                                {!! form_error_message('topic', $errors) !!}
                            </div>
                        </div>
                    </div>
                    <table name="tosave" id="tbl-list" data-server="false" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center hidden">ID</th>
                                <th class="text-center" style="width:500px"><i class="fa fa-fw fa-book text-muted"></i>ASPECT</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;BEST</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;BETTER</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;GOOD</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;FAIR</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;NEEDS IMPROVEMENT</th>
                                <th class="text-center hidden">IT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($j=1)
                            @foreach($aspects as $aspect)
                                <tr>
                                    <td class="hidden"><input type="text" name="aspect_id[]" value="{{$aspect->id}}"></td>
                                    <td>{{$aspect->name}}</td>
                                    @php($i=1)
                                    @foreach($evals as $eval)
                                        <td class="text-center">
                                            <input type="checkbox" name="aspect_eval[]" value="{{$eval->id}}">
                                            <span>{{$eval->name}}</span>&nbsp;&nbsp;&nbsp;
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
            $("#dateoftraining").datetimepicker({
                maxDate: new Date(),
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection