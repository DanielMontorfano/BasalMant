@extends('adminlte::page')

@section('title', 'Estadisticas')

@section('content_header')
    <h1>Estadisticas</h1>
@stop

@section('content')
    {{-- Nueva sección para la galería de diagramas de torta --}}
    <div class="row">
        <div class="col-md-4">
            <div id="container1" class="chart"></div>
        </div>
        <div class="col-md-4">
            <div id="container2" class="chart"></div>
        </div>
        <div class="col-md-4">
            <div id="container3" class="chart"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div id="container4" class="chart"></div>
        </div>
        <div class="col-md-4">
            <div id="container5" class="chart"></div>
        </div>
        <div class="col-md-4">
            <div id="container6" class="chart"></div>
        </div>
    </div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop

@section('css')
    <style>
        .chart {
            height: 400px;
            margin-bottom: 20px;
        }
    </style>
@stop

@section('js')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        // Método para crear los gráficos de torta
        function createChart(containerId, title, data) {
            Highcharts.chart(containerId, {
                chart: {
                    type: 'pie',
                    backgroundColor: 'transparent',
                    spacing: [10, 10, 10, 10]
                },
                title: {
                    text: title,
                    verticalAlign: 'bottom',
                    style: {
                        fontSize: '18px', // Tamaño del título
                        color: 'navy' // Color del título
                    }
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                            style: {
                                color: 'white', // Color del texto de la etiqueta
                                fontSize: '14px', // Tamaño de fuente
                                fontWeight: 'bold', // Peso de la fuente
                                textOutline: '0px contrast', // Borde blanco de contraste
                                textShadow: '1px 1px 1px black', // Sombra del texto
                                textOverflow: 'ellipsis', // Control del recorte del texto
                                textDecoration: 'underline', // Decoración del texto
                                fontFamily: 'Arial, sans-serif', // Familia de fuentes
                                fontStyle: 'italic', // Estilo de la fuente
                                textAlign: 'center', // Alineación del texto
                                lineHeight: '1.5', // Altura de línea
                                letterSpacing: '1px', // Espaciado entre caracteres
                                opacity: 0.8, // Opacidad del texto
                                whiteSpace: 'nowrap' // Control del desbordamiento de texto
                            }
                        },
                        point: {
                            events: {
                                click: function () {
                                    // Redirigir al hacer clic en la porción
                                    window.location.href = this.options.url;
                                }
                            }
                        },
                        size: '50%' // Ajusta el tamaño del gráfico de torta
                    }
                },
                series: [{
                    name: 'Share',
                    colorByPoint: true,
                    data: data
                }],
                credits: {
                    enabled: false
                }
            });
        }

        // Datos para los gráficos pasados desde el controlador, incluyendo URLs
        const data1 = {!! json_encode($data1) !!};
        const data2 = {!! json_encode($data2) !!};
        const data3 = {!! json_encode($data3) !!};
        const data4 = {!! json_encode($data4) !!};
        const data5 = {!! json_encode($data5) !!};
        const data6 = {!! json_encode($data6) !!};

        // Asignar URLs a cada punto de los datos

        const baseUrl = '{{ url('/') }}'; 
        // URL para Categoría A (ajustar según tus datos)
        data1.forEach(function(point) {
            point.url = baseUrl + '/menu_seguimientos'; // URL para data1
        });
        data2.forEach(function(point) {
            point.url = 'https://example.com/categoryF'; // URL para Categoría F (ajustar según tus datos)
        });
        data3.forEach(function(point) {
            point.url = 'https://example.com/categoryK'; // URL para Categoría K (ajustar según tus datos)
        });
        data4.forEach(function(point) {
            point.url = 'https://example.com/categoryP'; // URL para Categoría P (ajustar según tus datos)
        });
        data5.forEach(function(point) {
            point.url = 'https://example.com/categoryU'; // URL para Categoría U (ajustar según tus datos)
        });
        data6.forEach(function(point) {
            point.url = 'https://example.com/categoryZ'; // URL para Categoría Z (ajustar según tus datos)
        });

        // Crear los gráficos con títulos personalizados
        createChart('container1', 'Título Personalizado 1', data1);
        createChart('container2', 'Título Personalizado 2', data2);
        createChart('container3', 'Título Personalizado 3', data3);
        createChart('container4', 'Título Personalizado 4', data4);
        createChart('container5', 'Título Personalizado 5', data5);
        createChart('container6', 'Título Personalizado 6', data6);
    </script>
@stop

