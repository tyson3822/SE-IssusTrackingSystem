<script type="text/javascript">
    $(function () {
        var ready = 0;
        var doing = 0;
        var close = 0;
        @foreach ($project->issues as $issue)
            @if($issue->state == 'doing')
                doing++;
            @elseif($issue->state == 'ready')
                ready++;
            @elseif($issue->state == 'close')
                close++;
            @endif
        @endforeach

        Highcharts.chart('issue_state_pie', {
            chart: {
                width: 450,
                height: 300,
                type: 'pie'
            },
            title: {
                text: '議題狀態統計'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                data: [{
                    name: 'ready',
                    y: ready
                }, {
                    name: 'doing',
                    y: doing
                }, {
                    name: 'close',
                    y: close
                }]
            }]
        });
    });
</script>