<form action="{{route('participate',(isset($item->id)? $item->id:$result->id))}}" method="POST" enctype="multipart/form-data"> @csrf
    <div class="modal fade" id="myModalPart{{(isset($item->id))? $item->id:$result->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-blue-active">
                    {{-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button> --}}
                    <h4 class="modal-title">Training Details</h4>
                </div>
    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <figure>
                                <img width="460px" height="150px" src="/storage/training_image/{{(isset($item->training_image)? $item->training_image: $result->training_image)}}">
                            </figure>  
                        </div>
                        <div class="col-md-12">
                            @if($item->status == 'conducted')
                                <h5>Status: <span class="btn btn-sm btn-success">{{ ucwords($item->status) }}</span></h5>
                            @elseif($item->status == 'postponed')
                            <h5>Status: <span class="btn btn-sm btn-danger">{{ ucwords($item->status) }}</span></h5>
                            @else
                                <h5>Status: <span class="btn btn-sm btn-info">On the Process</span></h5>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <label for="">Training Title:</label>
                            <h5>{{(isset($item->training_name)? $item->training_name:$result->training_name)}}</h5>
                        </div>
                        <div class="col-md-12">
                            <label for="">Training Description:</label>
                            <h5>{{(isset($item->description))? $item->description : $result->description}}</h5>
                        </div>
                        <div class="col-md-12">
                            <label for="">Venue:</label>
                            <h5>{{(isset($item->venue))?$item->venue:$result->venue}}</h5>
                        </div>
                        <div class="col-md-12">
                            Date of Event: {{date('F d, Y',strtotime($item->fdate_conducted))}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    @if(Auth::check())
                        @if(Request::url() == url('/') || $item->status == 'postponed')
                            <button type="submit" class="btn btn-md btn-success">Participate</button>
                        @endif
                    @else
                        <a href="/login" class="btn btn-outline-success btn-sm">Login</a> to Participate to this event
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>