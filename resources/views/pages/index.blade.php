@extends('layouts.website')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12">
            <h1 class="page-header">
                <div class="container">
                        <h1>Welcome to {{config('app.name')}} @if(isset($title)){{$title}}@endif</h1>
                </div>  
            </h1>
        </div>
    </div>

    <div class="row mt-2 mb-8">
        <div class="col-sm-12">
            <div class="card h-100 border-success animated fadeIn">
                <div class="card-header">
                    <h4 class="card-title"><i class="fa fa-fw fa-home"></i> Extension </h4>
                </div>
                <div class="card-body text-justify">
                    <div class="container border-left" id="app">
                        <example-component></example-component>
                        <p>The <strong>University Extension</strong> is responsible in bringing about desirable changes among people in its service area. The office has continued implementing various programs and projects as tangible evidence of its continued support to the university’s goals which is to provide technical expertise to the clienteles.
                        The office has established <strong>Agrarian Reform Communities (ARCs)</strong>, implemented relevant extension projects, promoted agricultural technologies and conducted various trainings based on needs of the participants, served many farmers and homemakers, and developed and produced various Information, Education and Communication (IEC) materials.</p>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <br>
    <br>
    <div class="marbtm10">
        <div class="container">
            <div class="row features">
                <div class="col-md-12">
                    <h2 class="border-primary text-center">
                        <span class="heading_border bg-primary">Extension Units</span>
                    </h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="box1 animated fadeInLeft bg-blue-active">
                        <div class="box-icon text-center">
                            <h5 class="text-success" style="margin-top:26px">CBU</h5>
                        </div>
                        <div class="body text-left">
                            <div class="container">
                                <p class="text-justify">The University Extension is responsible in bringing about desirable changes among people in its service area. The office has continued implementing various programs and projects as tangible evidence of </p>
                            </div>
                        </div>
                    </div>
                </div>  
            
                <div class="col-md-4">
                    <div class="box1 animated fadeIn bg-green-active">
                        <div class="box-icon2 text-center">
                            <h5 class="text-yellow" style="margin-top:26px">ICU</h5>
                        </div>
                        <div class="body text-left">
                            <div class="container">
                                <p class="text-justify">The University Extension is responsible in bringing about desirable changes among people in its service area. The office has continued implementing various programs and projects as tangible evidence of </p>
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="col-md-4">
                    <div class="box1 animated fadeInRight bg-maroon">
                        <div class="box-icon3 text-center">
                            <h5 class="text-purple" style="margin-top:26px">TDSU</h5>
                        </div>
                        <div class="body text-left">
                            <div class="container">
                                <p class="text-justify">The University Extension is responsible in bringing about desirable changes among people in its service area. The office has continued implementing various programs and projects as tangible evidence of </p>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection