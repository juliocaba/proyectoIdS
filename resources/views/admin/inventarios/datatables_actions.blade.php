{!! Form::open(['route' => ['admin.inventarios.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.inventarios.show', $id) }}" class='btn mr-1 btn-outline-success btn-sm' data-toggle="tooltip" data-placement="top" title="Ver">
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('admin.inventarios.edit', $id) }}" class='btn mr-1 btn-sm btn-outline-info' data-toggle="tooltip" data-placement="top" title="Editar">
        <i class="fa fa-edit"></i>
    </a> 
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'title' => 'eliminar',
        'class' => 'btn btn-sm mr-1 btn-outline-danger',
        'onclick' => "return confirm('¿Deseas eliminarlo?')"
    ]) !!}   
</div>
{!! Form::close() !!}
