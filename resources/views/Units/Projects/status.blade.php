@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-5">
        <div class="box box-primary box-solid">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    @if(isset($project->id))
                        <span>Status of {{$project->project_name}}</span>
                    @endif
                    
                </h3>
            </div>
            <div class="box-body">
                <form id="submit-status" action="{{route('update-status',$project->id)}}" method="post"> @csrf
                    <div class="callout callout-info callout-help">
                        <p>You can leave the On the process status for the mean time. Update if needed.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Start Date:</label>
                            <select name="start_status" id="start_status" class="form-control">
                                <option value="{{($project->start_status == null)? '' : $project->start_status}}">Choose Option</option>
                                <option value="ontime">On-Time</option>
                                <option value="delayed">Delayed</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">On The Process Status:</label>
                            <select name="on_the_process_status" id="on_the_process_status" class="form-control">
                                <option value="{{($project->otp_status == null)? '' : $project->otp_status}}">Choose Option</option>
                                <option value="ongoing">On-Going</option>
                                <option value="finished">Ended On-Time</option>
                                <option value="extended">Extended</option>
                                <option value="ended">Ended but Delayed</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" onclick="document.getElementById('submit-status').submit()">Save</button>
            </div>
        </div>
    </div>
    <div class="col-xs-7">
        <div class="box box-success">
            <div class="box-header">
                <h3 class="box-title">Project Details</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <figure>
                            <img src="/storage/project_image/{{$project->project_image}}" width="600px" height="200px">
                        </figure>
                    </div>
                    <div class="col-md-12">
                        <label for="">Project Name</label>
                        <input class="form-control" type="text" name="" id="" value="{{$project->project_name}}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">Start Date</label>
                        <input class="form-control" type="text" name="" id="" value="{{$project->date_conducted}}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">End Date</label>
                        <input class="form-control" type="text" name="" id="" value="{{$project->to_date}}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label><br>
                        <textarea class="form-control" name="" id="" cols="65" rows="5" readonly>{{$project->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection