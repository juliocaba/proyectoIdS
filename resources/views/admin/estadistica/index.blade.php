@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Estadísticas</h1>
                </div>
            </div>
        </div>
    </section>

    @include('admin.estadistica.scripts')

    {{-- para cambiar el color de fondo del grafico, ponerlo al lado de id : style="background-color: rgba(106, 236, 13, 0.5)"--}}

    {{--PERROS POR MES



    <div class="container py-5" style="width:80%;">

    <center><h4>Cantidad de perros por mes</h4></center>
    
    
        <canvas id="perros_por_mes"></canvas>
        <script>
        var ctx = document.getElementById('perros_por_mes').getContext('2d');
    
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo'],
                datasets: [{
                    data: [120, 190, 201],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.8)',
                        'rgba(54, 162, 235, 0.8)',
                        'rgba(255, 206, 86, 0.8)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 15,
                            stepSize: 1
                        },
                        scaleLabel: {
                        display: true,
                        labelString: 'Cantidad de perros',
                        fontSize: 20
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 15
                        },
                        scaleLabel: {
                        display: true,
                        labelString: 'Meses',
                        fontSize: 20
                        }
                    }]
                }
            }
        });
        </script>
    </div>
    --}}

    {{--PERROS POR TAMANIO--}}
    <div class="container py-5" style="width:80%;">
        <center><h4>Cantidad de perros por tamaño</h4></center>
        <canvas id="perros_por_tamanio"></canvas>
    </div>

    {{--PERROS POR TRABAJO REALIZADO--}}
    <div class="container py-5" style="width:80%;">
        <center><h4>Cantidad de perros por trabajo realizado</h4></center>
        <canvas id="perros_por_tarea"></canvas>
    </div>



    {{--PERROS POR TRABAJOR REALIZADO
    <div class="container py-5" style="width:80%;">

        <center><h4>Cantidad de perros por trabajo realizado</h4></center>

        <canvas id="perros_por_tarea"></canvas>
        <script>
        var ctx = document.getElementById('perros_por_tarea').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Corte', 'Baño', 'Corte y baño'],
                datasets: [{
                    data: [15, 10, 5],
                    backgroundColor: [
                        'rgba(100, 100, 100, 0.8)',
                        'rgba(255, 0, 0, 0.8)',
                        'rgba(255, 20, 86, 0.8)'
                    ],
                    borderColor: [
                        'rgba(100, 100, 100, 1)',
                        'rgba(255, 0, 0, 1)',
                        'rgba(255, 20, 86, 1)'
                    ],
                    borderWidth: 3
                    
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 15,
                            stepSize: 1
                        },
                        scaleLabel: {
                        display: true,
                        labelString: 'Cantidad de perros',
                        fontSize: 20
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontSize: 15
                        },
                        scaleLabel: {
                        display: true,
                        labelString: 'Tipo de trabajo',
                        fontSize: 20
                        }
                    }]
                }
            }
        });
        </script>
    </div>
--}}

@endsection 
