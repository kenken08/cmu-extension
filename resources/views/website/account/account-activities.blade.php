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
                                    <span><i class="fa fa-fw fa-clock-o"></i> Activities</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="tbl-listsummary" data-server="false" data-page-length="10" class="table dt-table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><i class="fa fa-fw fa-list text-muted"></i>Participated Events</th>
                                            <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($events)<=0)
                                            <tr>
                                                <td class="text-center" style="vertical-align:middle;">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4>No participated Events</h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center" style="vertical-align:middle;">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h4><i class="fa fa-fw fa-frown-o"></i></h4>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach($events as $event)
                                                <tr>
                                                    <td style="vertical-align:middle;">{{$event->training_name}}</td>
                                                    <td class="text-center" style="vertical-align:middle;">{{date('F d, Y', strtotime($event->fdate_conducted))}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection