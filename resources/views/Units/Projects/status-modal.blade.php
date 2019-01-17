<form id="submit{{$project->id}}" action="{{route('update-status')}}" method="post"> @csrf
{{-- {{Form::open(['action'=>['ProjectsController@updatestatus',$project->id],'method'=>'POST'])}}
{{ csrf_field() }} --}}
    <div class="modal fade" id="stat{{$project->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="fa fa-star"></i> Status</h4>
                </div>
                <div class="modal-body">
                    <div class="callout callout-info callout-help">
                        <p>You can leave the On the process status for the mean time. Update if needed.</p>
                    </div>
                    <input type="text" name="pid" id="pid" value="{{$project->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Start Date:</label>
                            <select name="start_status[]" id="start_status[]{{$project->id}}" class="form-control">
                                <option value="{{($project->start_status == null)? '' : $project->start_status}}">Choose Option</option>
                                <option value="ontime">On-Time</option>
                                <option value="delayed">Delayed</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">On The Process Status:</label>
                            <select name="on_the_process_status[]" id="on_the_process_status[]{{$project->id}}" class="form-control">
                                <option value="{{($project->otp_status == null)? '' : $project->otp_status}}">Choose Option</option>
                                <option value="ongoing">On-Going</option>
                                <option value="finished">Ended On-Time</option>
                                <option value="extended">Extended</option>
                                <option value="ended">Ended but Delayed</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" onclick="document.getElementById('submit{{$project->id}}').submit()">Save</button>
                </div>
            </div>
        </div>
    </div>
{{-- {{Form::close()}} --}}
</form>