{!! Form::open(['route' => ['admin.clientes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    
    <a href="{{ route('admin.clientes.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('admin.clientes.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    
    {!! Form::button('<i class="fa fa-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirm('¿Deseas eliminarlo?')"
    ]) !!}
    
</div>
<div class='btn-group'>
    
    <a href="https://api.whatsapp.com/send?phone=<?php echo $telefono?>&text=Hola,%20su%20turno%20ha%20sido%20modificado." class='btn btn-default btn-xs'>
        <i class="fa fa-address-card"></i>
    </a>
</div>
{!! Form::close() !!}
