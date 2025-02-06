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
                        <th>Tipo</th>
                        <th>Cuenta</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                        <th>Acciones</th>
                    </tr>
                    @foreach ($payments as $payment)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{$payment->tipo}}</td>
                        <td>{{$payment->cuenta->banco}}/{{$payment->cuenta->cuenta}}</td>
                        <td>$@dinero($payment->monto)</td>
                        <td>{{$payment->created_at->format('d-m-Y')}}</td>
                        <td>{{$payment->user->name}}</td>
                        <td class="text-center">
                            <i class="fas fa-trash-alt" wire:click="delete({{$payment->id}})"></i>
                        </td>
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
