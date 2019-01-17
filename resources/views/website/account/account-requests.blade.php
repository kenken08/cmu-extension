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
                                    <span><i class="fa fa-fw fa-list"></i></span>
                                    <span>Requests</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="tbl-listsummary" data-server="false" data-page-length="10" class="table dt-table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Request</th>
                                            <th class="text-center"><i class="fa fa-fw fa-sliders text-muted"></i>Status</th>
                                            <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Request Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($requests as $request)
                                            <tr>
                                                <td>{{$request->training_name}}</td>
                                                <td class="text-center text-light text-sm"><a class="btn btn-sm btn-{{($request->status == "Approved")? 'success':'danger'}}">{{($request->status == "Approved")? 'Approved':'Declined'}}</a></td>
                                                <td class="text-center">{{date('F d, Y', strtotime($request->created_at))}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="container text-right pagination-sm">{{$requests->links()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection