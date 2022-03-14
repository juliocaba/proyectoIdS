<div class="form-group col-sm-6">
    {!! Form::label('nombre_cliente', 'Nombre:') !!}
    {!! Form::text('nombre_cliente', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Teléfono:') !!}
    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('nombre_perro', 'Nombre del perro:') !!}
    {!! Form::text('nombre_perro', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('tamaño', 'Tamaño del perro:') !!}
    {!! Form::select('tamaño', ['1' => 'Chico', '2'=> 'Mediano'], null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col">
    {!! Form::label('descripcion', 'Descripción, observaciones, notas:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>

