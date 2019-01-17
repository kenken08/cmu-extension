
{!! Form::open(['id'=>'addresource-form','action'=>['SummaryController@addTopics',$training->id],'method'=>'POST']) !!} 
{!! csrf_field()!!}
<div class="modal fade" id="addResource{{$training->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-blue-active">
                {{-- <input class="hidden" type="text" name="train_id" id="train_id" value="{{$training->id}}"> --}}
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Add Resource Person to {{$training->training_name}}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Resource Person Name</label>
                        <input class="form-control" type="text" name="addresource" placeholder="Resource Person Name" value="">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Topic</label>
                        <input class="form-control" type="text" name="addtopic" placeholder="Topic" value="">
                    </div>
                </div><hr>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5 text-left">
                            <label for=""><i class="fa fa-user-circle"></i> Resource Person</label>
                        </div>
                        <div class="col-md-7 text-left">
                            <label for=""><i class="fa fa-list"></i> Topic</label>
                        </div>
                    </div>
                </div><hr>
                <div class="col-md-12">
                    @foreach($resource->where('train_id',$training->id) as $r)
                        <div class="row">
                            <div class="col-md-5 text-left">
                                <label for="">{{$r->resource_name}}</label>
                            </div>
                            <div class="col-md-7 text-left">
                                <label for="">{{$r->topic}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" onclick="document.getElementById('addresource-form').submit();">Submit</button>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
