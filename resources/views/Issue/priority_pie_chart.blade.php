<script type="text/javascript">
    $(function () {
        var high = 0;
        var mid = 0;
        var low = 0;
        @foreach ($issues as $issue)
            @if($issue->priority == 'mid')
                mid++;
            @elseif($issue->priority == 'high')
                high++;
            @elseif($issue->priority == 'low')
                low++;
            @endif
        @endforeach

        Highcharts.chart('issue_priority_pie', {
            chart: {
                width: 450,
                height: 300,
                type: 'pie'
            },
            title: {
                text: '議題嚴重程度統計'
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
                    name: 'high',
                    y: high
                }, {
                    name: 'mid',
                    y: mid
                }, {
                    name: 'low',
                    y: low
                }]
            }]
        });
    });
</script>