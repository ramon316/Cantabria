<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <input
                        type="search"
                        wire:model="search"
                        class="form-control"
                        placeholder="Ingresa el nombre o el correo del usuario">
                </div>
                <div class="col-2">
                    <a class="btn btn-primary" href=" {{ route('usuarios.create')}} ">Nuevo usuario</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Categoría</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>@if ($usuario->hasRole('Administrador'))
                                Administrador
                            @elseif ($usuario->hasRole('Usuario'))
                                Usuario
                            @else
                                Sin Rol
                            @endif
                        </td>
                        <td width="10px">
                            <a class="btn btn-primary" href="{{ route('usuarios.edit', ['usuario' =>$usuario->id]) }}">Modificar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
                {{$usuarios->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
