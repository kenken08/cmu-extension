@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-success">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    <span>Summary of Evaluations</span>
                </h3>
            </div>
            <div class="box-body">
                <label for="">Training Evaluation Summary</label>
                <table id="tbl-list" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Training Name</th>
                                <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Venue</th>
                                <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Best</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Good</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Fair</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Moderate</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Needs Improvement</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                            </tr>
                        </tbody>
                </table>
                <label for="">Resource Person Evaluation Summary</label>
                <table id="tbl-list1" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Person Name</th>
                                <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Venue</th>
                                <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Best</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Good</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Fair</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Moderate</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Needs Improvement</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                                <td>Test</td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection