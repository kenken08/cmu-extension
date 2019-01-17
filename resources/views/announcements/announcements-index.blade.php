@extends('layouts.admin')

@section('content')
    <div class="row mt-5">
        <div class="col-sm-12 text-right">
            <i class="fa fw fa-home"><span>Dashboard</span> / {{$title}}</i>
        </div><hr>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-newspaper-o"></i></span>
                        <span>Announcements</span>
                    </h3>
                </div>

                <div class="box-body">
                    @include('flash::message')
                    <div class="well well-sm well-toolbar">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalAnn">
                            <i class="fa fa-fw fa-plus"></i>Create New Announcement
                        </button>
                    </div>
                    <div class="callout callout-info callout-help">
                        <h4 class="title">{{$title}}</h4>
                        <p class="text-red">Note: Added announcements will reflect to landing page.</p>
                    </div>
                    <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-user text-muted"></i> Announcement Title</th>
                                <th class="text-center"><i class="fa fa-fw fa-text text-muted"></i> Description</th>
                                <th class="text-center"><i class="fa fa-image"></i> Cover Photo</th>
                                <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i> Starts at</th>
                                <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i> Expires at</th>
                                <th class="text-center"><i class="fa fa-fw fa-sliders text-muted"></i>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($announcements as $announce)
                                <tr>
                                    <td>{{$announce->announcement_title}}</td>
                                    <td>{{$announce->description}}</td>
                                    <td class="text-center"><img src="/storage/ann_photo/{{$announce->ann_photo}}" alt="" width="150px" height="75px"></td>
                                    <td class="text-center">{{date('F d, Y', strtotime($announce->starts_at))}}</td>
                                    <td class="text-center">{{date('F d, Y', strtotime($announce->expires_at))}}</td>
                                    <td class="text-center">
                                        @if($announce->expires_at < \Carbon\Carbon::today())
                                            <span class="label label-danger">Expired</span>
                                        @else
                                            <span class="label label-success">On-going</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <form id="ann-delete{{$announce->id}}" action="{{route('ann-delete',$announce->id)}}" method="post"> @csrf
                                            <a onclick="document.getElementById('ann-delete{{$announce->id}}').submit()" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-trash"></i><span>Delete</span>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('announcements.modal')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(function ()
    {
        $("#starts_at").datetimepicker({
            viewMode: 'days',
            format: 'YYYY-MM-DD'
        });
    })
    $(function ()
    {
        $("#expires_at").datetimepicker({
            viewMode: 'days',
            format: 'YYYY-MM-DD'
        });
    })
</script>
<script>
    $('div.alert').not('.alert-important').delay(8000).slideUp(350);
</script>
@endsection