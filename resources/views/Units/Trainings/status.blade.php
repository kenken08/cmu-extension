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
                    @if(isset($training->id))
                        <span>Status of {{$training->training_name}}</span>
                    @endif
                    
                </h3>
            </div>
            <div class="box-body">
                <form id="submit-status" action="{{route('status-update',$training->id)}}" method="post"> @csrf
                    <div class="callout callout-info callout-help">
                        <p>Status of the training Conducted or Postponed</p>
                    </div>
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Status:</label>
                            <select name="on_the_process_status" id="on_the_process_status" class="form-control">
                                <option value="{{($training->status == null)? '' : $training->status}}">Choose Option</option>
                                <option value="conducted">Conducted</option>
                                <option value="postponed">Postponed</option>
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
                            <img src="/storage/training_image/{{$training->training_image}}" width="600px" height="200px">
                        </figure>
                    </div>
                    <div class="col-md-12">
                        <label for="">Training Name</label>
                        <input class="form-control" type="text" name="" id="" value="{{$training->training_name}}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">Start Date</label>
                        <input class="form-control" type="text" name="" id="" value="{{$training->fdate_conducted}}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">End Date</label>
                        <input class="form-control" type="text" name="" id="" value="{{$training->tdate_conducted}}" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="">Description</label><br>
                        <textarea class="form-control" name="" id="" cols="65" rows="5" readonly>{{$training->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection