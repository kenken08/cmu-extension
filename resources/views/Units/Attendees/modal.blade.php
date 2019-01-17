{!!Form::open(['action' => 'AttendeesController@store', 'method'=>'POST'])!!}
{{Form::token()}}
<!-- The Modal -->
<div class="modal fade" id="myModalatt" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Trainee(s)</h4>
                <input name="training_id" for="training_id" class="hidden" value="{{$train->id}}"></input>
                <input name="project_id" for="project_id" class="hidden" value="{{$project->id}}"></input>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                {{-- <div class="well well-sm well-toolbar">
                    <select id="attendee" name="attendee[]" class="selectpicker form-control" multiple="multiple" data-live-search="true"> --}}
                        <?php
                            // $det = DB::table('trainingsdetails');
                            // foreach($attendees as $attendee){
                            //     echo '<option class="text-black" value="'.$attendee->id.'">'.$attendee->fname.' '.$attendee->lname.'</option>';
                            // }
                            // foreach($users as $user){
                            //     echo '<option class="text-black" value="'.$user->id.'">'.$user->firstname.' '.$user->lastname.'</option>';
                            // }
                        ?>
                    {{-- </select>
                </div> --}}

                {{-- List-BOX --}}
                <table id="tbl-listed-attendee" data-server="false" data-page-length="10" class="dt-table table nowrap table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center"><i class="fa fa-fw fa-user-circle text-muted"></i>Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendees as $attendee)
                                <tr>
                                    <td class="text-uppercase"><h5>{{$attendee->fname.' '.$attendee->lname}}</h5></td>
                                    <td class="text-center">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="attendee[]" id="filter" value="{{$attendee->id}}">
                                            <div class="slide round">Select</div>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-uppercase"><h5>{{$user->firstname.' '.$user->lastname}}</h5></td>
                                    <td class="text-center">
                                        <label class="switchBtn">
                                            <input type="checkbox" name="attendee[]" id="filter" value="{{$user->id}}">
                                            <div class="slide round">Select</div>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                {{-- End of List-BOX --}}
    
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