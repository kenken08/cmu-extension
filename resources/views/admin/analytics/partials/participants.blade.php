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
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header bg-ebonyclay">
                <h3 class=" text-white box-title">
                    <span><i class="fa fa-pie-chart"></i> Projects per Unit</span>
                </h3>
            </div>
            <div class="box-body">
                <canvas id="chart-area" width="800" height="229"></canvas>
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
                'Capability Building Unit'+' = '+ parseInt({{count($pcdetails->where('college_id',10))}}),
                'Information and Communication Unit'+' = ' + parseInt({{count($pcdetails->where('college_id',11))}}),
                'Techno-Demo and Sustainability Unit'+' = ' + parseInt({{count($pcdetails->where('college_id',12))}}),
            ]
        },
        options: {
            responsive: true,
            legend: {
                position: 'right',
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
@endsection