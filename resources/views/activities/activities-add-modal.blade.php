<form action="{{route('add_act',$project->id)}}" method="POST" enctype="multipart/form-data"> @csrf
    <div class="modal fade" id="myModalAct" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-blue-active">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Activity</h4>
                </div>
    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Activity Title</label>
                            <input class="form-control" type="text" name="atitle" id="atitle" placeholder="Announcement Title" value="" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Date of Activity</label>
                            <input class="form-control" type="text" name="date_of_activity" id="date_of_activity" placeholder="Date of Activity" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Icon</label>
                            <select name="icon" id="icon" class="form-control" required>
                                <option value="">Select Icon</option>
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
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="desc">Description</label>
                            <textarea class="form-control summernote" id="article-content" name="actdesc" rows="10" style="resize:none"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                </div>
            </div>
        </div>
    </div>
</form>