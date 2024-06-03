<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <input
                    type="search"
                    wire:model="search"
                    class="form-control"
                    placeholder="Ingresa el nombre del servicio">
                </div>
                <div class="col-2">
                    <a class="btn btn-primary" href=" {{ route('servicios.create')}}">Nuevo Servicio</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Costo</th>
                        <th>Invitados</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Días</th>
                        <th>Año</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{$service->nombre}}</td>
                            <td>$@dinero($service->costo)</td>
                            <td>{{$service->invitados}}</td>
                            <td>{{$service->descripcion}}</td>
                            <td>{{$service->categoria}}</td>
                            <td>
                                @if ($service->dias == 1)
                                    Fin de semana
                                @else
                                    Entre semana
                                @endif
                            </td>
                            <td>{{$service->año}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$services->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>

