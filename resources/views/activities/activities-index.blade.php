@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    <span>List of Activities for {{$project->project_name}}</span>
                </h3>
            </div>

            <div class="box-body">
                <div class="well well-sm well-toolbar">
                    <button class="btn btn-labeled btn-primary" data-toggle="modal" data-target="#myModalAct">
                        <span class="btn-label"><i class="fa fa-fw fa-plus"></i></span>Add New Activity
                    </button>
                </div>
                <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Activities</th>
                            <th class="text-center" style="width:300px"><i class="fa fa-fw fa-book text-muted"></i>Description</th>
                            <th class="text-center"><i class="fa fa-photo"></i>Cover Photo</th>
                            <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Date of Activity</th>
                            <th class="text-center" style="width:100px;"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $act)
                            <tr>
                                <td>{{$act->activity_title}}</td>
                                <td>{{htmlspecialchars(trim(strip_tags($act->description)))}}</td>
                                <td class="text-center"><img src="/storage/cover_photo/{{$act->cover_photo}}" width="150px" height="75px" alt=""></td>
                                <td class="text-center">{{date('F d, Y', strtotime($act->date_of_activity))}}</td>
                                <td>
                                    <a href="/home/projects/{{$project->id}}/activities/{{$act->id}}/edit" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Edit {{$act->activity_title}}">
                                        <i class="fa fa-pencil"></i><span>Edit</span>
                                    </a>
                                    <a onclick="document.getElementById('delete_act').submit()" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete {{$act->activity_title}}">
                                        <i class="fa fa-trash"></i><span>Delete</span>
                                    </a>
                                    <form id="delete_act" action="{{route('delete_act',$project->id)}}" method="POST"> @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('activities.activities-add-modal')
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
        initSummerNote('.summernote');
        $('#form-edit').on('submit', function ()
        {
            $('#article-content').html($('.summernote').val());
            return true;
        });
    })
</script>
<script type="text/javascript" charset="utf-8">
    $(function ()
    {
        $("#date_of_activity").datetimepicker({
            viewMode: 'days',
            format: 'YYYY-MM-DD'
        });
    })
</script>
@endsection