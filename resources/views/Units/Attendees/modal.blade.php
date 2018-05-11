{!!Form::open(['action' => 'AttendeesController@store', 'method'=>'POST'])!!}
{{Form::token()}}
<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Trainee</h4>
            <input name="training_id" for="training_id" class="hidden" value="{{$train->id}}"></input>
            <input name="project_id" for="project_id" class="hidden" value="{{$project->id}}"></input>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div class="well well-sm well-toolbar">
                    <select id="attendee" name="attendee" class="selectpicker form-control" data-show-subtext="true" data-live-search="true" onchange="toTable(this.id)">
                        @foreach($attendees as $attendee)
                            {{-- {!!Form::select('attendee[]',$attendee,null, ['class' => 'selectpicker', 'multiple', 'data-show-subtext'=>'true','data-live-search'=>'true', 'placeholder'=>'Select Trainee'])!!} --}}
                            <option value={{$attendee->id}}>{{$attendee->fname.' '. $attendee->lname}}</option>
                        @endforeach
                    </select>
                </div>  
    
            <!-- Modal footer -->
            <div class="modal-footer">
                <label for="?" class="pull-left">Can't find Trainee?&nbsp;</label>
                <a href="/attendees/create" class="pull-left" >{{__('Add New Trainee here')}}</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{Form::submit('Add', ['class'=>'btn btn-success'])}}
            </div>
      </div>
    </div>
</div>
{!!Form::close()!!}