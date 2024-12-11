<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <input
                    type="text"
                    wire:model="search"
                    class="form-control mb-2"
                    placeholder="Busca la actividad del usuario por su nombre">
                </div>
            </div>
        </div>
        <div class="card-body text-center">
            @if (count($Activitys) >= 1)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Acción</th>
                        <th>Cliente</th>
                        <th>Usuario</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                        @foreach ($Activitys as $Activity)
                        <tr>
                            <td>{{$Activity->description}}</td>
                            <td>{{$Activity->properties['attributes']['cliente.nombre'] ?? $Activity->subject->nombre}}</td>
                            <td>{{$Activity->properties['attributes']['user.name'] ?? 'N/A'}}</td>
                            <td>{{$Activity->created_at->format('d-m-Y h:m a')}}</td>
                            <td class="text-center">
                                <i class="fas fa-trash" role="button"
                                    wire:click="delete({{$Activity->id}})"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    Aun no contamos con actividades.
                @endif
        </div>
        {{-- <div class="card-footer">
            {{$Activitys->links()}}
        </div> --}}
    </div>
</div>

