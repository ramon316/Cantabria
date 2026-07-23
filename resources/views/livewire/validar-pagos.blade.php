<div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de Pagos por Validar</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input wire:model="search" type="text" name="table_search" class="form-control float-right" placeholder="Buscar cliente o evento...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Registro</th>
                        <th>Cliente</th>
                        <th>Evento</th>
                        <th>Fecha Evento</th>
                        <th>Monto</th>
                        <th>Tipo</th>
                        <th>Registrado por</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pagos as $pago)
                        <tr>
                            <td>{{ $pago->id }}</td>
                            <td>{{ $pago->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $pago->cliente->nombre ?? 'N/A' }}</td>
                            <td>{{ $pago->evento->title ?? 'N/A' }}</td>
                            <td>{{ $pago->evento ? $pago->evento->start->format('d/m/Y') : 'N/A' }}</td>
                            <td><strong>${{ number_format($pago->monto, 2) }}</strong></td>
                            <td><span class="badge badge-info">{{ $pago->tipo }}</span></td>
                            <td>{{ $pago->user->name ?? 'N/A' }}</td>
                            <td>
                                <button wire:click="validar({{ $pago->id }})" class="btn btn-success btn-sm" title="Validar Pago">
                                    <i class="fas fa-check"></i> Validar
                                </button>
                                <button wire:click="$emit('confirmarRechazo', {{ $pago->id }})" class="btn btn-danger btn-sm" title="Rechazar Pago">
                                    <i class="fas fa-times"></i> Rechazar
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No hay pagos pendientes de validación.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $pagos->links() }}
        </div>
    </div>
</div>
