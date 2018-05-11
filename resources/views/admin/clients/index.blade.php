@extends('layouts.admin')

@section('content')
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
                                <th><i class="fa fa-fw fa-user text-muted"></i> Name</th>
                                <th><i class="fa fa-fw fa-envelope text-muted"></i> Email</th>
                                <th><i class="fa fa-fw fa-mobile-phone text-muted"></i> Created_at</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->firstname.' '. $user->lastname }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
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
                                <td>
                                    @if($user->id > 1)
                                        <div class="btn-toolbar">
                                            <a href ="/home/users/{{$user->id}}/edit" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit {{ $user->firstname.' '.$user->lastname }}">
                                                <i class="fa fa-edit"></i><span>Edit</span>
                                            </a>
                                            <a href ="#" class="btn btn-xs"></a>
                                            <a href ="/home/users/{{$user->id}}/edit" class="btn btn-xs btn-danger btn-confirm-modal-row" data-toggle="tooltip" title="Delete {{ $user->firstname.' '.$user->lastname }}">
                                                <i class="fa fa-trash"></i><span>Delete</span>
                                            </a>
                                            {{--Form::button('<i class="fa fa-trash"></i><span>Delete</span>', ['type'=>'submit','class'=>'btn btn-xs btn-danger btn-confirm-modal-row', 'data-toggle' => 'tooltip', 'title'=>'Delete '.$user->firstname.' '.$user->lastname])--}}
                                        </div>
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