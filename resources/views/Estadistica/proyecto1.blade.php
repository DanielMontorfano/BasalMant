@extends('adminlte::page')

@section('title', 'Estadísticas')

@section('content_header')
    <h1>Estadísticas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div id="timeline-chart" style="height: 600px;"></div> <!-- Aumentar altura para mayor espacio -->
        </div>
    </div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop

@section('css')
    {{-- Agrega estilos adicionales si es necesario --}}
@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script> <!-- Módulo de exportación -->
<script src="https://code.highcharts.com/modules/export-data.js"></script> <!-- Módulo de exportación de datos -->
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/gantt.js"></script> <!-- Asegúrate de incluir esta línea -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script> <!-- Moment.js para manejo de fechas -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Configurar moment.js para español
            moment.locale('es');

            // Configuración global de Highcharts
            Highcharts.setOptions({
                chart: {
                    backgroundColor: '#2b2b2b', // Fondo gris oscuro
                    borderRadius: 10, // Bordes redondeados
                    style: {
                        color: '#ffffff' // Color de texto blanco por defecto
                    }
                },
                title: {
                    style: {
                        color: '#ffffff' // Color del título blanco
                    }
                },
                xAxis: {
                    type: 'datetime',
                    gridLineWidth: 1,
                    gridLineColor: '#ffffff',
                    labels: {
                        style: {
                            color: '#ffffff' // Color de las etiquetas del eje X blanco
                        }
                    },
                    scrollbar: {
                        enabled: true, // Habilitar la barra de desplazamiento
                        barBackgroundColor: '#666666',
                        barBorderRadius: 7,
                        barBorderWidth: 0,
                        buttonBackgroundColor: '#666666',
                        buttonBorderWidth: 0,
                        buttonArrowColor: '#ffffff',
                        buttonBorderRadius: 7,
                        rifleColor: '#ffffff',
                        trackBackgroundColor: '#f2f2f2',
                        trackBorderWidth: 1,
                        trackBorderColor: '#ffffff',
                        trackBorderRadius: 7
                    }
                },
                yAxis: {
                    labels: {
                        style: {
                            color: '#ffffff' // Color de las etiquetas del eje Y blanco
                        }
                    }
                },
                credits: {
                    enabled: false // Desactivar la leyenda de highcharts.com
                },
                exporting: {
                    buttons: {
                        contextButton: {
                            enabled: true, // Habilitar el menú contextual
                            menuItems: [
                                'viewFullscreen', 'printChart', 'separator', 'downloadPNG', 'downloadJPEG',
                                'downloadPDF', 'downloadSVG', 'separator', 'downloadCSV', 'downloadXLS'
                            ]
                        }
                    }
                }
            });

            // Datos de las tareas (ejemplo para 6 semanas)
            var tasksData = [{
                name: 'Tarea 1',
                start: Date.UTC(2023, 4, 1),
                end: Date.UTC(2023, 4, 14) // Tarea 1: 2 semanas
            }, {
                name: 'Tarea 2',
                start: Date.UTC(2023, 4, 15),
                end: Date.UTC(2023, 4, 28) // Tarea 2: 2 semanas
            }, {
                name: 'Tarea 3',
                start: Date.UTC(2023, 4, 30),
                end: Date.UTC(2023, 5, 14) // Tarea 3: 2 semanas
            }, {
                name: 'Tarea 4',
                start: Date.UTC(2023, 0, 1),
                end: Date.UTC(2023, 5, 28) // Tarea 4: 2 semanas
            }];

            // Gráfico de línea de tiempo (Gantt)
            Highcharts.ganttChart('timeline-chart', {
                title: {
                    text: 'Línea de Tiempo'
                },
                xAxis: {
                    // Definir manualmente el rango de fechas en base a las semanas deseadas
                    min: Date.UTC(2023, 5, 1), // Fecha mínima
                    max: Date.UTC(2023, 11, 28), // Fecha máxima
                },
                series: [{
                    name: 'Tareas',
                    data: tasksData
                }]
            });
        });
    </script>
@stop
