{!!Form::open(['id'=>'form-submit','action' => 'HomeController@delete', 'method'=>'POST'])!!}
{{Form::hidden('_method', 'DELETE')}}
    <div class="modal fade" id="myModal{{$user->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header alert-danger">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete</h4>
                </div>
                <div class="modal-body">
                    <h5>Are you sure you want to <strong>DELETE</strong> user {{$user->firstname.' '.$user->lastname}}?</h5> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-info">Yes</button>
                    <input class="hidden" type="text" id="uid" name="uid" value="{{$user->id}}">
                </div>
            </div>
        </div>
    </div>
{!!Form::close()!!}