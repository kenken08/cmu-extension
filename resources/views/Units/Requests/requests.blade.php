@extends('layouts.admin')

@section('content')
<div class="row mt-5">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span class="text-lg">{{$title}}</span></i>
    </div>
</div>
<br>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-bookmark">&nbsp;List of Requests</i></span>
                </h3>
            </div>
            <div class="box-body">
                <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Requesters Name</th>
                            <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Date of Request</th>
                            <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                            <tr>
                                @foreach($users as $user)
                                    @if($user->id == $request->user_id)
                                        <td><strong class="text-uppercase">{{$user->firstname.' '.$user->lastname}}</strong></td>
                                    @endif
                                @endforeach  
                                <td class="text-center"><span class="btn btn-sm btn-warning" style="width:100px">{{date('M d,Y', strtotime($request->created_at))}}</span></td>
                                <td class="text-center">
                                {{-- {!! Form::open(['action'=>['RequestTrainingsController@showrequested',$request->id],'method'=>'POST']) !!}
                                {!! csrf_field() !!} --}}
                                    <a href="/home/requests/{{$request->id}}/view" class="btn btn-sm btn-primary"  data-toggle="tooltip" title="View Requested Trainings of {{ $user->firstname.' '.$user->lastname }}"><i class="fa fa-fw fa-eye"></i>View Requested Trainings</a>
                                {{-- {!! Form::close() !!} --}}
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