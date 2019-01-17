{{-- confirm modal --}}
{{-- @if(isset($user->id))
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
@endif --}}

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
                        <th class="text-center"><i class="fa fa-fw fa-user text-muted"></i></th>
                        <th class="text-center" style="min-width:100px"><i class="fa fa-fw fa-user text-muted"></i>Name</th>
                        <th class="text-center" style="min-width:200px"><i class="fa fa-fw fa-location-arrow text-muted"></i>Message</th>
                        <th class="text-center"><i class="fa fa-fw fa-calendar text-muted"></i>Details</th>
                        <th class="text-center"><i class="fa fa-fw fa-edit text-muted"></i>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                       @if(isset($messages))
                        @foreach ($messages as $mess)
                                <tr>
                                    <td class="text-center"><img class="img img-circle" src="/storage/profile_images/{{$mess->profile_image}}" style="width:30px;height:30px;"></td>
                                    <td class="text-center">{{$mess->firstname.' '.$mess->lastname}}</td>
                                    <td>{{ $mess->message }}</td>
                                    <td class="text-center">{{(date('F d, Y', strtotime($mess->date)))}}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-message"></i><span>Reply</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                       @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>