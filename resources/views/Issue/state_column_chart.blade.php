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

        Highcharts.chart('issue_state_column', {
            chart: {
                width: 450,
                height: 300,
                type: 'column'
            },
            title: {
                text: '議題狀態統計'
            },
            xAxis: {
                type: 'category',
                labels: {
                    rotation: 0,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: '數量(個)'
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y} 個</b>'
            },
            series: [{
                name: 'sda',
                data: [
                    ['ready', ready],
                    ['doing', doing],
                    ['close', close]
                ],
                dataLabels: {
                    enabled: true,
                    rotation: 0,
                    color: '#FFFFFF',
                    align: 'center',
                    format: '{point.y}', // one decimal
                    y: 10, // 10 pixels down from the top
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            }]
        });
    });
</script>