<form action="{{route('ann-add')}}" method="POST" enctype="multipart/form-data"> @csrf
    <div class="modal fade" id="myModalAnn" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-blue-active">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-plus"></i> Create Announcement</h4>
                </div>
    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Announcement Title</label>
                            <input class="form-control" type="text" name="atitle" id="atitle" placeholder="Announcement Title" value="" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Starts At</label>
                            <input class="form-control" type="text" name="starts_at" id="starts_at" placeholder="Starts At" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name">Expires At</label>
                            <input class="form-control" type="text" name="expires_at" id="expires_at" placeholder="Expires At" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="form-group {{ form_error_class('cover_photo', $errors) }}"><br>
                                <label>Cover Photo (720 x 300)</label>
                                <div class="input-group input-group-sm">
                                    <input id="photo-label" type="text" class="form-control" readonly placeholder="Browse for an image">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-default" onclick="document.getElementById('ann_photo').click();">Browse</button>
                                </span>
                                    <input required id="ann_photo" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="ann_photo" onchange="document.getElementById('photo-label').value = this.value">
                                </div>
                                {!! form_error_message('ann_photo', $errors) !!}
                            </section>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="desc">Description</label>
                            <textarea name="adesc" id="adesc" cols="91" rows="10" style="resize:none"></textarea>
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