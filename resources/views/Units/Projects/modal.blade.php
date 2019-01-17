{!!Form::open(['action' => ['ProjectsController@saveobj'], 'method'=>'POST'])!!}
{{Form::token()}}
<div class="modal fade" id="myModal" role="dialog" style="height:720px">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="well well-sm well-toolbar">
                    <table id="table" data-server="false" data-page-length="10" class=" table nowrap table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Objective Name</th>
                                <th class="text-center"><i class="fa fa-fw fa-book text-muted"></i>Status</th>
                                <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objectives as $object => $key)
                                @php($i=1)
                                @if($project->id == $object->id)
                                    <tr>
                                        <td class="text-uppercase hidden"><input type="text" name="id[]" value="{{ $key->id }}"></td>
                                        <td class="text-uppercase"><strong>{{ $key->objective }}</td>
                                        <td class="text-uppercase text-center"><strong>{{ $objective->status }}</td>
                                        <td>
                                            <div class="btn-toolbar">
                                                @if(isset($objective->id))
                                                    <div class="row">
                                                        <div class="form-group col-sm-12">
                                                            <select class="form-control" name="editobj[]" id="editobj">
                                                                <option class="hidden" value="{{$objective->status}}"></option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Completed">Completed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>ajsndakjsdnksajn</td>
                                </tr>
                                @php($i++)
                            @endforeach
                        </tbody>
                    </table> 
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{Form::submit('Save Changes', ['class'=>'btn btn-success'])}}
            </div>
      </div>
    </div>
</div>
{!!Form::close()!!}