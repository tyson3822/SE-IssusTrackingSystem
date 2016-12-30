<script type="text/javascript">
    $(function () {
        var high = 0;
        var mid = 0;
        var low = 0;
        @foreach ($project->issues as $issue)
            @if($issue->priority == 'mid')
                mid++;
            @elseif($issue->priority == 'high')
                high++;
            @elseif($issue->priority == 'low')
                low++;
            @endif
        @endforeach

        Highcharts.chart('issue_priority_column', {
            chart: {
                width: 450,
                height: 300,
                type: 'column'
            },
            title: {
                text: '議題嚴重程度統計'
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
                    ['high', high],
                    ['mid', mid],
                    ['low', low]
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