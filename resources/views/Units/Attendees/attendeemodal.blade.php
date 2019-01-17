<!-- The Modal -->
<div class="modal fade" id="myModalAttendee{{$attendee->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Participant Profile</h4>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <img src="/storage/profile_images/noimage.png" alt="" class="img img-rounded" width="170px" height="170px">
                            </div>
                            <div class="col-md-8">
                                <h4>Name&emsp;&emsp;&emsp;&emsp;: {{$attendee->fname.' '.$attendee->lname}}</h4><hr>
                                <h4>Age&emsp;&emsp;&emsp;&emsp;&emsp;: {{$attendee->age}}</h4><hr>
                                <h4>Cellphone #&emsp;&nbsp;&nbsp;: {{$attendee->cellno}}</h4><hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="row"><hr>
                            <div class="col-md-4">
                                <h4>Sex: {{$attendee->sex}}</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>Civi Status: {{$attendee->civilstatus}}</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>Ethnic Origin: {{$attendee->ethnicorigin}}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="row"><hr>
                            <div class="col-md-4">
                                <h4>Religion: {{$attendee->religion}}</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>No of Child: {{$attendee->noofchild}}</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>HEA: {{$attendee->hea}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
      </div>
    </div>
</div>