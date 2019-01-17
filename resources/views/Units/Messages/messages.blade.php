@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header bg-ebonyclay">
                <h3 class="box-title text-white">
                    <span><i class="fa fa-comments"></i></span>
                    <span>Messages</span>
                </h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                            <div class="box-header bg-green-active">
                                <h3 class="box-title">
                                    <span><i class="fa fa-mobile"></i></span>
                                    <span>Contacts</span>
                                </h3>
                            </div>
                            <div class="box-body">
                                <table class="table nowrap">
                                    <thead>
                                        <th class="text-center">Name</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($messages as $mess)
                                            @foreach(\App\User::where('id',$mess->user_id)->get() as $user)
                                                <tr>
                                                    <td class="text-center"><img class="img img-circle" src="/storage/profile_images/{{$user->profile_image}}" style="width:30px;height:30px;"></td>
                                                    <td class="text-center">&emsp;
                                                        {{$user->firstname.' '.$user->lastname}}
                                                        @foreach(\App\Requestdetails::where('repliedbyid',$mess->user_id)->where('status',0)->get() as $uid)
                                                            @if($uid->repliedbyid == $mess->user_id)
                                                                 <span class="label label-success">{{count(\App\Requestdetails::where('repliedbyid',$mess->user_id)->where('status',0)->get())}}</span>
                                                            @endif
                                                            @break

                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        {!! Form::open(['action'=>['MessageController@getreplies',$mess->id],'method'=>'POST','id'=>'replies']) !!}
                                                        {!! csrf_field() !!}
                                                            <input type="text" name="req" id="req" value="" class="hidden">
                                                            <a id="rep" class="btn btn-xs btn-primary pull-right" onclick="document.getElementById('req').value = {{$mess->id}};document.getElementById('reqid').value = {{$mess->id}}; document.getElementById('replies').submit();"><i class="fa fa-eye"> View</i></a>
                                                        {!! Form::close() !!}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="box">
                            <div class="box-header bg-blue-active">
                                <h3 class="box-title">
                                    <span><i class="fa fa-comments"></i></span>
                                    <span>Message</span>
                                </h3>
                            </div>
                            <div id="contrep" name="contrep[]" class="box-body" style="max-height:400px;overflow:auto">
                                @if(isset($rd))
                                    @foreach($rd as $rep)
                                        <div class="box box-{{($rep->repliedbyid == auth()->user()->id)?'success':'warning'}}">
                                            <div class="box-header text-sm">
                                                <small class="box-title">
                                                    <span><img class="img img-circle" src="/storage/profile_images/{{$rep->profile_image}}" style="width:20px;height:20px;"></span>
                                                    <span>&emsp;{{$rep->firstname.' '.$rep->lastname}}</span>
                                                </small>
                                                <h6 class="pull-right">{{date('M d, Y h:m A',strtotime($rep->datetime))}}</h6>
                                            </div>
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>{{$rep->message}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            {!! Form::open(['action'=>'MessageController@reply','method'=>'POST','id'=>'sende']) !!}
                                            {!! csrf_field() !!}
                                                <input type="text" name="reqid" id="reqid" value="{{isset($rid)?$rid:''}}" class="hidden">
                                                <div class="col-md-10">
                                                    <textarea name="reply" id="reply" cols="95" rows="4" style="resize:none;" placeholder="Enter your message here"></textarea>
                                                </div>
                                                <div id="ajaxResponse">

                                                </div>
                                                <div class="col-md-2">
                                                    <div id="cont"><a id="send" class="btn btn-primary disabled" onclick="document.getElementById('sende').submit();"> Send</a></div>
                                                </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $('#reply').on('emptied readystatechange', function(){
            changes();
        });
        $('#reply').on('keyup', function(){
            change();
        });
    });
    function change(){
        $('#send').removeClass('disabled');   
    }
    function changes(){
        $('#send').addClass('disabled');
    }

    $('#req,#rep').on('change click', function () {
            getReplies($(this).val());
        });
        function getReplies(id) {
            $.get("{{url('/getreplies')}}/" + id, function (data) {
                $("#contrep").html(data);
            });
        }
        $(document).ready(function () {
            getReplies($('#req').val());
        });
</script>
@endsection