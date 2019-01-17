{!!Form::open(['action' => 'GalleryController@savephoto', 'method'=>'POST', 'enctype' => 'multipart/form-data'])!!}
{{Form::token()}}
<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-blue-active">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Photos to {{$category->category}} album</h4>
            <input name="cat_id" for="cat_id" class="hidden" value="{{$category->id}}"></input>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Photo Name</label>
                        <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required>
                        {!! form_error_message('name', $errors) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="desc">Description</label>
                        {{Form::textarea('body','', ['id'=>'article-ckeditor','name'=>'description','class'=>'form-control', 'placeholder'=>'Body Text'])}}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        {{-- <label for="file">Upload Photo</label>
                        {{form::file('image', ['class'=>'btn btn-sm btn-outline-info'])}} --}}
                        <section class="form-group {{ form_error_class('image', $errors) }}">
                            <label>Upload Photo (250 x 250)</label>
                            <div class="input-group input-group-sm">
                                <input id="photo-label" type="text" class="form-control" readonly placeholder="Browse for an image">
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-ebony-clay text-white" onclick="document.getElementById('image').click();">Browse</button>
                            </span>
                                <input id="image" style="display: none" accept="{{ get_file_extensions('image') }}" type="file" name="image" onchange="document.getElementById('photo-label').value = this.value">
                            </div>
                            {!! form_error_message('image', $errors) !!}
                        </section>
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