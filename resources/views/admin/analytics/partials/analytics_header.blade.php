<style>
    .small-box h3, .small-box p {
        z-index: 9999999999;
    }

    .small-charts {
        width: 120px !important;
        height: 85px;
    }

    .small-box .icon-chart {
        position: absolute;
        top: 8px;
        right: 0px;
        z-index: 0;
    }
</style>

<div class="row">
    <div class="col-md-11">
        <div class="row">
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <a href="/home/projects"><label for="count"><h1 style="cursor:pointer">{{$projects}}</h1></label></a>
                        <p class="text-black">Projects</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <a href="/home/users"><label for="count"><h1 style="cursor:pointer">{{$users}}</h1></label></a>
                        <p class="text-black">Pending Users</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-circle"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="small-box bg-info">
                    <div class="inner">
                        <a href="/home/users"><label for="count"><h1 style="cursor:pointer">{{$users}}</h1></label></a>
                        <p class="text-black">New Comments</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="box box-success">
            <div class="box-header bg-ebonyclay">
                <h3 class=" text-white box-title">
                    <span><i class="fa fa-pie-chart"></i> Projects</span>
                </h3>
            </div>
            <div class="box-body">
                <canvas id="chart-area" width="900" height="500"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header bg-ebonyclay">
                <h3 class=" text-white box-title">
                    <span><i class="fa fa-tasks"></i> Upcoming Trainings</span>
                </h3>
            </div>
            <div class="box-body">
                <div id="calendar-admin"></div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    var cbu = function() {
            return parseInt({{count($pcdetails->where('college_id',10))}});
        };
    var icu = function() {
        return parseInt({{count($pcdetails->where('college_id',11))}});
    };
    var tdsu = function() {
            return parseInt({{count($pcdetails->where('college_id',12))}});
        };
    var config = {
        type: 'doughnut',
        data: {
            datasets: [{
                data: [
                    cbu(),
                    icu(),
                    tdsu(),
                ],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                ],
                label: 'Dataset: Projects'
            }],
            labels: [
                'CBU'+' = '+ parseInt({{count($pcdetails->where('college_id',10))}}),
                'ICU'+' = ' + parseInt({{count($pcdetails->where('college_id',11))}}),
                'TDSU'+' = ' + parseInt({{count($pcdetails->where('college_id',12))}}),
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Projects per Unit'
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        }
    };
</script>
<script>
    window.onload = function() {
        var ct = document.getElementById('chart-area').getContext('2d');
        window.myManus = new Chart(ct, config);
    };
</script>
<script>
    $(document).ready(function() {
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();

      $('#calendar-admin').fullCalendar({
        defaultView: 'month',
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
            $('#train_name').find('#starts_at').val(event.start);
            $('#train_name').find('#ends_at').val(event.end);
        },
        events: [
            @foreach($trainings as $event)
                {
                    title: '{{$event->training_name}}',
                    venue: '{{$event->venue}}',
                    allDay: true,
                    start: new Date('{{$event->fdate_conducted}}').toDateString("yyyy-MM-dd"),
                    end: new Date('{{$event->tdate_conducted}}').toDateString("yyyy-MM-dd"),
                    url: '#train_name{{$event->id}}',
                },
            @endforeach
        ]
      });
    });
</script>
@endsection