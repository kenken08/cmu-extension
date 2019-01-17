{!!Form::open(['action' => 'GalleryController@store', 'method'=>'POST', 'enctype'=>'multipart/form-data'])!!}
{{Form::token()}}
<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-blue-active">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Category</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="category">Category Name</label>
                        <input class="form-control" type="text" name="category" id="category" placeholder="Category Name" value="{{ old('category') }}" required>
                        {!! form_error_message('category', $errors) !!}
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <label>Cover Photo (720 x 300)</label>
                        <div class="input-group input-group-sm">
                            <input id="photo-label" type="text" class="form-control" readonly placeholder="Browse for an image">
                            <span class="input-group-btn">
                            <button type="button" class="btn btn-default" onclick="document.getElementById('gal_photo').click();">Browse</button>
                        </span>
                            <input required id="gal_photo" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="gal_photo" onchange="document.getElementById('photo-label').value = this.value">
                        </div>
                        {!! form_error_message('gal_photo', $errors) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="desc">Description</label>
                        <textarea name="desc" id="desc" cols="91" rows="10" style="resize:none"></textarea>
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
{!!Form::close()!!}