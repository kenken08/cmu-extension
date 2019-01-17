@extends('layouts.admin')

@section('content')
<div class="row mt-5">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span class="text-lg">{{$title}}</span></i>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-4">
        <div class="card2" style="margin-top:70px">
            <div class="box-body">
                @foreach($user as $use)
                    <img class="img img-circle" src="/storage/profile_images/{{$use->profile_image}}" style="width:150px;height:150px; margin-top:-85px">
                    <br>
                    <br>
                    <h3><i class="fa -fa-fw fa-user-circle"></i>&nbsp;<br>{{$use->firstname.' '.$use->lastname}}</h3>
                    <p><i class="fa fa-fw fa-birthday-cake"></i>&nbsp;{{date('M d, Y', strtotime(auth()->user()->born_at))}}</p>
                    @if($use->contactno == null)
                        <p><i class="fa fa-fw fa-mobile"></i>&nbsp;Not Set</p>
                    @else
                        <p><i class="fa fa-fw fa-mobile"></i>&nbsp;{{ $use->contactno }}</p>
                    @endif
                    <p><i class="fa fa-fw fa-envelope"></i>&nbsp;{{$use->email}}</p>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-success1">
            <div class="box-header">
                <h4><i class="fa fa-fw fa-list"></i> Trainings Requested</h4>
            </div>
            <div class="callout callout-info callout-help">
                <h4 class="title">{{$title}}</h4>
                <p class="text-red">Note: Click the training name under the Trainings Requested column to set date when to conduct the Trainings.</p>
            </div>
            <div class="box-body">
                {!! Form::open(['action'=>'RequestTrainingsController@updateStatus','method'=>'POST']) !!}
                {!! csrf_field() !!}
                    <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="width:180px"><i class="fa fa-fw fa-book text-muted"></i>Trainings Requested</th>
                                <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Date of Request</th>
                                <th class="text-center">Status</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($requests as $request)
                                <tr>
                                    <td class="text-uppercase hidden"><input type="text" name="statid[]" id="statid" value="{{$request->id}}"></td>
                                    @foreach($trainings as $training)
                                        @if($training->id == $request->training_id)
                                            @if($request->status == 'Declined' || $request->status == 'Pending')
                                                <td><strong class="text-uppercase">{{$training->training_name}}</strong></td>
                                            @else
                                                <td>
                                                    <a href ="" data-toggle="modal" data-target="#myModal" onclick="document.getElementById('dateid').value='{{$request->id}}'">
                                                        <strong class="text-uppercase">{{$training->training_name}}</strong></a>    
                                                    </a>
                                                </td>
                                            @endif
                                        @endif
                                    @endforeach  
                                    <td class="text-center"><span class="btn btn-sm btn-warning" style="width:100px">{{date('M d,Y', strtotime($request->created_at))}}</span></td>
                                    <td class="text-center">
                                        @if($request->status == 'Pending')
                                            <span class="btn btn-sm btn-warning">Pending</span>
                                        @elseif($request->status == 'Approved')
                                            <span class="btn btn-sm btn-success">Approved</span>
                                        @elseif($request->status == 'Declined')
                                            <span class="btn btn-sm btn-danger">Declined</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <select class="form-control" name="requestact[]" id="requestact">
                                            <option class="hidden" value="{{$request->status}}">Choose Action</option>
                                            <option class="text-warning" value="Pending">Pending</option>
                                            <option class="text-success" value="Approved">Approved</option>
                                            <option class="text-danger" value="Declined">Decline</option>
                                        </select>
                                    </td>  
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('admin.partials.form_footer')
                {!! Form::close() !!}
                @include('Units.Requests.modal')
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" charset="utf-8">
    $(function ()
    {
        $("#setfDate").datetimepicker({
            viewMode: 'days',
            format: 'YYYY-MM-DD'
        });
    })
    $(function ()
    {
        $("#settDate").datetimepicker({
            viewMode: 'days',
            format: 'YYYY-MM-DD'
        });
    })
</script>
@endsection