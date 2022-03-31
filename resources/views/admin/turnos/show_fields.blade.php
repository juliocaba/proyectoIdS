<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{{ $turno->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Actualizado el:') !!}
    <p>{{ $turno->updated_at }}</p>
</div>

