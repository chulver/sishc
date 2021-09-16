<div class="card-body">
    <table id="servicios" class="table table-striped table-bordered shadow-lg mt-4">
        <thead class="bg-secondary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">SERVICIO</th>
            <th scope="col">ACCIONES</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id }}</td>
                <td>{{ $servicio->serviciomedico }}</td>
                <td>
                    <button class="btn btn-secondary" onclick="Mostrar({{ $servicio->id }})">Mostrar</button>
                    <button class="btn btn-primary" onclick="Editar({{ $servicio->id }})">Editar</button>
                    <button class="btn btn-danger" onclick="Eliminar({{ $servicio->id }})">Eliminar</button>
                </td>
            </tr>
            @include('servicios.modal')
            @endforeach
        </tbody>
    </table>
</div>
