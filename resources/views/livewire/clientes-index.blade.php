<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <input
                    type="search"
                    wire:model="search"
                    class="form-control"
                    placeholder="Ingresa el nombre o correo de un cliente">
                </div>
                <div class="col-2">
                    <a class="btn btn-primary" href=" {{ route('clientes.create')}}">Nuevo Cliente</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nombre}}</td>
                            <td>{{$cliente->telefono}}</td>
                            <td>{{$cliente->email}}</td>
                            <td width ="10px">
                                <a class="btn btn-primary" href="{{ route('clientes.edit',['cliente'=>$cliente->id])}}">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$clientes->links()}}
        </div>
    </div>
</div>
