@extends('adminlte::page')

@section('title', 'Estadísticas')

@section('content_header')
    <h1>Estadísticas</h1>
@stop

@section('content')
    <div id="container"></div>
@stop

@section('footer')
    @include('layouts.partials.footer')
@stop

@section('js')
    <script src="https://code.highcharts.com/gantt/highcharts-gantt.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>

const today = new Date(),
    day = 1000 * 60 * 60 * 24;

//Inicio customizado
const customStartDate = new Date(Date.UTC(2024, 1, 1)); // Agosto es el mes 7, ya que los meses en JavaScript empiezan desde 0
const customStart = customStartDate.getTime();
const customEnd = customStart + (20 * day);    

// Set to 00:00:00:000 today
today.setUTCHours(0);
today.setUTCMinutes(0);
today.setUTCSeconds(0);
today.setUTCMilliseconds(0);
        // Configurar opciones de idioma y formato de fecha en español
        Highcharts.setOptions({
            lang: {
                months: [
                    'Enero', 'Febrero', 'Marzo', 'Abril',
                    'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                weekdays: [
                    'Domingo', 'Lunes', 'Martes', 'Miércoles',
                    'Jueves', 'Viernes', 'Sábado'
                ],
                shortMonths: [
                    'Ene', 'Feb', 'Mar', 'Abr',
                    'May', 'Jun', 'Jul', 'Ago',
                    'Sep', 'Oct', 'Nov', 'Dic'
                ],
                rangeSelectorZoom: '<span style="color:	#2e2e2e;">Periodo</span>',
                resetZoom: 'Reiniciar zoom'
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Verificar si Highcharts.ganttChart está disponible
            if (typeof Highcharts.ganttChart !== 'function') {
                console.error('Highcharts Gantt module failed to load.');
                return;
            }

            // Datos de las tareas (ejemplo)
            var tasksData = [{
            name: 'Planning',
            id: 'planning',
            start: Date.UTC(2024, 3, 1),
            end: Date.UTC(2024, 3, 25),
            //start: today.getTime(),
            //end: today.getTime() + (20 * day)
            
        }, {
            name: 'Requirements',
            id: 'requirements',
            parent: 'planning',
            start:  Date.UTC(2024, 3, 25),
            end:  Date.UTC(2024, 4, 25),
            //start: today.getTime(),
            //end: today.getTime() + (5 * day)
        }, {
            name: 'Design',
            id: 'design',
            dependency: 'requirements',
            parent: 'planning',
            start: Date.UTC(2024, 4, 25),
            end: Date.UTC(2024, 5, 25),
            //start: today.getTime() + (3 * day),
            //end: today.getTime() + (20 * day)
        }, {
            name: 'Layout',
            id: 'layout',
            parent: 'design',
            start: customStart,
            end: customStart + (20 * day)
            //start: today.getTime() + (3 * day),
            //end: today.getTime() + (10 * day)
        }, {
            name: 'Graphics',
            parent: 'design',
            dependency: 'layout',
            start: customStart,
            end: customStart + (23 * day)
           // start: today.getTime() + (10 * day),
           //end: today.getTime() + (20 * day)
        }, {
            name: 'Develop',
            id: 'develop',
            start: customStart,
            end: customStart + (24 * day)
           // start: today.getTime() + (5 * day),
           // end: today.getTime() + (30 * day)
        }, {
            name: 'Create unit tests',
            id: 'unit_tests',
            dependency: 'requirements',
            parent: 'develop',
            start: customStart,
            end: customStart + (25 * day)
            //start: today.getTime() + (5 * day),
           // end: today.getTime() + (8 * day)
        }, {
            name: 'Implement',
            id: 'implement',
            dependency: 'unit_tests',
            parent: 'develop',
            start: today.getTime() + (8 * day),
            end: today.getTime() + (30 * day)
        }];

            // Configurar el gráfico Gantt con zoom en ambos ejes
            Highcharts.ganttChart('container', {
                chart: {
                    backgroundColor: {
                        linearGradient: [0, 0, 0, 600],
                        stops: [
                            [0, '#7c7787'], // Gris oscuro
                            [1, '#2e2e2e']  // Gris medio
                        ]
                    },
                    borderRadius: 10, // Bordes redondeados
                    style: {
                        fontFamily: '\'Pacifico\', cursive'




                    }
                },
                title: {
                    text: 'Mantenimiento general de usina',
                    align: 'center',
                    style: {
                        fontSize: '30px', // Cambia el tamaño de la fuente
                        color: '#aFFFFF'
                        
                    }
                },
                xAxis: {
                    min: Date.UTC(2023, 0, 1),
                    max: Date.UTC(2024, 11, 1),
                    scrollbar: {
                        enabled: true
                    },
                    gridLineColor: '#FFFFFF',
                    labels: {
                        style: {
                            color: '#afffff', // Color de las etiquetas del eje x
                            fontWeight: 'bold'
                        }
                    },
                    dateTimeLabelFormats: {
                        year: {
                            main: '<span style="color:#FFA500;"></span>', // Color de la fuente para el año
                            range: '<span style="color:#FFA500;">%Y %B</span>' // Color de la fuente para el rango de años
                        },
                        month: {
                            main: '<span style="color:#00FF00;">%Y %B</span>', // Color de la fuente para el mes
                            range: '<span style="color:#00FF00;">%Y %B</span>' // Color de la fuente para el rango de meses
                        }
                    }
                },
                yAxis: {
                    
                    gridLineColor: '#FFFFFF',
                    labels: {
                        style: {
                            color: '#FFFFFF'
                        }
                    }
                },
                credits: {
                    enabled: false // Deshabilitar la leyenda de Highcharts.com
                },
                accessibility: {
                    point: {
                        descriptionFormatter: function (point) {
                            var desc = point.yCategory + '. ';
                            if (point.completed) {
                                desc += 'Tarea completada en un ' + (point.completed.amount * 100) + '%. ';
                            }
                            desc += 'Inicio ' + Highcharts.dateFormat('%Y-%m-%d', point.start) + ', fin ' + Highcharts.dateFormat('%Y-%m-%d', point.end) + '.';
                            return desc;
                        }
                    }
                },
               
                navigator: {
                    enabled: true // Habilitar el navigator para zoom adicional
                },
                rangeSelector: {
                    enabled: true // Habilitar el range selector para zoom adicional
                },
                series: [{
                    name: 'Tareas',
                    data: tasksData
                }]
            });
        });
    </script>
@stop
