<script type="text/javascript">
    $(function () {
        var manager = 0;
        var developer = 0;
        var tester = 0;
        var general = 0;
        @foreach ($project->users as $member)
            @if($member->pivot['user_auth'] == 'manager')
                manager++;
            @elseif($member->pivot['user_auth'] == 'developer')
                developer++;
            @elseif($member->pivot['user_auth'] == 'tester')
                tester++;
            @elseif($member->pivot['user_auth'] == 'general')
                general++;
            @endif
        @endforeach

        Highcharts.chart('project_member_column', {
            chart: {
                width: 450,
                height: 300,
                type: 'column'
            },
            title: {
                text: '成員職位統計'
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
                    ['manager', manager],
                    ['developer', developer],
                    ['tester', tester],
                    ['general',general]
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