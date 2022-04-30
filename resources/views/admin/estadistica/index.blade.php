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

    
<?php
    $srv="127.0.0.1"; //Servidor
    $usr="root"; //Usuario
    $psw=""; //Contraseña, en este caso no hay.
    
    $conection = mysqli_connect($srv, $usr, $psw, "perritosfelices") or die("error");
    $cant_perros_pequenios="SELECT COUNT(animal_size) AS cant_peques 
                            FROM events 
                            WHERE animal_size!='mediano' AND animal_size!='grande'";
    $cant_perros_medianos="SELECT COUNT(animal_size) AS cant_medianos 
                            FROM events 
                            WHERE animal_size='mediano'";
    $cant_perros_grandes="SELECT COUNT(animal_size) AS cant_grandes 
                            FROM events 
                            WHERE animal_size='grande'";
    $cant_perros_corte="SELECT COUNT(type_service) AS cant_corte 
                        FROM events 
                        WHERE type_service='corte'";
    $cant_perros_banio="SELECT COUNT(type_service) AS cant_banio 
                        FROM events 
                        WHERE type_service!='corte' AND type_service!='ambos'";
    $cant_perros_ambos="SELECT COUNT(type_service) AS cant_ambos 
                        FROM events 
                        WHERE type_service='ambos'";

    $peq=mysqli_query($conection, $cant_perros_pequenios);
    $med=mysqli_query($conection, $cant_perros_medianos);
    $gran=mysqli_query($conection, $cant_perros_grandes);
    $corte=mysqli_query($conection, $cant_perros_corte);
    $banio=mysqli_query($conection, $cant_perros_banio);
    $ambos=mysqli_query($conection, $cant_perros_ambos);

    while($row1=mysqli_fetch_array($peq) and 
        $row2=mysqli_fetch_array($med) and 
        $row3=mysqli_fetch_array($gran) and
        $row4=mysqli_fetch_array($corte) and
        $row5=mysqli_fetch_array($banio) and
        $row6=mysqli_fetch_array($ambos)){

        echo "pequeños: $row1[cant_peques]     ";
        echo "medianos: $row2[cant_medianos]   ";
        echo "grandes: $row3[cant_grandes]   ";
        echo "corte: $row4[cant_corte]   ";
        echo "baño: $row5[cant_banio]   ";
        echo "ambos: $row6[cant_ambos]   ";
    }
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js@latest/dist/Chart.min.js"></script>

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
                        fontSize: 15
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
    <script>
    var ctx = document.getElementById('perros_por_tamanio').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Chico', 'Mediano', 'Grande'],
            datasets: [{
                data: [12, 19, 21],
                backgroundColor: [
                    'rgba(255, 1, 1, 0.8)',
                    'rgba(54, 1, 235, 0.8)',
                    'rgba(1, 255, 86, 0.8)'
                ],
                borderColor: [
                    'rgba(255, 1, 1, 1)',
                    'rgba(54, 1, 235, 1)',
                    'rgba(1, 255, 86, 1)'
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
                        fontSize: 15
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
                    labelString: 'Tamaño del perro',
                    fontSize: 20
                    }
                }]
            }
        }
    });
    </script>
</div>

{{--PERROS POR TRABAJOR REALIZADO--}}
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
                        fontSize: 15
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

@endsection 
