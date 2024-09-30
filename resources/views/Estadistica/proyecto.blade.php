@extends('adminlte::page')

@section('title', 'Estadísticas')

@section('content_header')
    <h1>Estadísticas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div id="basic-chart" style="height: 400px;"></div>
        </div>
        <div class="col-md-6">
            <div id="tasks-by-status-chart" style="height: 400px;"></div>
        </div>
        <div class="col-md-12">
            <div id="timeline-chart" style="height: 400px;"></div>
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
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/gantt.js"></script> <!-- Asegúrate de incluir esta línea -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Document loaded');

            // Gráfico básico de líneas
            Highcharts.chart('basic-chart', {
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Basic Line Chart'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    title: {
                        text: 'Value'
                    }
                },
                series: [{
                    name: 'Sample Data',
                    data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                }]
            });

            // Gráfico de tareas por estado
            Highcharts.chart('tasks-by-status-chart', {
                chart: {
                    type: 'pie'
                },
                title: {
                    text: 'Tasks by Status'
                },
                series: [{
                    name: 'Tasks',
                    colorByPoint: true,
                    data: [
                        { name: 'Done', y: 40 },
                        { name: 'In Progress', y: 30 },
                        { name: 'To Do', y: 20 },
                        { name: 'Blocked', y: 10 }
                    ]
                }]
            });

            // Gráfico de línea de tiempo
            Highcharts.ganttChart('timeline-chart', {  // Cambia Highcharts.chart a Highcharts.ganttChart
                chart: {
                    type: 'gantt'
                },
                title: {
                    text: 'Timeline'
                },
                series: [{
                    name: 'Tasks',
                    data: [{
                        name: 'Task 1',
                        start: Date.UTC(2023, 4, 1),
                        end: Date.UTC(2023, 4, 5)
                    }, {
                        name: 'Task 2',
                        start: Date.UTC(2023, 4, 6),
                        end: Date.UTC(2023, 4, 10)
                    }, {
                        name: 'Task 3',
                        start: Date.UTC(2023, 4, 4),
                        end: Date.UTC(2023, 4, 10)
                    }, {
                        name: 'Task 4',
                        start: Date.UTC(2023, 4, 5),
                        end: Date.UTC(2023, 4, 10)
                    }]
                }]
            });
        });
    </script>
@stop
