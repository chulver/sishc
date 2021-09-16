@can('pacientes.show')
    <button class="btn btn-secondary" onclick="Mostrar({{ $id }})">Mostrar</button>
@endcan
@can('pacientes.edit')
    <button class="btn btn-primary" onclick="Editar({{ $id }})">Editar</button>
@endcan
