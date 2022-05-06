<style>
    .sorting_disabled{
        width: 140px !important;
    }
    .dataTables_info{
        padding-left: 5px !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{!! Form::open(['route' => ['admin.clientes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('admin.clientes.show', $id) }}" class='btn mr-1 btn-outline-success btn-sm' data-toggle="tooltip" data-placement="top" title="Ver">
        <i class="fa fa-eye"></i>
    </a>    
    <a href="{{ route('admin.clientes.edit', $id) }}" class='btn mr-1 btn-sm btn-outline-info' data-toggle="tooltip" data-placement="top" title="Editar">
        <i class="fa fa-edit"></i>
    </a>    
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'title' => 'eliminar',
        'class' => 'btn btn-sm mr-1 btn-outline-danger',
        'onclick' => "return confirm('¿Deseas eliminarlo?')"
    ]) !!}   
    <a href="https://api.whatsapp.com/send?phone=<?php echo $telefono?>&text=Hola,%20su%20turno%20ha%20sido%20modificado." class='btn mr-1 btn-sm btn-outline-info' data-toggle="tooltip" data-placement="top" title="whatsapp">
        <i class="fa fa-whatsapp"></i>
    </a>   
</div>
{!! Form::close() !!}
