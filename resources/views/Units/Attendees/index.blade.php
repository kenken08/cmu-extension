@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-book"></i></span>
                @if(isset($training->training_name))
                    <span>List of Trainees under {{$training->training_name}} Training</span>
                @endif
                </h3>
            </div>

            <div class="box-body">

                <div class="well well-sm well-toolbar">
                    <div class="form-group {{ form_error_class('roles', $errors) }}">
                        <label for="attendees">Attendees</label>
                        <select id="select" class="form-control" multiple="multiple" onchange='toTable(this.id)'>
                            @foreach($attendees as $attendee)
                                <option value={{$attendee->id}}>{{$attendee->fname}}. .{{$attendee->lname}}</option>
                            @endforeach
                        </select>
                        {!! form_error_message('attendees', $errors) !!}            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection