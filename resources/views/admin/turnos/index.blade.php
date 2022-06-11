@extends('layouts.app')
@include('layouts.head')
@section('content')
    <section class="content-header">
        <div class="container-fluid">            
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')
        @include('admin.turnos.cuerpo')

        
    </div>
    @include('admin.turnos.scripts')
@endsection

