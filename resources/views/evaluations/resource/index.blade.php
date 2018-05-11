@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-edit"><span>&nbsp;Resource Person Evaluation</span></i>
                </h3>
            </div>
            <div class="box-body no-padding">
                {!! Form::open(['action' => 'ResourceEvaluationController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                {!! csrf_field() !!}
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource">Project</label>
                                <select id="proj_id" name="proj_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    @foreach($projects as $proj)
                                        <option name="proj_id" value={{$proj->id}}>{{$proj->project_name}}</option>
                                    @endforeach
                                </select>
                                {!! form_error_message('proj_id', $errors) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource">Training</label>
                                <select id="training_id" name="training_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                    @foreach($trainings as $training)
                                        <option name="training_id" value={{$training->id}}>{{$training->training_name}}</option>
                                    @endforeach
                                </select>
                                {!! form_error_message('training_id', $errors) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource">Name of Resource Person</label>
                                <div class="input-group">
                                    <input type="text" name="resource" list="person" class="selectpicker form-control" placeholder="Name" value="{{ old('resource') }}">
                                    <datalist class="selectpicker" id="person">
                                        <option>Rae</option>
                                        <option>Law</option>
                                        <option>Me</option>
                                        <option>God</option>
                                    </datalist>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                                {!! form_error_message('resource', $errors) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="resource">Topic</label>
                                <div class="input-group">
                                    <input type="text" name="topic" class="form-control" placeholder="Topic" value="{{ old('topic') }}">
                                    <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
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
                                    <td>{{$resource->indicator}}</td>
                                    @php($i=1)
                                    @foreach($evals as $eval)
                                        <td class="text-center">
                                            <input type="checkbox" name="indicator_eval[]" value="{{$eval->id}}">
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