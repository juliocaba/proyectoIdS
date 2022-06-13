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

@endsection 
