<div class="card-body">
    <table id="consultas" class="table table-striped table-bordered shadow-lg mt-4">
        <thead class="bg-secondary text-white">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">FECHA</th>
                <th scope="col">HORA</th>
                <th scope="col">USUARIO</th>
                <th scope="col">PACIENTE</th>
                <th scope="col">SERVICIO</th>
                <th scope="col">MEDICO</th>
                <th scope="col">ESTADO</th>
                <th scope="col">ACCION</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @foreach ($consultas as $consulta)
                <tr>
                    <td class="font-weight-bold">{{$consulta->numeroturno}}</td>
                    <td class="font-weight-bold">{{$consulta->fecha}}</td>
                    <td class="font-weight-bold">{{$consulta->hora}}</td>
                    <td class="font-weight-bold">{{$consulta->user}}</td>
                    <td class="font-weight-bold">{{$consulta->paciente}}</td>
                    <td class="font-weight-bold">{{$consulta->serviciomedico}}</td>
                    <td class="font-weight-bold">{{$consulta->medico}}</td>
                    <td>
                        @if($consulta->estado == '3')
                            <p class="text-success"><strong>Completado</strong></p>
                        @else
                            <p class="text-danger"><strong>Pendiente</strong></p>
                        @endif
                    </td>
                    <td>
                        @if($consulta->estado == '1')
                            @can('consultas.edit')
                                <button class="btn btn-primary" onclick="Editar({{ $consulta->id }})"><i class="fas fa-edit"></i></button>
                            @endcan
                            @can('consultas.destroy')
                                <button class="btn btn-danger" onclick="Eliminar({{ $consulta->id }})"><i class="fas fa-trash-alt"></i></button>
                            @endcan
                        @else
                            @can('consultas.show')
                                <button class="btn btn-secondary" onclick="Mostrar({{ $consulta->id }})">Ver</button>
                            @endcan
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
