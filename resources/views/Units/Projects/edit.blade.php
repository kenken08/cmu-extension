@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-edit"></i></span>
                    <span>Edit Project</span>
                </h3>
            </div>
            <div class="box-body no-padding">
                {!! Form::open(['action' => ['ProjectsController@update',$project->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                {{Form::token()}}
                    <fieldset>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group {{ form_error_class('project_name', $errors) }}">
                                    <label for="project_name">Project Name</label>
                                    <div class="input-group">
                                        <input type="text" name="project_name" class="form-control" placeholder="Project Name" value="{{ ($errors->any()? old('project_name') : $project->project_name) }}">
                                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                    </div>
                                    {!! form_error_message('project_name', $errors) !!}
                                </div>
                            </div>
                            
                            
                            <div class="col col-6">
                                <div class="form-group {{ form_error_class('venue', $errors) }}">
                                    <label for="venue">Venue</label>
                                    <div class="input-group">
                                        <input type="text" name="venue" class="form-control" placeholder="Venue" value="{{ ($errors->any()? old('venue') : $project->venue) }}">
                                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                    </div>
                                    {!! form_error_message('venue', $errors) !!}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ form_error_class('date_conducted', $errors) }}">
                                    <label for="date_conducted">Date Conducted</label>
                                    <div class="input-group">
                                        <input id="date_conducted" type="text" class="form-control" name="date_conducted" placeholder="Select Date" value="{{ ($errors->any()? old('date_conducted') : $project->date_conducted ) }}">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    {!! form_error_message('date_conducted', $errors) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{ form_error_class('to_date', $errors) }}">
                                    <label for="to_date">To Date of Conduction</label>
                                    <div class="input-group">
                                        <input id="to_date" type="text" class="form-control" name="to_date" placeholder="Select Date" value="{{ ($errors->any()? old('to_date') : $project->to_date )}}">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    {!! form_error_message('to_date', $errors) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ form_error_class('college_id', $errors) }}">
                                    <label for="college_id">College/Unit</label>
                                    <select id="college_id" name="college_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                                        <option value="{{$pcdetail}}">Select College</option>
                                        @foreach($colleges as $college)
                                            <option value={{$college->id}}>{{$college->name}}</option>
                                        @endforeach
                                    </select>
                                    {!! form_error_message('college_id', $errors) !!}
                                </div>
                            </div>
                            <input type="text" class="hidden" name="pcdetailsid" id="pcdetailsid" value="{{ $pcdetail_id }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{ form_error_class('college_id', $errors) }}">
                                        <label for="objectives">Objectives</label><br>
                                            <input data-role="tagsinput" class="form-control" type="text" name="objectives[]" id="objectives" value="
                                                @foreach($objectives as $objective)
                                                    {{",".$objective->objective}}
                                                @endforeach
                                            " disabled><br>
                                        <small class="text-red text-italic">Note: Please separate your objectives by comma (e.g Objective1, Objective2)</small>
                                        {!! form_error_message('objectives', $errors) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ form_error_class('project_image', $errors) }}">
                                    <label>Project Image (250 x 250)</label>
                                    <div class="input-group input-group-sm">
                                        <input id="photo-label" type="text" class="form-control" readonly placeholder="Browse for an image">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" onclick="document.getElementById('project_image').click();">Browse</button>
                                        </span>
                                        <input id="project_image" onchange="PreviewPDF(this)" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="project_image" onchange="document.getElementById('photo-label').value = this.value">
                                    </div>
                                    {!! form_error_message('project_image', $errors) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img id="project_photo" src="/storage/project_image/{{$project->project_image}}" alt="" width="250px" height="100px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description:</label>
                                    <textarea role="text" name="description" maxlength="191" class="form-control" placeholder="(Current Description) {{$project->description}}" style="height:100px;">{{ $project->description }}</textarea>
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
    <script type="text/javascript" charset="utf-8" src="/js/tagsinput.js"></script>
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            $("#date_conducted").datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })
        $(function ()
        {
            $("#to_date").datetimepicker({
                viewMode: 'days',
                format: 'YYYY-MM-DD'
            });
        })

        
    </script>
    <script>
        function PreviewPDF(input) {
        if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#project_photo')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection