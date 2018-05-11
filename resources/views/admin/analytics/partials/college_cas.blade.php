<div class="box box-primary" id="box-total-views">
    <div class="box-header with-border">
        <h3 class="box-title">
            <span><i class="fa fa-users"></i></span>
            <span>College of Arts and Sciences</span>
        </h3>

        @include('admin.partials.boxes.toolbar')
    </div>
    <div class="box-body">
        <table id="tbl-list" data-server="false" data-page-length="10" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><i class="fa fa-fw fa-user text-muted"></i> Name</th>
                    <th><i class="fa fa-fw fa-envelope text-muted"></i> Email</th>
                </tr>
            </thead>
            <tbody>
                    
            </tbody>
        </table>
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function ()
        {
            var chart;

            initToolbarDateRange('#box-total-views .daterange', updateChart);

            /**
             * Get the chart's data
             * @param view
             */
            function updateChart(start, end)
            {
                if (chart) {
                    chart.destroy();
                }

                if (!start) {
                    start = moment().subtract(29, 'days').format('YYYY-MM-DD');
                    end = moment().format('YYYY-MM-DD');
                }

                $('#box-total-views .loading-widget').show();
                doAjax('/api/analytics/visitors-views', {
                    'start': start, 'end': end,
                }, createLineChart);
            }

            function createLineChart(data)
            {
                // total page views and visitors line chart
                var ctx = document.getElementById("chart-page-views").getContext("2d");

                chart = new Chart(ctx).Line(data, {
                    multiTooltipTemplate: "<%= value %> - <%= datasetLabel %>"
                });

                 $('#box-total-views .loading-widget').slideUp();

                $('#chart-page-views-legend').html(chart.generateLegend());
            }

            setTimeout(function ()
            {
                updateChart();
            }, 300);
        })
    </script>
@endsection