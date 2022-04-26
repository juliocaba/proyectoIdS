<li class="nav-item mt-1 {{ Request::is('/home') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="fas fa-home" style="text-align: center; margin-right: .4em;"></i><p  align="right">Inicio</p>
    </a>
</li>
<li class="nav-item mt-1 {{ Request::is('admin/turnos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.turnos.index') }}">
        <i class="fas fa-calendar-alt" style="text-align: center; margin-right: .4em;"></i><p  align="right">Turnos</p>
    </a>
 </li>
 <li class="nav-item mt-1 {{ Request::is('admin/inventarios*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.clientes.index') }}">
        <i class="fas fa-users" style="text-align: center; margin-right: .4em;"></i><p  align="right">Clientes</p>
    </a>
 </li>
<li class="nav-item mt-1 {{ Request::is('admin/inventarios*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.inventarios.index') }}">
        <i class="fas fa-tasks" style="text-align: center; margin-right: .4em;"></i><p  align="right">Inventario</p>
    </a>
 </li>
 <li class="nav-item mt-1 {{ Request::is('admin/estadistica*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.estadistica.index') }}">
        <i class="fas fa-chart-area" style="text-align: center; margin-right: .4em;"></i><p  align="right">Estadísticas</p>
    </a>
 </li>

