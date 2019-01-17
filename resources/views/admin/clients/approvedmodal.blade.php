{!!Form::open(['id'=>'form-approved','action' => ['UserController@confirmation',$user->id], 'method'=>'POST'])!!}
{!! csrf_field() !!}
    <div class="modal fade" id="myModalApproved{{$user->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-ebonyclay">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-white">Registration Confirmation</h4>
                </div>
                <div class="modal-body">
                    <h4><strong>Confirm registration</strong> of user {{$user->firstname.' '.$user->lastname}}?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-info" onclick="document.getElementById('form-approved').submit()">Yes</button>
                    {{-- <input class="hidden" type="text" id="uid" name="uid" value="{{$user->id}}"> --}}
                </div>
            </div>
        </div>
    </div>
{!! Form::close() !!}