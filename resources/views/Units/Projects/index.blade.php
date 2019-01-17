@extends('layouts.admin')

@section('content')
<div class="row mt-5">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    <span>List of Projects</span>
                </h3>
            </div>
            <div class="box-body">
                @include('Forums.calc')
                <div class="well well-sm well-toolbar">
                    @if(Auth::user()->admin == 2)
                        <a class="btn btn-labeled btn-primary" href="/home/projects/create">
                            <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Create Project
                        </a>
                        <div class="pull-right">
                            <a id="vcom" class="btn btn-labeled btn-info">
                                <span class="btn-label"><i class="fa fa-fw fa-search"></i></span>View Completed Project(s)
                            </a>
                            <a id="vincom" class="btn btn-labeled btn-info">
                                <span class="btn-label"><i class="fa fa-fw fa-search"></i></span>View In-Progress Project(s)
                            </a>
                        </div>
                    @else
                        <a id="vcom" class="btn btn-labeled btn-info">
                            <span class="btn-label"><i class="fa fa-fw fa-search"></i></span>View Completed Project(s)
                        </a>
                        <a id="vincom" class="btn btn-labeled btn-info">
                            <span class="btn-label"><i class="fa fa-fw fa-search"></i></span>View In-Progress Project(s)
                        </a>
                    @endif
                </div>
                <div id="Incom" class="">
                    <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Project Name</th>
                                <th class="text-center">College / Unit</th>
                                <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Venue</th>
                                <th class="text-center" style="width:100px">Progress</th>
                                <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Dates of Conduction</th>
                                <th class="text-center" style="width:150px;"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="text-uppercase"><a href="/home/projects/{{$project->id}}/trainings"><strong>{{ $project->project_name }}</strong></a></td>
                                    @foreach($pc as $p)
                                        @if($p->proj_id == $project->id)
                                            <td>{{$p->name}}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $project->venue }}</td>
                                    <td>
                                        @foreach($objectives as $object)
                                            @if($object->proj_id ==  $project->id)
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success progress-bar-animated" aria-valuemax="100" style="width:{{ days($project->date_conducted, $project->to_date) + $object->total }}%"><small>{{ days($project->date_conducted, $project->to_date) + $object->total }}%</small></div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ date('M d, Y',strtotime($project->date_conducted)).' - '.date('M d, Y',strtotime($project->to_date))}}</td>
                                    <td class="text-center">
                                        <a href ="/home/projects/{{$project->id}}/objectives" class="btn btn-primary btn-xs" data-toggle="tooltip" title="View Objectives of {{ $project->project_name }} Project">
                                            <i class="fa fa-eye"></i><span>View Objectives</span>
                                        </a>
                                        <a href ="/home/projects/{{$project->id}}/edit" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit {{ $project->project_name }}">
                                            <i class="fa fa-edit"></i><span>Edit</span>
                                        </a>
                                        <a href ="/home/projects/{{$project->id}}/activities" class="btn btn-warning btn-xs" data-toggle="tooltip" title="Edit {{ $project->project_name }}">
                                            <i class="fa fa-edit"></i><span>Activities</span>
                                        </a>
                                        <a href="/home/projects/{{$project->id}}/status" class="btn btn-xs btn-tumblr"><i class="fa fa-pencil"></i> Status</a>
                                        @foreach($objectives as $object)
                                            @if($object->proj_id ==  $project->id)
                                                @if((days($project->date_conducted, $project->to_date) + $object->total)==100)
                                                    {!! Form::open(['action'=>['ProjectsController@completedproj', $project->id],'method'=>'POST','id'=>'completedproject']) !!}
                                                    {!! csrf_field() !!}     
                                                        <button type="submit" class="btn btn-xs btn-success">Project Completed</button>
                                                    {!! Form::close() !!}
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    {{-- @include('Units.Projects.status-modal') --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Completed Projects --}}

                <div id="complete" class="hidden">
                    <table id="tbl-list-complete" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Project Name</th>
                                <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Venue</th>
                                <th class="text-center">Progress</th>
                                <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Dates of Conduction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectcom as $project)
                                <tr>
                                    <td class="text-uppercase"><a href="/home/projects/{{$project->id}}/trainings"><strong>{{ $project->project_name }}</strong></a></td>
                                    <td>{{ $project->venue }}</td>
                                    <td>
                                        @foreach($objectives as $object)
                                            @if($object->proj_id ==  $project->id)
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-success progress-bar-animated" aria-valuemax="100" style="width:{{ days($project->date_conducted, $project->to_date) + $object->total }}%"><small>{{ days($project->date_conducted, $project->to_date) + $object->total }}%</small></div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-center">{{ date('M d, Y',strtotime($project->date_conducted)).' - '.date('M d, Y',strtotime($project->to_date))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $('#vcom').on('click', function(){
        $('#complete').removeClass('hidden');
        $('#Incom').addClass('hidden');
        $('#vcom').removeClass('btn-primary');
        $('#vcom').addClass('btn-warning');
        $('#vincom').removeClass('btn-warning');
        $('#vincom').addClass('btn-primary');
    });
    $('#vincom').on('click', function(){
        $('#Incom').removeClass('hidden');
        $('#complete').addClass('hidden');
        $('#vincom').removeClass('btn-primary');
        $('#vincom').addClass('btn-warning');
        $('#vcom').removeClass('btn-warning');
        $('#vcom').addClass('btn-primary');
    });
</script>
@endsection