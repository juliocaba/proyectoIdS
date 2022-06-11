<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre_cliente', 'Nombre:') !!}
    <p>{{ $cliente->nombre_cliente }}</p>
</div>

<!-- Descripcion Field -->
<div class="col-sm-12">
    {!! Form::label('descripcion', 'Descripción:') !!}
    <p>{{ $cliente->descripcion }}</p>
</div>

<!-- Telefono Field -->
<div class="col-sm-12">
    {!! Form::label('telefono', 'Telefono:') !!}
    <p>{{ $cliente->telefono }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $cliente->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Modificado el:') !!}
    <p>{{ $cliente->updated_at }}</p>
</div>

