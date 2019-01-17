@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Evaluation Forms</span> / <span>Training Evaluation {{$title}}</span></i>
    </div><hr>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    <label for="">Training Evaluation Summary</label>
                </h3>
            </div>

            <div class="box-body">
                {!!Form::open(['id'=>'summary','action' =>'SummaryController@getData', 'method'=>'POST'])!!}
                {{ Form::token() }}
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
                                <div class="input-group">
                                    {!! Form::select("training_drop",["No Project Selected..."],null,["class"=>"form-control", "id"=>"training_drop",'name'=>'training_drop']) !!}
                                    <a id="search" class="input-group-addon btn btn-primary text-light" onclick="document.getElementById('summary').submit();" style="width:100px">Search&nbsp;<i class="fa fa-search"></i></a>
                                </div>
                                {!! form_error_message('training_drop', $errors) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <br>
                <table id="tbl-listsummary" data-server="false" data-page-length="10" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:400px"><i class="fa fa-fw fa-book text-muted"></i>ASPECT</th>
                            <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;BEST</th>
                            <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;BETTER</th>
                            <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;GOOD</th>
                            <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;FAIR</th>
                            <th class="text-center"style="width:140px"><i class="fa fa-fw  text-muted"></i>&check;NEEDS IMPROVEMENT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!isset($summary))
                            @foreach($aspects as $aspect)
                                <tr>
                                    <td class="hidden"><input type="text" name="aspect_id[]" value="{{$aspect->id}}"></td>
                                    <td>{{$aspect->name}}</td>
                                    {{-- @if($aspect->id) --}}
                                        <td class="text-center">0</td>
                                    {{-- @endif --}}
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                    <td class="text-center">0</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
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
</script>
@endsection