{!!Form::open(['action' => 'GalleryController@store', 'method'=>'POST'])!!}
{{Form::token()}}
<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-blue-active">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Category</h4>
            <input name="training_id" for="training_id" class="hidden" value=""></input>
            <input name="project_id" for="project_id" class="hidden" value=""></input>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <label for="category">Category Name</label>
                        <input class="form-control" type="text" name="category" id="category" placeholder="Category Name" value="{{ old('category') }}" required>
                        {!! form_error_message('category', $errors) !!}
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <label for="desc">Description</label>
                        {{Form::textarea('body','', ['id'=>'article-ckeditor','name'=>'desc','class'=>'form-control', 'placeholder'=>'Body Text'])}}
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