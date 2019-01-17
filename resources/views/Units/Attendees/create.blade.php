@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
    <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>Trainings</span> / <span>Participants</span> / <span>{{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <span><i class="fa fa-plus"></i> Add Participant</span>
                </h3>
            </div>

            <div class="box-body no-padding">
                @if(isset($project->id))
                    <input type="text" name="proj_id" class="" value="{{$project->id}}">
                    <input type="text" name="training_id" class="" value="{{$training->id}}">
                @endif
                {!! Form::open(['action' => 'AttendeesController@store', 'method' => 'POST']) !!}
                {!!csrf_field()!!}
                    <fieldset>
                        <div class="row">
                            <div class="col col-6">
                                <div class="form-group {{ form_error_class('firstname', $errors) }}">
                                    <label for="firstname">Firstname</label>
                                    <div class="input-group">
                                        <input type="text" name="fname" class="form-control" placeholder="Firstname" value="{{ old('fname') }}">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                    {!! form_error_message('firstname', $errors) !!}
                                </div>
                            </div>

                            <div class="col col-6">
                                <div class="form-group {{ form_error_class('lastname', $errors) }}">
                                    <label for="email">Lastname</label>
                                    <div class="input-group">
                                        <input type="text" name="lname" class="form-control" placeholder="Lastname" value="{{ old('lname') }}">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                    {!! form_error_message('lastname', $errors) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group {{ form_error_class('Age', $errors) }}">
                                    <label for="age">Age</label>
                                    <div class="input-group">
                                        <input id="age" type="number" class="form-control" name="age" placeholder="Age" value="{{ old('age') }}">
                                        <span id="age" class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    {!! form_error_message('age', $errors) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ form_error_class('cellno', $errors) }}">
                                    <label for="cellno">Cellphone Number</label>
                                    <div class="input-group">
                                        <input id="cellno" type="number" class="form-control" name="cellno" placeholder="Ex. 09xxxxxxxxx" value="{{ old('cellno') }}">
                                        <span id="cellno" class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                    {!! form_error_message('cellno', $errors) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{ form_error_class('noofchild', $errors) }}">
                                    <label for="noofchild">No. of Children</label>
                                    <div class="input-group">
                                        <input id="noofchild" type="number" class="form-control" name="noofchild" placeholder="Number of Children" value="{{ old('noofchild') }}">
                                        <span id="noofchild" class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                    {!! form_error_message('noofchild', $errors) !!}
                                </div>
                            </div>
                            <div class="col col-3">
                                <section class="form-group {{ form_error_class('civilstatus', $errors) }}">
                                    <label for="civilstatus">Civil Status</label>
                                    <div class="well-sm-3">
                                        <select class="form-control selectpicker"  role="combobox" id="civilstatus" name="civilstatus" value="{{ old('civilstatus') }}" title="Choose Status">
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                        </select>
                                    </div>
                                    {!! form_error_message('civilstatus', $errors) !!}
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-3">
                                <section class="form-group {{ form_error_class('sex', $errors) }}">
                                    <label for="email">Sex</label>
                                    <div class="well-sm-3">
                                        <select class="form-control selectpicker" role="combobox" id="sex" name="sex" placeholder="Select Sex" value="{{ old('sex') }}">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    {!! form_error_message('sex', $errors) !!}
                                </section>
                            </div>
                            <div class="col col-3">
                                <section class="form-group {{ form_error_class('ethnicorigin', $errors) }}">
                                    <label for="ethnic">Ethnic Origin</label>
                                    <div class="well-sm-3">
                                        <select class="form-control selectpicker" role="combobox" id="ethnicorigin" name="ethnicorigin" title="Select Ethnic Origin" data-show-subtext="true" data-live-search="true" value="{{ old('ethnicorigin') }}">
                                            <option value="Cebuano">Cebuano</option>
                                            <option value="Subanen">Subanen</option>
                                            <option value="B’laan">B’laan</option>
                                            <option value="Mandaya">Mandaya</option>
                                            <option value="Higaonon">Higaonon</option>
                                            <option value="Talaandig">Talaandig</option>
                                            <option value="Manobo">Manobo</option>
                                            <option value="T’boli">T’boli</option>
                                            <option value="Tiruray">Tiruray</option>
                                            <option value="Bagobo">Bagobo</option>
                                            <option value="Tagakaolo">Tagakaolo</option>
                                            <option value="Dibabawon">Dibabawon</option>
                                            <option value="Manguangan">Manguangan</option>
                                            <option value="Mansaka">Mansaka</option>
                                        </select>
                                    </div>
                                    {!! form_error_message('ethnicorigin', $errors) !!}
                                </section>
                            </div>
                            <div class="col col-3">
                                <section class="form-group {{ form_error_class('religion', $errors) }}">
                                    <label for="ethnic">Religion</label>
                                    <div class="well-sm-3">
                                        <select class="form-control selectpicker" role="combobox" id="religion" name="religion" placeholder="Select Religion" data-show-subtext="true" data-live-search="true" value="{{ old('religion') }}">
                                            <option value="SDA">SDA</option>
                                            <option value="Roman Catholic">Roman Catholic</option>
                                            <option value="Baptist">Baptist</option>
                                            <option value="Penticostal">Penticostal</option>
                                            <option value="UCP">UCP</option>
                                            <option value="Born Again">Born Again</option>
                                            <option value="INC">INC</option>
                                            <option value="Iglesia sa Dios">Iglesia sa Dios</option>
                                            <option value="Filipinista">Filipinista</option>
                                            <option value="Saksi ni Jehovah">Saksi ni Jehovah</option>
                                        </select>
                                    </div>
                                    {!! form_error_message('religion', $errors) !!}
                                </section>
                            </div>
                            <div class="col col-3">
                                <section class="form-group {{ form_error_class('hea', $errors) }}">
                                    <label for="hea">Highest Educational Attainment</label>
                                    <div class="well-sm-3">
                                        <select class="form-control selectpicker" role="combobox" id="hea" name="hea" placeholder="Select Highest Educational Attainment" data-show-subtext="true" data-live-search="true" value="{{ old('hea') }}">
                                            <option value="Elementary">Elementary</option>
                                            <option value="High School">High School</option>
                                            <option value="College">College</option>
                                            <option value="NCII">NCII</option>
                                            <option value="NCIII">NCIII</option>
                                            <option value="Vocational">Vocational</option>
                                        </select>
                                    </div>
                                    {!! form_error_message('hea', $errors) !!}
                                </section>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{ form_error_class('occupation', $errors) }}">
                                    <label for="occupation">Occupation</label>
                                    <div class="input-group">
                                        <input id="occupation" type="text" class="form-control" name="occupation" placeholder="Occupation" value="{{ old('occupation') }}">
                                        <span id="occupation" class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    </div>
                                    {!! form_error_message('occupation', $errors) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group {{ form_error_class('address', $errors) }}">
                                    <label>Address</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{  old('address') }}">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    </div>
                                    {!! form_error_message('address', $errors) !!}
                                </div>
                            </div>
                        </div>
                        
                    </fieldset>

                    @include('admin.partials.form_footer')
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
        $("#born_at").datetimepicker({
            maxDate: new Date(),
            viewMode: 'days',
            format: 'YYYY-MM-DD'
        });
    })
</script>
@endsection