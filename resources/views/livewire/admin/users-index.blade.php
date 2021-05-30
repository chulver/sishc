<div>
    <div class="card">
        <div class="card-header">
            <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el nombre o el correo de un usuario">
        </div>
        @if($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="bg-secondary text-white">
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>ACCIONES</th>
                    <thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user) }}">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
    </div>
</div>
