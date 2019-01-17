{!!Form::open(['action' => ['SummaryController@searchproj'], 'method'=>'POST'])!!}
{{Form::token()}}
<!-- The Modal -->
<div class="modal fade" id="myModaleval" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-ebonyclay">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-white">Select Project</h4>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div class="well well-sm well-toolbar">
                    <select id="proj_id" name="proj_id" class="selectpicker form-control" data-show-subtext="true" data-live-search="true">
                        <option value="Select project...">Select project...</option>
                        @foreach($proj as $pro)
                            <option value={{ $pro->id }}>{{ $pro->project_name }}</option>
                        @endforeach
                    </select>
                </div>  
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
            </div>
      </div>
    </div>
</div>
{!!Form::close()!!}