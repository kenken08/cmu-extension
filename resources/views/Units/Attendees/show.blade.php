@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>Trainings</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    <span>List of Participants of {{$train->training_name}}</span>
                </h3>
                @if(isset($train->id))
                    <input class="hidden" type="text" value="{{$train->id}}">
                @endif
            </div>
            <div class="box-body">
                @if(auth()->user()->admin == 2)
                    <div class="well well-sm well-toolbar">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalatt">
                            <i class="fa fa-fw fa-plus"></i>Add Participant
                        </button>
                    </div>
                @endif
                <table id="tbl-listed" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="fa fa-fw fa-user text-muted"></i>Name</th>
                            <th class="text-center">Occupation</th>
                            <th class="text-center"><i class="fa fa-fw fa-location-arrow text-muted"></i>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $detail)
                            @foreach ($attendees as $attendee)
                                @if($detail->training_id == $train->id && $detail->attendee_id == $attendee->id)
                                    <tr>
                                        <td class="text-uppercase">
                                            <a href="" data-toggle="modal" data-target="#myModalAttendee{{$attendee->id}}">{{ $attendee->fname.' '.$attendee->lname }}</a>
                                        </td>
                                        <td>{{ $attendee->occupation }}</td>
                                        <td class="text-center">{{ $attendee->address}}</td>
                                    </tr>
                                    @include('Units.Attendees.attendeemodal')
                                @endif
                            @endforeach
                            @foreach(\App\User::all() as $user)
                                @if($detail->attendee_id == $user->id && $detail->training_id == $train->id)
                                    <tr>
                                        <td class="text-uppercase">{{ $user->firstname.' '.$user->lastname }}</td>
                                        <td>N/A</td>
                                        <td class="text-center">N/A</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('Units.Attendees.modal')
@endsection