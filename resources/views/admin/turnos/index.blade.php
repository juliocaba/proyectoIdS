@extends('layouts.app')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"/> --}}
@include('layouts.head')
@section('content')
    <section class="content-header">
        <div class="container-fluid">            
        </div>
    </section>

    <div class="content px-3">

        @include('flash::message')
        @include('layouts.cuerpo')

        
    </div>
    @include('layouts.scripts')
@endsection

