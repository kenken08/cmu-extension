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
                <div class="row">
                    <div class="col-md-6">
                        <label for="file">Upload Photo</label>
                        {{form::file('image', ['class'=>'btn btn-sm btn-outline-info'])}}
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