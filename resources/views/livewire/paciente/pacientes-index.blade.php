<div>
    <div class="card">
        <div class="card-header">
            <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el nombre del paciente">
        </div>
        @if($pacientes->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>NOMBRE DEL PACIENTE</th>
                        <th>SEXO</th>
                        <th></th>
                    <thead>
                    <tbody>
                        @foreach ($pacientes as $paciente)
                        <tr>
                            <td>{{$paciente->id}}</td>
                            <td>{{$paciente->apaterno}} {{$paciente->amaterno}} {{$paciente->nombre}}</td>
                            <td>{{$paciente->sexo}}</td>
                            <td>
                                <a class="btn btn-secondary" href="{{ route('pacientes.show', $paciente) }}">Ver</a>
                                <a class="btn btn-primary" href="{{ route('pacientes.edit', $paciente) }}">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $pacientes->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningun paciente</strong>
            </div>
        @endif
    </div> 
</div>