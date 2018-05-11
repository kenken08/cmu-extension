@extends('layouts.admin')

@section('content')
@if(Auth::user()->admin =='1')
    <div class="row mt-5">
        <div class="col-sm-12 text-right">
            <i class="fa fw fa-home"><span class="text-lg">Dashboard</span></i>
        </div>
        <div class="col-sm-12">
            <h1 class="page-header">
                Hi {{auth()->user()->firstname.' ' .auth()->user()->lastname}} what would you like to do?
            </h1>
        </div>
    </div>
            
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
             <a class="text-muted" href="#">Dashboard</a>
        </li>         
    </ol>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.analytics.partials.analytics_header')
        </div>
    </div>
@elseif(Auth::user()->admin == '2')
    <div class="row mt-5">
        <div class="col-sm-12 text-right">
            <i class="fa fw fa-home"><span class="text-lg">Dashboard</span></i>
        </div>
        <div class="col-sm-12">
            <h1 class="page-header">
                Hi {{auth()->user()->firstname.' ' .auth()->user()->lastname}} what would you like to do?
            </h1>
        </div>
    </div>
            
    <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item">
             <a class="text-muted" href="#">Dashboard</a>
        </li>         
    </ol>
@endif
@endsection
