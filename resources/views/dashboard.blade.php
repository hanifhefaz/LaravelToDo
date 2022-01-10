<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="pie_chart">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                Highcharts.setOptions({
                    colors: ['#00c0ef', '#00a65a', '#dd4b39']
                });
                var data = <?php echo json_encode($data); ?>;
                var options = {
                    chart: {
                        renderTo: 'pie_chart',
                        plotBackgroundColor: null,
                        plotBorderWidth: null,
                        plotShadow: false,
                        borderColor: '#EBBA95',
                        borderWidth: 1,
                        type: 'line'
                    },
                    title: {
                        text: "Test"
                    },
                    tooltip: {
                        formatter: function() {
                            return this.point.name + ': <b>%' + Highcharts.numberFormat(this.percentage, 1) +
                                '</b>';
                        }
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                color: '#000000',
                                connectorColor: '#000000',
                                formatter: function() {
                                    return this.point.name + ': <b>%' + Highcharts.numberFormat(this.percentage,
                                        1) + '</b>';
                                }
                            },
                            showInLegend: true

                        }
                    },
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom',
                        x: 0,
                        y: 0,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                    series: [{
                        type: 'pie',
                        name: 'data'
                    }]
                }

                myarray = [];
                $.each(data, function(index, val) {
                    myarray[index] = [val.status, val.count];
                });
                options.series[0].data = myarray;
                chart = new Highcharts.Chart(options);
            });
        </script>
