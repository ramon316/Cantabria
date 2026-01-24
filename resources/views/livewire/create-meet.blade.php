<div>
    <div>
        <div class="card">
            <div class="card-header">
                <div class="row d-flex justify-content-start">
                    <div class="col-6">
                        <input type="search" wire:model='search' placeholder="Ingresa el nombre del cliente"
                            class="form-control">
                    </div>
                    <div class="col-2">
                        <input type="datetime-local" name="" id="" class="form-control"
                            wire:model="inicio">
                        <p class="text-center font-weight-light">Fecha inicial</p>
                    </div>
                    <div class="col-2">
                        <input type="datetime-local" name="" id="" class="form-control"
                            wire:model="fin">
                        <p class="text-center font-weight-light">Fecha final</p>
                    </div>
                    @role('Administrador|Ventas|Planeacion')
                        <div class="col-2">
                            <a class="btn btn-primary" href=" {{ route('meets.create') }}">Crear Reunión</a>
                        </div>
                    @endrole
                </div>

            </div>
            <div class="card-body">
                @if ($meets->isEmpty())
                    No cuentas con reuniones asiganadas.
                @else
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Vendedor</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Motivo</th>
                                <th>Contrato</th>
                                @can('eventos.show')
                                    <th>Opciones</th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($meets as $meet)
                                <tr>
                                    <td>{{ $meet->user->name }}</td>
                                    <td>{{ $meet->nombre }}</td>
                                    <td>{{ date('d-m-Y H:i', strtotime($meet->start)) }}</td>
                                    <td>{{ $meet->reason->reason }}</td>
                                    <td>
                                        @if (!is_Null($meet->contrato))
                                            @if ($meet->contrato == 1)
                                                <button class="btn btn-success btn-sm">Si</button>
                                           @else
                                                <button class="btn btn-danger btn-sm">No</button>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @can('eventos.show')
                                            <button class="btn btn-warning btn-sm"
                                                wire:click="$emit('editMeet', {{ $meet->id }})"
                                                title="Editar reunión">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('meets.show', ['meet' => $meet->id]) }}"
                                                title="Ver detalles">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <div class="card-footer">
                {{ $meets->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

    {{-- Modal de edición --}}
    @livewire('edit-meet')

</div>
