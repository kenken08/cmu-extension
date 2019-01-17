@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Evaluation Forms</span> / <span>{{$title}} Result</span></i>
    </div><hr>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    <label for="">Training Evaluation Summary</label>
                </h3>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <a class="input-group-addon">Project</a>
                            <input type="text" class="form-control" name="training_name" value="{{$pname}}" disabled>
                            <a id="search" href="/home/summary/training" type="button" class="input-group-addon btn btn-primary">
                                <i class="fa fa-fw fa-hand-o-up"></i>Choose Another Project
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <a class="input-group-addon">Training</a>
                            <input type="text" class="form-control" name="training_name" value="{{$tname}}" disabled>
                        </div>
                    </div>
                </div>
                <br>
                <table id="tbl-list" data-server="false" data-page-length="10" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:400px"><i class="fa fa-fw fa-book text-muted"></i>ASPECT</th>
                            <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;BEST</th>
                            <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;BETTER</th>
                            <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;GOOD</th>
                            <th class="text-center"><i class="fa fa-fw  text-muted"></i>&check;FAIR</th>
                            <th class="text-center"  style="width:140px"><i class="fa fa-fw  text-muted"></i>&check;NEEDS IMPROVEMENT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($aspects as $aspect)
                            <tr>
                                <td>{{$aspect->name}}</td>
                                <td class="text-center">{{count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',1))}}</td>
                                <td class="text-center">{{count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',2))}}</td>
                                <td class="text-center">{{count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',3))}}</td>
                                <td class="text-center">{{count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',4))}}</td>
                                <td class="text-center">{{count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',5))}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-md-12">
                        <p>
                            @if((count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',1))!=0) || 
                                (count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',2))!=0) || 
                                (count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',3))!=0) || 
                                (count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',4))!=0) || 
                                (count($summaries->where('aspect_id',$aspect->id)->where('aspect_eval',5))!=0))
                                <h4>No. of Participants: {{$part}} &emsp; No. of Evaluator: {{count($distinct)}} &emsp; Training Rate: {{round(($rate)/count($distinct))}}%</h4>
                            @else
                                <h4>No. of Participants: {{$part}} &emsp; No. of Evaluator: {{count($distinct)}} &emsp; Training Rate: 0%</h4>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-danger box-solid">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-comment"></i> Evaluator Comments</h3>
            </div>
            <div class="box-body">
                @foreach($remarks as $i => $rem)
                    <div class="row">
                        <div class="col-sm-8">
                            <h4> <img style="width:20px;height:20px;" class="img img-circle" src="/storage/profile_images/noimage.png"> &emsp; Evaluator {{$i}}</h4>
                        </div>
                    </div>
                    <h5>{{$rem}}</h5>
                    <hr>
                @endforeach
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
            $("#fdate").datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })
        $(function ()
        {
            $("#tdate").datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })
    </script>
@endsection