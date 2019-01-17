@extends('layouts.admin')

@section('content')
    <div class="row mt-5">
        <div class="col-sm-12 text-right">
            <i class="fa fw fa-home"> <span>Dashboard</span> / <span>{{$title}}</span></i>
        </div><hr>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-users"></i></span>
                        <span>List of All Users</span>
                    </h3>
                </div>

                <div class="box-body">
                    <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-user text-muted"></i> Name</th>
                                <th class="text-center"><i class="fa fa-fw fa-envelope text-muted"></i> Email</th>
                                <th class="text-center"><i class="fa fa-fw fa-mobile-phone text-muted"></i> Created_at</th>
                                <th class="text-center"><i class="fa fa-fw fa-sliders text-muted"></i>Status</th>
                                <th class="text-center">Roles</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->firstname.' '. $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-center">{{ date('M d, Y h:m:s', strtotime($user->created_at))}}</td>
                                <td class="text-center"><span class="label label-{{($user->status == 'pending')?'warning':'success'}}">{{ucwords($user->status)}}</span></td>
                                <td class="text-center">
                                    @if($user->admin == '1')
                                        <span class="label label-primary">Admin</span>
                                    @elseif($user->admin == '2')
                                        <span class="label label-danger">Unit User</span>
                                    @elseif($user->admin == '3')
                                        <span class="label label-info">Coordinator User</span>
                                    @elseif($user->admin == '4')
                                        <span class="label label-warning">Expert User</span>
                                    @elseif($user->admin == '0')
                                        <span class="label label-success">Guest User</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($user->id > 1)
                                        @if($user->status == 'pending')
                                            <a href ="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalApproved{{$user->id}}" data-toggle="tooltip" title="Confirm {{ $user->firstname.' '.$user->lastname }}">
                                                <i class="fa fa-check"></i><span>Confirm Registration</span>
                                            </a> @include('admin.clients.approvedmodal')
                                        @else
                                            <a href ="/home/users/{{$user->id}}/edit" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit {{ $user->firstname.' '.$user->lastname }}">
                                                <i class="fa fa-edit"></i><span>Edit</span>
                                            </a>&nbsp;
                                            <a href ="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal{{$user->id}}" data-toggle="tooltip" title="Delete {{ $user->firstname.' '.$user->lastname }}" onclick="document.getElementById('uid').value='{{$user->id}}'">
                                                <i class="fa fa-trash"></i><span>Delete</span>
                                            </a>
                                            <input class="hidden" type="text" id="id" name="id" value="{{$user->id}}">
                                            @include('admin.clients.modal')
                                        @endif
                                    @else
                                        <span class="label label-info">No Action (primary user)</span>
                                    @endif
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