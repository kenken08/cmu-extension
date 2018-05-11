@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    <span>List of Projects</span>
                </h3>
            </div>

            <div class="box-body">
                <div class="well well-sm well-toolbar">
                    <a class="btn btn-labeled btn-primary" href="/home/projects/create">
                        <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Create Project
                    </a>
                </div>
                <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Project Name</th>
                            <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Venue</th>
                            <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Dates of Conduction</th>
                            <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td class="text-uppercase"><a href="/home/projects/{{$project->id}}/trainings"><strong>{{ $project->project_name }}</strong></a></td>
                                <td>{{ $project->venue }}</td>
                                <td class="text-center">{{ $project->date_conducted.' - '.$project->to_date}}</td>
                                <td class="text-center">
                                    <div class="btn-toolbar">
                                        <a href ="/home/projects/{{$project->id}}/objectives" class="btn btn-primary btn-xs" data-toggle="tooltip" title="View Objectives of {{ $project->project_name }} Project">
                                            <i class="fa fa-eye"></i><span>View Objectives</span>
                                        </a>
                                        <a href ="#" class="btn btn-xs"></a>
                                        <a href ="#" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit {{ $project->project_name }}">
                                            <i class="fa fa-edit"></i><span>Edit</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection