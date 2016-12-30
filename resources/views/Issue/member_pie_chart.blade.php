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

        Highcharts.chart('project_member_pie', {
            chart: {
                width: 450,
                height: 300,
                type: 'pie'
            },
            title: {
                text: '成員職位統計'
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
                    name: 'manager',
                    y: manager
                }, {
                    name: 'developer',
                    y: developer
                }, {
                    name: 'tester',
                    y: tester
                },{
                    name: 'general',
                    y: general
                }]
            }]
        });
    });
</script>