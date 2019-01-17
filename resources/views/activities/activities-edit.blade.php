@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-12 text-right">
        <i class="fa fw fa-home"><span>Dashboard</span> / <span>Projects</span> / <span>Activities / {{$title}}</span></i>
    </div><hr>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary box-solid">
            <div class="box-header ">
                <h3 class="box-title">
                    <span><i class="fa fa-edit"></i></span>
                    <span>Edit {{$activity->activity_title}}</span>
                </h3>
            </div>
            <form id="update_act" action="{{route('update_act',$project->id)}}" method="POST" enctype="multipart/form-data"> @csrf
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Activity Title</label>
                            <input class="form-control" type="text" name="title" id="title" placeholder="Announcement Title" value="{{$activity->activity_title}}" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Date of Activity</label>
                            <input class="form-control" type="text" name="date_of_activity" id="date_of_activity" placeholder="Date of Activity" value="{{$activity->date_of_activity}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Icon</label>
                            <select name="icon" id="icon" class="form-control" required>
                                <option value="{{$activity->icon}}">Select Icon</option>
                                <option value="fa-star">Star</option>
                                <option value="fa-photo">Photo</option>
                                <option value="fa-film">Film</option>
                                <option value="fa-file">File</option>
                                <option value="fa-tasks">Tasks</option>
                                <option value="fa-envelope">Envelope</option>
                                <option value="fa-tags">Tags</option>
                                <option value="fa-bookmark">Bookmark</option>
                                <option value="fa-book">Book</option>
                                <option value="fa-leaf">Leaf</option>
                                <option value="fa-fire">Fire</option>
                                <option value="fa-comment">Message</option>
                                <option value="fa-calendar">Calendar</option>
                                <option value="fa-thumbs-up-o">Like</option>
                                <option value="fa-trophy">Trophy</option>
                                <option value="fa-bullhorn">Bullhorn</option>
                                <option value="fa-certificate">Certificate</option>
                                <option value="fa-cutlery">Cutlery</option>
                                <option value="fa-coffee">Coffee</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <section class="form-group {{ form_error_class('cover_photo', $errors) }}"><br>
                                <label>Cover Photo (250 x 250)</label>
                                <div class="input-group input-group-sm">
                                    <input id="photo-label" type="text" class="form-control" readonly placeholder="Browse for an image">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('cover_photo').click();">Browse</button>
                                </span>
                                    <input id="cover_photo" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="cover_photo" required onchange="document.getElementById('photo-label').value = this.value">
                                </div>
                                {!! form_error_message('cover_photo', $errors) !!}
                            </section>
                        </div>
                        <div class="col-md-12">
                            <img width="570px" height="200px" src="/storage/cover_photo/{{$activity->cover_photo}}" alt="">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="desc">Description</label>
                            <textarea class="form-control summernote" id="article-content" name="actdesc" rows="10" style="resize:none">{!! $activity->description !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right" onclick="document.getElementById('update_act').submit()">Save Changes</button>
                    <button type="button" class="btn btn-default pull-right">Back</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script type="text/javascript" charset="utf-8">
    $(function ()
    {
        initSummerNote('.summernote');
        $('#form-edit').on('submit', function ()
        {
            $('#article-content').html($('.summernote').val());
            return true;
        });
    })
</script>
<script type="text/javascript" charset="utf-8">
    $(function ()
    {
        $("#date_of_activity").datetimepicker({
            viewMode: 'days',
            format: 'YYYY-MM-DD'
        });
    })
</script>
@endsection