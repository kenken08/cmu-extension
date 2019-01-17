<form action="{{ route('reply-comment',$comm->cid) }}" method="POST"> @csrf
    <div class="modal text-left fade" id="myModalrep{{$comm->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-blue-active">
                    <h4 class="modal-title"><i class="fa fa-comment"></i> Reply</h4>
                </div>
    
                <div class="modal-body">
                    <div class="row">
                        <input class="hidden" type="text" name="commid" id="commid" value="{{$comm->cid}}">
                        <div class="col-md-12">
                            <label for="">To: {{$comm->firstname.' '.$comm->lastname}}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea required name="reply" id="reply" cols="63" rows="3" placeholder="Enter your reply here" style="resize:none;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{Form::submit('Send', ['class'=>'btn btn-success'])}}
                </div>
            </div>
        </div>
    </div>
</form>