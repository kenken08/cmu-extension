@extends('layouts.website')

@section('content')
@include('website.account.account-breadcrumbs')
<section>
    <div class="row">
        <div class="container">
            <div class="row">
                @include('website.account.accountsidebar')&emsp;
                <div class="col-md-8">
                    <div class="col-lg-12">
                        <div class="card2" style="width:800px;">
                            <div class="card-header" style="border:black;border-top: 5px solid orangered!important;background:rgb(34, 49, 63);color:white">
                                <h3 class="card-title">
                                    <span><i class="fa fa-fw fa-comments"></i> Messages</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body" style="max-height:310px;overflow:auto">
                                                @foreach($rd as $rep)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h6 class="card-title">
                                                                <span><img class="img img-circle" src="/storage/profile_images/{{$rep->profile_image}}" style="width:20px;height:20px;"></span>
                                                                <span>&emsp;{{($rep->repliedbyid == auth()->user()->id)? 'You':$rep->firstname.' '.$rep->lastname}}</span>
                                                                <small>{{date('M d, Y h:m A',strtotime($rep->datetime))}}</small>
                                                            </h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <p>{{$rep->message}}</p>
                                                        </div>
                                                    </div><br>
                                                @endforeach
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        {!! Form::open(['action' => 'MessageController@send', 'method' => 'POST','id'=>'mess'])!!}
                                                        {!! csrf_field() !!}
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <textarea name="message" id="message" cols="85" rows="4" style="resize:none;" placeholder="Enter your message here"></textarea>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <a class="text-light pull-left btn btn-primary" onclick="document.getElementById('mess').submit();"> Send</a>
                                                                </div>
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
        </div>
    </div>
</section>
@endsection