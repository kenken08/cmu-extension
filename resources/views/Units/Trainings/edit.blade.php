@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>Trainings</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div id="app"  class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <span><i class="fa fa-edit"></i></span>
                    <span>Edit Training</span>
                    </h3>
                </div>

                <div class="box-body no-padding">
                    {!! Form::open(['action' => ['TrainingsController@update',$training_id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::token()}}
                        <fieldset>
                            <div class="row">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('training_name', $errors) }}">
                                        <label for="training_name">Training Name</label>
                                        <div class="input-group">
                                            <input type="text" name="training_name" class="form-control" placeholder="Training Name" value="{{ ($errors->any()? old('project_name') : $training->training_name) }}">
                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                        </div>
                                        {!! form_error_message('training_name', $errors) !!}
                                    </div>
                                </div>
                                <input class="hidden" type="text" name="proj_id" class="form-control" placeholder="Training Name" value="{{ ($errors->any()? old('project_name') : $training->proj_id) }}">
                                <div class="col col-6">
                                    <div class="form-group {{ form_error_class('venue', $errors) }}">
                                        <label for="venue">Venue</label>
                                        <div class="input-group">
                                            <input type="text" name="venue" class="form-control" placeholder="Venue" value="{{ ($errors->any()? old('project_name') : $training->venue) }}">
                                            <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                        </div>
                                        {!! form_error_message('venue', $errors) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('date_conducted', $errors) }}">
                                        <label for="fdate_conducted">From Date Conducted</label>
                                        <div class="input-group">
                                            <input id="fdate_conducted" type="text" class="form-control" name="fdate_conducted" placeholder="Select Date" value="{{ ($errors->any()? old('fdate_conducted') :  $training->fdate_conducted )}}" required>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        {!! form_error_message('date_conducted', $errors) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('date_conducted', $errors) }}">
                                        <label for="date_conducted">To Date Conducted</label>
                                        <div class="input-group">
                                            <input id="tdate_conducted" type="text" class="form-control" name="tdate_conducted" placeholder="Select Date" value="{{ ($errors->any()? old('tdate_conducted') : $training->tdate_conducted )}}" required>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        {!! form_error_message('date_conducted', $errors) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group {{ form_error_class('days', $errors) }}">
                                        <label for="participants_trained">No. of Days</label>
                                        <input id="hrs" name="hrs" type="checkbox" onclick="document.getElementById('hrs').value = true">In Hrs</Input>
                                        <div class="input-group">
                                            <input id="noofdays" type="number" class="form-control" name="noofdays" placeholder="No. of Days" value="{{ ($errors->any()? old('noofdays') : $training->noofdays )}}" required>
                                            <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                        </div>
                                        {!! form_error_message('days', $errors) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ form_error_class('participants_trained', $errors) }}">
                                        <label for="participants_trained">No. of Participants</label>
                                        <div class="input-group">
                                            <input id="noofparticipantstrained" type="number" class="form-control" name="noofparticipants" placeholder="No. of Participants" value="{{ ($errors->any()? old('noofparticipants') : $training->noofparticipants )}}" required>
                                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                        </div>
                                        {!! form_error_message('date_conducted', $errors) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group {{ form_error_class('participants', $errors) }}">
                                        <label for="participants">Participants Date Trained</label>
                                        <div class="input-group">
                                            <input id="participantsdt" type="text" class="form-control" name="pdt" placeholder="Participants Date Trained" value={{ ($errors->any()? old('pdt') : $training->pdt )}} readonly>
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        </div>
                                        {!! form_error_message('participants', $errors) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('training_image', $errors) }}">
                                        <label>Training Image (1500 x 609)</label>
                                        <div class="input-group input-group-sm">
                                            <input id="photo-label" type="text" class="form-control" readonly placeholder="Browse for an image">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default" onclick="document.getElementById('training_image').click();">Browse</button>
                                            </span>
                                            <input id="training_image" onchange="PreviewPDF(this)" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="training_image" onchange="document.getElementById('photo-label').value = this.value">
                                        </div>
                                        {!! form_error_message('training_image', $errors) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img id="training_photo" src="/storage/training_image/{{$training->training_image}}" alt="" width="250px" height="100px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description:</label>
                                        <textarea role="text" name="description" class="form-control" placeholder="Write projects description here..." style="height:100px;">{{$training->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        @include('Admin.partials.form_footer')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            $("#fdate_conducted").datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })
        $(function ()
        {
            $("#tdate_conducted").datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })
    </script>
    <script>
    $(document).ready(function() {
        //this calculates values automatically 
        result();
        $("#noofdays, #noofparticipantstrained").on("keydown keyup", function() {
            result();
        });

        
    });
    function result(){
        // var check = $('#hrs').prop('checked');
        var isChecked = $('#hrs:checked').val()?true:false;
        var num1 = document.getElementById('noofdays').value;
        var num2 = document.getElementById('noofparticipantstrained').value;
        
       
        if(isChecked == true){
            var result = parseInt(num2) * .5;
        }else{
            if(num1 == 2 ){
                var result = parseInt(num2) * 1.25;
            }
            else if(num1 == 3 || num1 == 4){
                var result = parseInt(num2) * 1.5;
            }
            else if(num1 >= 5){
                var result = parseInt(num2) * 2;
            }
            else if(num1 <= 1){
                var result = parseInt(num2);
            }
        }
        document.getElementById('participantsdt').value = result;
    }
    </script>
    <script>
        function PreviewPDF(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#training_photo')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection