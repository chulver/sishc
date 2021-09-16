    <table class="table table-striped table-bordered shadow-lg mt-4">
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
                    <button class="btn btn-secondary">Mostrar</button>
                    <button class="btn btn-primary">Editar</button>
                    <button class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
