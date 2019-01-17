@extends('layouts.admin')

@section('content')
    @if(Auth::user()->admin =='1')
        <div class="row mt-5">
            <div class="col-sm-12 text-right">
                <i class="fa fw fa-home"><span>Dashboard</span></i>
            </div>
            <div class="col-sm-12">
                <h1 class="page-header">
                    Hi {{auth()->user()->firstname.' ' .auth()->user()->lastname}} what would you like to do?
                </h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @include('admin.analytics.partials.analytics_header')
                </div>
            </div>  
        </div>
        <div class="modal fade" id="train_name">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-blue-active">
                        <h4 id="eventTitle" class="modal-title">Training Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <figure>
                                    <img id="tp" src="" width="570px" height="150px">
                                </figure>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Status: <input style="border:none" type="text" id="status"></label>
                            </div>
                            <div class="col-md-12">
                                <label for="">Training Title:</label>
                                <input type="text" class="form-control" name="ttitle" id="ttitle" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description:</label><br>
                                <textarea style="resize:none" name="desc" id="desc" cols="91" rows="3" readonly></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Venue:</label>
                                <input type="text" class="form-control" name="venue" id="venue" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Date:</label>
                                <input type="text" class="form-control" name="starts_at" id="starts_at" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a id="tlink" href="" class="btn btn-info">View More</a>
                    </div>
                </div>
            </div>
        </div>
    @elseif(Auth::user()->admin == '2')
        <div class="row mt-5">
            <div class="col-sm-12 text-right">
                <i class="fa fw fa-home"><span>Dashboard</span></i>
            </div>
            <div class="col-sm-12">
                <h1 class="page-header">
                    Hi {{auth()->user()->firstname.' ' .auth()->user()->lastname}} what would you like to do?
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-warning">
                            <div class="box-header">
                                <i class="fa fa-fw fa-bell">Notifications</i>
                            </div>
                            <div class="card-body">
                                <ul class="breadcrumb">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <a href="/home/requests">REQUESTS</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="/home/requests" class="text-right btn btn-xs bg-blue-active" style="width:50px; margin-right:190px">{{count($requests)}}</a>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <a href="/home/projects">PROJECTS</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="/home/projects" class="text-right btn btn-xs bg-purple-active" style="width:50px; margin-right:190px">{{$projects}}</a>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <a href="/home/messages">MESSAGES</a>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="/home/projects" class="text-right btn btn-xs bg-purple-active" style="width:50px; margin-right:190px">{{count(\App\Requestdetails::where('status',0)->get())}}</a>
                                            </div>
                                        </div>
                                    </li>       
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                {{-- <div class="box box-danger">
                    <div class="box-body">
                        <div class="box-header ">
                            <h3 class="box-title">
                                <span><i class="fa fa-book"></i></span>
                                <span>Upcoming Trainings</span>
                            </h3>
                            <div class="box-body">
                                <table id="tbl-list" data-server="false" data-page-length="10" class="table dt-table" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width:180px"><i class="fa fa-fw fa-calendar text-muted"></i>Date</th>
                                            <th><i class="fa fa-fw fa-book text-muted"></i>Training Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trainings as $event)
                                            @if($event->tdate_conducted>date_format(NOW(), 'Y-m-d'))    
                                                <tr>
                                                    <td>
                                                        <a class="box-icon3 text-black" style="width:150px; margin-top:2px">
                                                            @if($event->fdate_conducted == null)
                                                                <div class="card"><strong style="margin-top:-80px;"><i class="fa fa-fw fa-calendar"></i>Not Set</strong></div>
                                                            @else
                                                                <div class="card"><strong style="margin-top:-80px;"><i class="fa fa-fw fa-calendar"></i>{{date('M d, Y',strtotime($event->fdate_conducted))}}</strong></div>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="text-uppercase">
                                                        <h4>{{$event->training_name}}</h4>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">
                           <i class="fa fa-tasks"></i> Upcoming Trainings
                        </h3>
                    </div>
                    <div class="box-body">
                        <div id="calendar"></div>
                    </div>
                </div>
                <div class="modal fade" id="train_name">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-blue-active">
                                <h4 id="eventTitle" class="modal-title">Training Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <figure>
                                            <img id="tp" src="" width="570px" height="150px">
                                        </figure>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Status: <input style="border:none" type="text" id="status"></label>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Training Title:</label>
                                        <input type="text" class="form-control" name="ttitle" id="ttitle" readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description:</label><br>
                                        <textarea style="resize:none" name="desc" id="desc" cols="91" rows="3" readonly></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Venue:</label>
                                        <input type="text" class="form-control" name="venue" id="venue" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Date:</label>
                                        <input type="text" class="form-control" name="starts_at" id="starts_at" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a id="tlink" href="" class="btn btn-info">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

      $('#calendar').fullCalendar({
        defaultView: 'month',
        height: 430,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        eventClick: function(event, element) {
            // Display the modal and set the values to the event values.
            $('#train_name').modal('show');
            $('#train_name').find('#ttitle').val(event.title);
            $('#train_name').find('#venue').val(event.venue);
            $('#train_name').find('#status').val(event.status);
            $('#train_name').find('#starts_at').val(event.start);
            $('#train_name').find('#ends_at').val(event.end);
            $('#train_name').find('#desc').text(event.desc);
            $('#train_name').find('#tlink').attr("href", event.link);
            $('#train_name').find('#tp').attr("src", event.image);
        },
        events: [
            @foreach($trainings as $event)
                {
                    title: '{{$event->training_name}}',
                    venue: '{{$event->venue}}',
                    desc: '{{$event->description}}',
                    status: '{{($event->status == null)? "On The Process" : ucwords($event->status)}}',
                    link: '{{ url("/home/projects/$event->proj_id/trainings") }}',
                    image: 'storage/training_image/{{$event->training_image}}',
                    allDay: true,
                    start: new Date('{{ $event->fdate_conducted }}').toDateString("Y-m-d"),
                    end: new Date('{{ $event->tdate_conducted }}').toDateString("Y-m-d"),
                    url: '#train_name{{$event->id}}',
                },
            @endforeach
        ]
      });
    });
</script>
@endsection
