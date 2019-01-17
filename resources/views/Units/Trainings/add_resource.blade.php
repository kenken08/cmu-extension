@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>Trainings</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div id="app"  class="row">
        <div class="col-xs-6">
            {!! Form::open(['id'=>'addresource-form','action'=>['TrainingsController@addTopics',$train->id],'method'=>'POST']) !!} 
            {!! csrf_field()!!}
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <span><i class="fa fa-edit"></i></span>
                        <span>Add Resource and Topics to {{$train->training_name}}</span>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Resource Person Name</label>
                                <input class="form-control {{ form_error_class('resource_name', $errors) }} " type="text" name="resource_name" placeholder="Resource Person Name" value="">
                                {!! form_error_message('resource_name', $errors) !!}
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Topic</label>
                                <input class="form-control {{ form_error_class('topic', $errors) }}" type="text" name="topic" placeholder="Topic" value="">
                                {!! form_error_message('topic', $errors) !!}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" onclick="document.getElementById('addresource-form').submit();">Submit</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="col-xs-6">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-edit"></i></span>
                    <span>Resource Persons and Topics</span>
                    </h3>
                </div>
                <div class="box-body">
                    <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-user text-muted"></i>Resource Person</th>
                                <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Topic</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resource->where('train_id',$train->id) as $r)
                                <tr>
                                    <td>{{$r->resource_name}}</td>
                                    <td>{{$r->topic}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection