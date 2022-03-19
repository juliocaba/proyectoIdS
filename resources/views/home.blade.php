{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    </div>
</div>
@endsection
--}}

@extends('maestra')
@section("titulo", "Inicio")
@section('contenido')
    <div class="col-12 text-center">
        <h1>Bienvenido, {{Auth::user()->name}}</h1>
    </div>
    <div class="card-columns">
        <a href="" style="color: rgb(0, 0, 0);">
            <div class="card text-center">
                <img src="{{url("/img/cliente.png")}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Clientes</h1>
                </div>
            </div>
        </a>

        <a style="color: black;" target="_blank" href="">
            <div class="card text-center">
                <img src="{{url("/img/turno.png")}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Turnos</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="">
            <div class="card text-center">
                <img src="{{url("/img/inventario.png")}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Inventario</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="">
            <div class="card text-center">
                <img src="{{url("/img/estadistica.png")}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Estadísticas</h1>
                </div>
            </div>
        </a>
    </div>

    <body background="/img/fondo4.jpg">

@endsection