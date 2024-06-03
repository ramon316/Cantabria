<div>
    <div class="card">
        <div class="card-header">
            <div class="row d-flex justify-content-start">
                <div class="col-6">
                    <input type="search" wire:model='search' placeholder="Ingresa el nombre del cliente"
                        class="form-control">
                </div>
                <div class="col-2">
                    <input type="date" name="" id="" class="form-control" wire:model="inicio">
                    <p class="text-center font-weight-light">Fecha inicial</p>
                </div>
                <div class="col-2">
                    <input type="date" name="" id="" class="form-control" wire:model="fin">
                    <p class="text-center font-weight-light">Fecha final</p>
                </div>
                @can('eventos.create')
                <div class="col-2">
                    <a class="btn btn-primary" href=" {{route('eventos.create')}}">Crear Evento</a>
                </div>
                @endcan
            </div>

        </div>
        <div class="card-body">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Contrato</th>
                        <th>Tipo</th>
                        <th>Invitados</th>
                        <th>Fecha</th>
                        @can('eventos.show')
                        <th>Opciones</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                    <tr>
                        <td>{{$evento->nombre}}</td>
                        <td>
                            @if (!empty($evento->contrat))
                            <a href="{{ Storage::url('contratos' . '/' . $evento->contrat)}}"><i class="fas fa-file-pdf fa-2xl"></i></a>
                            @endif
                        </td>
                        <td>{{Str::upper($evento->title)}}</td>
                        <td>{{$evento->invitados}}</td>
                        <td>{{ date('d-m-Y', strtotime($evento->start))}}</td>
                        <td width="10px">
                            @can('eventos.show')
                            <a class="btn btn-primary"
                                href="{{ route('eventos.show', ['evento' => $evento->id])}}">Ver</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$eventos->links('pagination::bootstrap-4')}}
        </div>
    </div>
</div>
