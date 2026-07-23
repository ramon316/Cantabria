<div>
    @if ($payments->isEmpty())
    <p class="text-secondary">No se han realizado pagos</p>
    @else
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pagos realizados</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <tbody class="text-center">
                    <tr class="expandable-body">
                        <th>Evento</th>
                        <th>Fecha Evento</th>
                        <th>Tipo</th>
                        <th>Cuenta</th>
                        <th>Monto</th>
                        <th>Fecha Pago</th>
                        <th>Usuario</th>
                        @role('Administrador')
                        <th>Estatus</th>
                        <th>Acciones</th>
                        @endrole
                    </tr>
                    @foreach ($payments as $payment)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{$payment->evento->title ?? 'N/A'}}</td>
                        <td>{{$payment->evento ? $payment->evento->start->format('d-m-Y') : 'N/A'}}</td>
                        <td>{{$payment->tipo}}</td>
                        <td>{{$payment->cuenta->banco}}/{{$payment->cuenta->cuenta}}</td>
                        <td>$@dinero($payment->monto)</td>
                        <td>{{$payment->created_at->format('d-m-Y')}}</td>
                        <td>{{$payment->user->name}}</td>
                        @role('Administrador')
                        <td>
                            @if($payment->status == 'validado')
                                <span class="badge badge-success">Validado</span>
                            @elseif($payment->status == 'rechazado')
                                <span class="badge badge-danger">Rechazado</span>
                            @else
                                <span class="badge badge-warning">Pendiente</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <i class="fas fa-trash-alt" wire:click="delete({{$payment->id}})"></i>
                        </td>
                        @endrole
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">

        </div>
    </div>
    @endif
</div>
