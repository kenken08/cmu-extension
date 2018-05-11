@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                    <span>List of Trainees</span>
                </h3>
                @if(isset($train->id))
                    <input class="hidden" type="text" value="{{$train->id}}">
                @endif
            </div>

            <div class="box-body">
                    <div class="well well-sm well-toolbar">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-fw fa-plus"></i>Add Trainee
                        </button>
                    </div>
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
                                        <td class="text-uppercase">{{ $attendee->fname.' '.$attendee->lname }}</td>
                                        <td>{{ $attendee->occupation }}</td>
                                        <td class="text-center">{{ $attendee->address}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
                @include('Units.Attendees.modal')
            </div>
        </div>
    </div>
</div>
@endsection