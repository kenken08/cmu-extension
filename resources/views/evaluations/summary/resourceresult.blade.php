@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Evaluation Forms</span> / <span>Resource Person Evaluation {{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <i class="fa fa-edit"><span>&nbsp;Resource Person Evaluation Summary</span></i>
                </h3>
            </div>
            <div class="box-body no-padding">
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <a class="input-group-addon">Project</a>
                                <input type="text" class="form-control" name="training_name" value="{{$pname}}" readonly>
                                <a id="search" href="/home/summary/resource" type="button" class="input-group-addon btn btn-primary">
                                    <i class="fa fa-fw fa-hand-o-up"></i>Choose Another Project
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <a class="input-group-addon">Training</a>
                                <input type="text" class="form-control" name="training_name" value="{{$tname}}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <a class="input-group-addon">Resource Person</a>
                                <input type="text" class="form-control" name="training_name" value="{{$rname->resource_name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <a class="input-group-addon">Topic</a>
                                <input type="text" class="form-control" name="training_name" value="{{$rname->topic}}" readonly>
                            </div>
                        </div>
                    </div>
                    <table name="tosave" id="tbl-list" data-server="false" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center hidden">ID</th>
                                <th class="text-center" style="width:500px"><i class="fa fa-fw fa-book text-muted"></i>Indicator</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Poor (1)</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Fair (2)</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Moderate (3)</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Good (4)</th>
                                <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;Excellent (5)</th>
                                <th class="text-center hidden">IT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($resources as $aspect)
                                <tr>
                                    <td>{{$aspect->indicator}}</td>
                                    <td class="text-center">{{count($summaries->where('indicator_id',$aspect->id)->where('indicator_eval',1))}}</td>
                                    <td class="text-center">{{count($summaries->where('indicator_id',$aspect->id)->where('indicator_eval',2))}}</td>
                                    <td class="text-center">{{count($summaries->where('indicator_id',$aspect->id)->where('indicator_eval',3))}}</td>
                                    <td class="text-center">{{count($summaries->where('indicator_id',$aspect->id)->where('indicator_eval',4))}}</td>
                                    <td class="text-center">{{count($summaries->where('indicator_id',$aspect->id)->where('indicator_eval',5))}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <div class="box-footer">
                <div class="col-md-2">
                    <h4>No. of Evaluator: {{$noe}}</h4>
                </div>
                <div class="col-md-2">
                    <h4>Rating: {{($rate == 0)? 0 : round($rate/$noe)}}%</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection