{!!Form::open(['action' => 'RequestTrainingsController@setDate', 'method'=>'POST'])!!}
{{Form::token()}}
<!-- The Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <input id="dateid" name="dateid" type="text" class="hidden" value="">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-blue-active">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Set Date</h4>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div class="well well-sm well-toolbar">
                    <label for="date_conducted">From Date</label>
                    <div class="input-group">
                        <input id="setfDate" type="text" class="form-control" name="setfDate" placeholder="Select Date" value="{{ ($errors->any()? old('setfDate') : '' )}}" required>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                    {!! form_error_message('setfDate', $errors) !!}
                    <label for="date_conducted">To Date</label>
                    <div class="input-group">
                        <input id="settDate" type="text" class="form-control" name="settDate" placeholder="Select Date" value="{{ ($errors->any()? old('settDate') : '' )}}" required>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div>
                    {!! form_error_message('settDate', $errors) !!}
                </div>  
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{Form::submit('Add', ['class'=>'btn btn-success'])}}
            </div>
      </div>
    </div>
</div>
{!!Form::close()!!}