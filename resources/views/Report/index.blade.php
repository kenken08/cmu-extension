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

    <style>
        textarea {
            width: 250px;
            max-height:50px;
            resize:none;
        }
        td{
            vertical-align:middle !important;
        }
    </style>
</head>
<body>
    <div id="app">
        <br>
        <header class="container main-header">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div class="row">
                    <div class="container">
                        <div class="col-md-3">
                            <a class="pull-right btn btn-labeled btn-info" onclick="event.preventDefault;window.print()">
                                <span class="btn-label"><i class="fa fa-fw fa-print"></i></span>Print
                            </a>
                            <a href="/home" class="btn btn-labeled btn-default">
                                <span class="btn-label"><i class="fa fa-fw fa-chevron-left"></i></span>Back
                            </a>
                        </div>
                        {!! Form::open(['action'=>'ReportController@search','method'=>'POST','id'=>'searchdate']) !!}
                        {!! csrf_field() !!}
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input id="fdate" type="text" class="input-group-addon form-control" name="fdate" placeholder="Select From Date" value="{{ ($errors->any()? old('fdate') : '' )}}" required>
                                    {!! form_error_message('fdate',$errors) !!}
                                    <span class="input-group-addon"><strong>-</strong></span>
                                    <input id="tdate" type="text" class="input-group-addon form-control" name="tdate" placeholder="Select To Date" value="{{ ($errors->any()? old('tdate') : '' )}}" required>
                                    {!! form_error_message('tdate',$errors) !!}
                                    <a id="search" onclick="document.getElementById('searchdate').submit()" class="input-group-addon btn btn-labeled btn-primary">
                                        <i class="fa fa-fw fa-search"></i>Search
                                    </a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </header>
        <div>
            <div class="col-md-12">
                <div class="box-header text-center bg-white">
                    <h6 class="box-title">
                        <span class="text-uppercase">PHYSICAL REPORT ENDING {{isset($tdate)? date('F Y', strtotime($tdate)):'[Month Year]'}}</span>
                    </h6>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="input-group">
                                <span class="input-group-addon" style="border-color: transparent;">Department</span>
                                <input placeholder="Enter Department" class="form-control" type="text" name="pi" id="pi" style="border-color: transparent;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="input-group">
                                <span class="input-group-addon" style="border-color: transparent;">Agency/Bureau</span>
                                <input placeholder="Enter Agency/Bureau" class="form-control" type="text" name="pi" id="pi" style="border-color: transparent;">
                            </div>
                        </div>
                    </div>
                    <div class="body bg-white">
                        <table id="tbl-list" data-server="false" data-page-length="10" class="table table-bordered" cellspacing="0" width="100%">
                            <thead style="vertical-align:middle;">
                                <tr>
                                    <th class="text-center" style="vertical-align:middle;">Program/Activity Project (1)<br><span>EXTENSION SERVICES</span></th>
                                    <th class="text-center" style="vertical-align:middle;">Performance<br>Measures (2)</th>
                                    <th class="text-center" style="min-width:100px;vertical-align:middle;">Physical Target (3)<br>Total</th>
                                    <th class="text-center" style="min-width:100px;vertical-align:middle;">CBU (4)</th>
                                    <th class="text-center" style="min-width:100px;vertical-align:middle;">ICU (4)</th>
                                    <th class="text-center" style="min-width:100px;vertical-align:middle;">TDSU (4)</th>
                                    <th class="text-center" style="min-width:100px;vertical-align:middle;">Total (4)</th>
                                    <th class="text-center" style="min-width:100px;vertical-align:middle;">Variance (5)<br>Total</th>
                                    <th class="text-center" style="min-width:250px;vertical-align:middle;">REMARKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Programs Implemented</td>
                                    <td>No. of programs implemented</td>
                                    <td><input class="form-control" type="text" name="pi" id="physicaltarget" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="phyc" value="{{isset($projects) ? count($projects->where('college_id','=',10)):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="phyi" value="{{isset($projects) ? count($projects->where('college_id','=',11)):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="phyt" value="{{isset($projects) ? count($projects->where('college_id','=',12)):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="total1" value="{{isset($projects) ? count($projects->where('college_id','=',10))+count($projects->where('college_id','=',11))+count($projects->where('college_id','=',12)):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="variancetotal" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Barangays/Schools/Communities assisted</td>
                                    <td>No. of barangays/schools/communities assisted</td>
                                    <td><input class="form-control"type="number" name="bsca" id="bsca" value="{{ ($errors->any()? old('bsca') : '') }}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="bc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="bi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="bt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="bscat" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal0" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Trainings Conducted</td>
                                    <td>No. of trainings conducted</td>
                                    <td><input class="form-control" type="number" name="tc" id="tc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="trainc" value="{{isset($trainings) ? count($trainings->where('college_id','=',10)):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="traini" value="{{isset($trainings) ? count($trainings->where('college_id','=',11)):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="traint" value="{{isset($trainings) ? count($trainings->where('college_id','=',12)):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="tct" value="{{isset($trainings) ? count($trainings->where('college_id','=',10))+count($trainings->where('college_id','=',11))+count($trainings->where('college_id','=',12)):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal1" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Participants trained</td>
                                    <td>No. of participants trained</td>
                                    <td><input class="form-control" type="number" name="pt" id="pt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="partc" value="{{isset($trainings) ? $trainings->where('college_id','=',10)->sum('noofparticipants'):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="parti" value="{{isset($trainings) ? $trainings->where('college_id','=',11)->sum('noofparticipants'):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="partt" value="{{isset($trainings) ? $trainings->where('college_id','=',12)->sum('noofparticipants'):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="ptt" value="{{isset($trainings) ? ($trainings->where('college_id','=',10)->sum('noofparticipants'))+($trainings->where('college_id','=',11)->sum('noofparticipants'))+($trainings->where('college_id','=',12)->sum('noofparticipants')):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal2" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Farmers/Homemakers/Students/OSY assisted</td>
                                    <td>No. of Farmers/Homemakers/Students/OSY assisted/</td>
                                    <td><input class="form-control" type="number" name="fhso" id="fhso" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="ft" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fhsot" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal3" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Info-Drive conducted</td>
                                    <td>No. of Info-Drive conducted</td>
                                    <td><input class="form-control" type="number" name="id" id="id" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="ic" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="ii" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="it" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="idt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal4" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Technology Demonstrated</td>
                                    <td>No. of Technology Demonstrated</td>
                                    <td><input class="form-control input-xs" type="number" name="td" id="td" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="tdc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="tdi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="tdt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="tdtt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal5" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Farm Visits</td>
                                    <td>No. of Farm Visits</td>
                                    <td><input class="form-control input-xs" type="number" name="fv" id="fv" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fvc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fvi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fvt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fvtt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal6" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Farmer's Meeting attended</td>
                                    <td>No. of Farmer's Meeting attended</td>
                                    <td><input class="form-control input-xs" type="number" name="fma" id="fma" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fmc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fmi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fmt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="fmat" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal7" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Multimedia materials produced</td>
                                    <td>No. of Multimedia materials produced</td>
                                    <td><input class="form-control input-xs" type="number" name="mmp" id="mmp" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="mc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="mi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="mt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="mmpt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal8" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Office callers/field trippers served</td>
                                    <td>No. of Office callers/field trippers served</td>
                                    <td><input class="form-control input-xs" type="number" name="of" id="of" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="oc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="oi" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="ot" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="oft" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal9" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Person-day Trained</td>
                                    <td>No. of Person-day Trained</td>
                                    <td><input class="form-control" type="number" name="pdt"id="pdt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="pc" value="{{isset($trainings) ? $trainings->where('college_id','=',10)->sum('pdt'):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="pei" value="{{isset($trainings) ? $trainings->where('college_id','=',11)->sum('pdt'):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="pet" value="{{isset($trainings) ? $trainings->where('college_id','=',12)->sum('pdt'):0}}" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="pdtt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal10" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Trngs/Extension activities conducted on schedule</td>
                                    <td>No. of Trngs/Extension activities conducted on schedule</td>
                                    <td><input class="form-control" type="number" name="teac" id="teac" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="tec" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="tei" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="tet" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="teact" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal11" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Linkages with agencies</td>
                                    <td>No. of Linkages with agencies</td>
                                    <td><input class="form-control input-xs" type="number" name="lwa" id="lwa" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="lc" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="li" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="lt" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="lwat" value="" style="border-color: transparent;"></td>
                                    <td><input class="form-control" type="number" name="pi" id="vtotal12" value="" style="border-color: transparent;"></td>
                                    <td><textarea name="remarks" id="remarks" cols="30" rows="5" style="border-color: transparent;"></textarea></td>
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
    <script>
        $(document).ready(function() {
            //this calculates values automatically 
            result();   vtotal3();  vtotal7();  vtotal11();
            vtotal0();  vtotal4();  vtotal8();  vtotal12();
            vtotal1();  vtotal5();  vtotal9();
            vtotal2();  vtotal6();  vtotal10();
            $("#physicaltarget,#phyc,#phyi,#phyt,#variancetotal,#total1").on("keydown keyup change", function() {
                result();
            });
            $("#bsca,#bscat,#bc,#bi,#bt").on("keydown keyup change", function() {
                vtotal0();
            });
            $("#tc,#tct,#trainc,#traini,#traint").on("keydown keyup", function() {
                vtotal1();
            });
            $("#pt,#ptt,#partc,#parti,#partt").on("keydown keyup", function() {
                vtotal2();
            });
            $("#fhso,#fc,#fi,#ft,#fhsot").on("keydown keyup change", function() {
                vtotal3();
            });
            $("#id,#idt,#ic,#ii,#it").on("keydown keyup change", function() {
                vtotal4();
            });
            $("#td,#tdtt,#tdc,#tdi,#tdt").on("keydown keyup change", function() {
                vtotal5();
            });
            $("#fv,#fvtt,#fvc,#fvi,#fvt").on("keydown keyup change", function() {
                vtotal6();
            });
            $("#fma,#fmat,#fmac,#fmi,#fmt").on("keydown keyup change", function() {
                vtotal7();
            });
            $("#mmp,#mmpt,#mc,#fmi,#mt").on("keydown keyup change", function() {
                vtotal8();
            });
            $("#of,#oft,#oc,#oi,#ot").on("keydown keyup change", function() {
                vtotal9();
            });
            $("#pdt,#pdtt,#pc,#pei,#pet").on("keydown keyup change", function() {
                vtotal10();
            });
            $("#teac,#tec,#tei,#tet").on("keydown keyup change", function() {
                vtotal11();
            });
            $("#lwa,#lc,#li,#lt").on("keydown keyup change", function() {
                vtotal12();
            });
        });
        function result(){
            // var check = $('#hrs').prop('checked');
            var num1 = document.getElementById('physicaltarget').value;
            var num2 = document.getElementById('total1').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('variancetotal').value = result;

            var bc = document.getElementById('phyc').value;
            var bi = document.getElementById('phyi').value;
            var bt = document.getElementById('phyt').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('total1').value = total;
        }
        function vtotal0(){
            var num1 = document.getElementById('bsca').value;
            var num2 = document.getElementById('bscat').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal0').value = result;

            var bc = document.getElementById('bc').value;
            var bi = document.getElementById('bi').value;
            var bt = document.getElementById('bt').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('bscat').value = total;
        }
        function vtotal1(){
            var num1 = document.getElementById('tc').value;
            var num2 = document.getElementById('tct').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal1').value = result;

            var bc = document.getElementById('trainc').value;
            var bi = document.getElementById('traini').value;
            var bt = document.getElementById('traint').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('tct').value = total;
        }
        function vtotal2(){
            var num1 = document.getElementById('pt').value;
            var num2 = document.getElementById('ptt').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal2').value = result;

            var bc = document.getElementById('partc').value;
            var bi = document.getElementById('parti').value;
            var bt = document.getElementById('partt').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('ptt').value = total;
        }
        function vtotal3(){
            var num1 = document.getElementById('fhso').value;
            var num2 = document.getElementById('fhsot').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal3').value = result;

            var bc = document.getElementById('fc').value;
            var bi = document.getElementById('fi').value;
            var bt = document.getElementById('ft').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('fhsot').value = total;
        }
        function vtotal4(){
            var num1 = document.getElementById('id').value;
            var num2 = document.getElementById('idt').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal4').value = result;

            var bc = document.getElementById('ic').value;
            var bi = document.getElementById('ii').value;
            var bt = document.getElementById('it').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('idt').value = total;
        }
        function vtotal5(){
            var num1 = document.getElementById('td').value;
            var num2 = document.getElementById('tdtt').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal5').value = result;

            var bc = document.getElementById('tdc').value;
            var bi = document.getElementById('tdi').value;
            var bt = document.getElementById('tdt').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('tdtt').value = total;
        }
        function vtotal6(){
            var num1 = document.getElementById('fv').value;
            var num2 = document.getElementById('fvtt').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal6').value = result;

            var bc = document.getElementById('fvc').value;
            var bi = document.getElementById('fvi').value;
            var bt = document.getElementById('fvt').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('fvtt').value = total;
        }
        function vtotal7(){
            var num1 = document.getElementById('fma').value;
            var num2 = document.getElementById('fmat').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal7').value = result;

            var bc = document.getElementById('fmc').value;
            var bi = document.getElementById('fmi').value;
            var bt = document.getElementById('fmt').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('fmat').value = total;
        }
        function vtotal8(){
            var num1 = document.getElementById('mmp').value;
            var num2 = document.getElementById('mmpt').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal8').value = result;

            var bc = document.getElementById('mc').value;
            var bi = document.getElementById('mi').value;
            var bt = document.getElementById('mt').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('mmpt').value = total;
        }
        function vtotal9(){
            var num1 = document.getElementById('of').value;
            var num2 = document.getElementById('oft').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal9').value = result;

            var bc = document.getElementById('oc').value;
            var bi = document.getElementById('oi').value;
            var bt = document.getElementById('ot').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('oft').value = total;
        }
        function vtotal10(){
            var num1 = document.getElementById('pdt').value;
            var num2 = document.getElementById('pdtt').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal10').value = result;

            var bc = document.getElementById('pc').value;
            var bi = document.getElementById('pei').value;
            var bt = document.getElementById('pet').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('pdtt').value = total;
        }
        function vtotal11(){
            var num1 = document.getElementById('teac').value;
            var num2 = document.getElementById('teact').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal11').value = result;

            var bc = document.getElementById('tec').value;
            var bi = document.getElementById('tei').value;
            var bt = document.getElementById('tet').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('teact').value = total;
        }
        function vtotal12(){
            var num1 = document.getElementById('lwa').value;
            var num2 = document.getElementById('lwat').value;
            var result = parseInt(num2) - parseInt(num1);
            document.getElementById('vtotal12').value = result;

            var bc = document.getElementById('lc').value;
            var bi = document.getElementById('li').value;
            var bt = document.getElementById('lt').value;

            var total = parseInt(bc)+parseInt(bi)+parseInt(bt);
            document.getElementById('lwat').value = total;
        }
    </script>
</body>
</html>

