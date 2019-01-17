@extends('layouts.admin')

@section('content')
<div class="row mt-5">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    @if(isset($project->project_name))
                        <span>List of Trainings under {{$project->project_name}}</span>
                    @endif
                </h3>
            </div>
            <div class="box-body">
                @if(auth()->user()->admin == 2)
                    <div class="well well-sm well-toolbar">
                        @if(isset($project->id))
                            <a class="btn btn-labeled btn-primary" href="/home/projects/{{$project->id}}/trainings/create">
                                <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Add Training
                                <input id="proj_id" name="proj_id" class="hidden" value="{{$project->id}}">
                            </a>
                        @endif
                    </div>
                @endif
                <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Training Name</th>
                            <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Venue</th>
                            <th class="text-center" style="width:80px"><i class="fa fa-fw fa-location-users text-muted"></i>No. of Participants</th>
                            <th class="text-center" style="width:80px"><i class="fa fa-fw fa-location-users text-muted"></i>Participants Date Trained</th>
                            <th class="text-center"><i class="fa fa-fw fa-slider text-muted"></i>Status</th>
                            <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Date Conducted</th>
                            <th class="text-center" style="width:200px"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trainings as $training)
                            @if($training->proj_id == $project->id)
                                <tr>
                                    <td class="text-uppercase"><a href="/home/projects/{{$project->id}}/trainings/{{$training->id}}/trainees"><strong>{{ $training->training_name }}</strong></a></td>
                                    <td>{{ $training->venue }}</td>
                                    <td class="text-center">{{ $training->noofparticipants}}</td>
                                    <td class="text-center">{{ $training->pdt }}</td>
                                    <td class="text-center">
                                        @if($training->status == 'conducted')
                                            <span class="label label-success">{{ ucwords($training->status) }}</span>
                                        @elseif($training->status == 'postponed')
                                            <span class="label label-danger">{{ ucwords($training->status) }}</span>
                                        @else
                                            <span class="label label-primary">On the Process</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ date('F d, Y', strtotime($training->fdate_conducted)).' - '.date('F d, Y', strtotime($training->tdate_conducted))}}</td>
                                    <td class="text-center">
                                        <a href ="/home/projects/trainings/{{$training->id}}/edit" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit {{ $training->training_name }}">
                                            <i class="fa fa-edit"></i><span>Edit</span>
                                        </a>
                                        <a href ="/home/projects/trainings/{{$training->id}}/addresource" class="btn btn-warning btn-xs" data-toggle="tooltip"  title="Add Resource Person to {{ $training->training_name }}">
                                            <i class="fa fa-edit"></i><span>Resource Person</span>
                                        </a>
                                        <a href="/home/projects/trainings/{{$training->id}}/status" class="btn btn-xs btn-tumblr"><i class="fa fa-pencil"></i> Status</a>
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