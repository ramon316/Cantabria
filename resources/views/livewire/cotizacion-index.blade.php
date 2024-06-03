<div>
    <div class="card">
        <div class="card-body">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <input type="search" class="form-control" placeholder="Ingresa el nombre del cliente" wire:model='search'>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-primary" href=" {{route('cotizacion.create')}}">Nueva cotización</a>
                    </div>
                </div>
            </div>
            @if ($cotizaciones->count())
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Fecha del evento</th>
                        <th>Fecha de cotización</th>
                        <th>Validez</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cotizaciones as $cotizacion)
                    <tr>
                        <td>{{$cotizacion->nombre}}</td>
                        <td>{{date('d-m-Y', strtotime($cotizacion->start))}}</td>
                        <td>{{date('d-m-Y', strtotime($cotizacion->created_at))}}</td>
                        <td>@if ($cotizacion->validez >= $hoy)
                            <button class="btn btn-success" href="">Activa</button>
                            @else
                            <button class="btn btn-danger" href="">Caducada</button>
                            @endif
                        </td>
                        <td width="10px">
                            <a class="btn btn-primary"
                                href="{{ route('cotizacion.show', ['cotizacion' => $cotizacion->id])}}">Ver</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="card-body">
                    <label for="">No tienes ninguna cotización aun. Puedes crearla en el boton superior</label>
                </div>
            @endif
        </div>

        <div class="card-footer">
            {{$cotizaciones->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>