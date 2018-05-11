{{-- confirm modal --}}
@if(isset($user->id))
    {!!Form::open(['action' => ['UserController@destroy', $user->id], 'method'=>'POST'])!!}
    {{Form::hidden('_method', 'DELETE')}}
        <div class="modal fade" id="modal-confirm" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header alert-danger">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Are you sure?</h4>
                    </div>
                    <div class="modal-body">
                        <p></p> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        {{Form::submit('Yes', ['class'=>'btn btn-info'])}}
                    </div>
                </div>
            </div>
        </div>
    {!!Form::close()!!}
@endif

{{-- notifications --}}
<div class="modal fade" id="modal-notifications" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header alert-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Notifications</h4>
            </div>
            <div class="modal-body">
                <table id="tbl-notifications" class="table table-striped table-bordered" width="100%">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Read</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="3" class="text-center">There are currently no notices</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>