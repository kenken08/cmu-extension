<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@if(isset($title)){{$title}} |@endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <br>
        <header class="container main-header">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div class="row">
                    <div class="container">
                        <a href="javascript:window.history.back();" class="btn btn-labeled btn-default">
                            <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                        </a>
                        <a href="" class="pull-right btn btn-labeled btn-default" onclick="window.print()">
                            <span class="btn-label"><i class="fa fa-fw fa-print"></i></span>Print
                        </a>
                    </div>
                </div>
            </div>
        </header>
        <div>
            <div class="card col-md-12">
                <div class="box-header text-center bg-white">
                    <h6 class="box-title">
                        <span>PHYSICAL REPORT ENDING JUNE 2017</span>
                    </h6>
                </div>
                <div class="box-body">
                    <h6>Department&emsp;&emsp;&emsp;&nbsp;&nbsp;:</h6><h6>Agency/Bureau&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</h6>
                    <div class="card-body bg-white">
                        <table id="tbl-list" data-server="false" data-page-length="10" class=" text-center table table-bordered" cellspacing="0" width="100%">
                            <thead class="text-center">
                                <th style="width:175px;">Program/Activity</th>
                                <th style="width:176px">Performance</th>
                                <th style="width:76px"><small>Physical Target (3)</small></th>
                                <th style="width:300px">Accomplishments</th>
                                <th style="width:75px"><small>Variance (5)</small></th>
                                <th style="width:165px">REMARKS</th>
                            </thead>
                        </table>
                        <table id="tbl-list" data-server="false" data-page-length="10" class="table-bordered" cellspacing="0" width="100%" style="margin-top:-20px">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:190px;">Project (1)<br><span>EXTENSION SERVICES</span></th>
                                    <th class="text-center" style="width:190px;">Measures (2)</th>
                                    <th class="text-center" style="width:75px;">Total</th>
                                    <th class="text-center" style="width:75px;">CBU</th>
                                    <th class="text-center" style="width:75px;">ICU</th>
                                    <th class="text-center" style="width:75px;">TDSU</th>
                                    <th class="text-center" style="width:75px;">Total</th>
                                    <th class="text-center" style="width:75px;">Total</th>
                                    <th style="width:190px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><h6>Programs Implemented</h6></td>
                                    <td><h6>No. of programs implemented</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="text" name="pi" id="pi" value="" aria-multiline="true" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Barangays/Schools/Communities assisted</h6></td>
                                    <td><h6>No. of barangays/schools/communities assisted</h6></td>
                                    <td><input class="form-control input-xs"type="number" name="bsca" id="bsca" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Trainings Conducted</h6></td>
                                    <td><h6>No. of trainings conducted</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="tc" id="tc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Participants trained</h6></td>
                                    <td><h6>No. of participants  trained</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="pt" id="pt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Farmers/Homemakers/Students/OSY assisted</h6></td>
                                    <td><h6>No. of Farmers/Homemakers/Students/OSY assisted/</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="fhso" id="fhso" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Info-Drive conducted</h6></td>
                                    <td><h6>No. of Info-Drive conducted</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="id" id="id" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Technology Demonstrated</h6></td>
                                    <td><h6>No. of Technology Demonstrated</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="" id="bsca" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Farm Visits</h6></td>
                                    <td><h6>No. of Farm Visits</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="fv" id="fv" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Farmer's Meeting attended</h6></td>
                                    <td><h6>No. of Farmer's Meeting attended</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="fma" id="fma" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Multimedia materials produced</h6></td>
                                    <td><h6>No. of Multimedia materials produced</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="mmp" id="mmp" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Office callers/field trippers served</h6></td>
                                    <td><h6>No. of Office callers/field trippers served</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="of" id="of" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Person-day Trained</h6></td>
                                    <td><h6>No. of Person-day Trained</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="pdt" id="pdt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Trngs/Extension activities conducted on schedule</h6></td>
                                    <td><h6>No. of Trngs/Extension activities conducted on schedule</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="teac" id="teac" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                                <tr>
                                    <td><h6>Linkages with agencies</h6></td>
                                    <td><h6> No. of Linkages with agencies</h6></td>
                                    <td><input class="form-control input-xs" type="number" name="lwa" id="lwa" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control input-xs" type="number" name="pi" id="pi" value="" style="border-color: transparent;"></td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <br>
                        <div class="pull-right row text-center" style="margin-right: 90px">
                            <div class="com-md-4">
                                <h4 for="director" class="text-underline" style="text-decoration:underline">EMMANUEL BALTAZAR</h4>
                                <label style="margin-top: -90px">Extension Director</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
