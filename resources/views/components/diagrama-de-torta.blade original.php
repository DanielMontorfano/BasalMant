
<body>
    <h1>Hello, world!</h1>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div id="container"></div>
            </div>
        </div>
    </div>
    <!-- Scripts al final del cuerpo del documento 
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script> 
    <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
    <script src="{{ asset('dataprint/highcharts/code/highcharts.js') }}"></script> 
    <script src="{{ asset('dataprint/highcharts/code/modules/exporting.js') }}"></script>
    <script src="{{ asset('dataprint/highcharts/code/modules/export-data.js') }}"></script>
    <script src="{{ asset('dataprint/highcharts/code/modules/accessibility.js') }}"></script>


    



    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Equipos Vs. Planes'
            },
            tooltip: {
                valueSuffix: '%'
            },
            subtitle: {
                text: 'Fuente: <a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">Basalmant</a>'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: [{
                        enabled: true,
                        distance: 20
                    }, {
                        enabled: true,
                        distance: -40,
                        format: '{point.percentage:.1f}%',
                        style: {
                            fontSize: '1.2em',
                            textOutline: 'none',
                            opacity: 0.7
                        },
                        filter: {
                            operator: '>',
                            property: 'percentage',
                            value: 10
                        }
                    }]
                }
            },
            series: [{
                name: 'Percentage',
                colorByPoint: true,
                data: <?= $data ?>
            }]
        });
    </script>

    
</body>



