@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    @if(isset($project->project_name))
                        <span>List of Trainings under {{$project->project_name}} Project</span>
                    @endif
                </h3>
            </div>
            <div class="box-body">
                <div class="well well-sm well-toolbar">
                    @if(isset($project->id))
                        <a class="btn btn-labeled btn-primary" href="/home/projects/{{$project->id}}/trainings/create">
                            <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Add Training
                            <input id="proj_id" name="proj_id" class="hidden" value="{{$project->id}}">
                        </a>
                    @endif
                </div>
                <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Training Name</th>
                            <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Venue</th>
                            <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Date Conducted</th>
                            <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trainings as $training)
                            @if($training->proj_id == $project->id)
                                <tr>
                                    <td class="text-uppercase"><a href="/home/projects/{{$project->id}}/trainings/{{$training->id}}/trainees"><strong>{{ $training->training_name }}</strong></a></td>
                                    <td>{{ $training->venue }}</td>
                                    <td class="text-center">{{ $training->fdate_conducted.' - '.$training->tdate_conducted}}</td>
                                    <td>
                                        <div class="btn-toolbar">
                                            <a href ="#" class="btn btn-xs"></a>
                                            <a href ="#" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit {{ $training->training_name }}">
                                                <i class="fa fa-edit"></i><span>Edit</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection