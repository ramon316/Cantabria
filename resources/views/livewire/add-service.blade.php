<div>
    <div class="row">
        <div class="col-md-5">
            {{-- Este card nos muestra la información del evento con sus servicios --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Servicios agregados - Evento F{{$evento->id}}</h3>
                    <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        {{-- <span class="badge badge-primary">Label</span> --}}
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @if ($eventServices->isEmpty())
                    Este evento aun no cuenta con servicios agregados
                    @else
                    <table class="table table-bordered table-hover">
                        <tbody class="text-center">
                            <tr class="expandable-body">
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Regalo</th>
                                <th>Eliminar</th>
                            </tr>
                            @foreach ($eventServices as $servicio)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{$servicio->nombre}}</td>
                                <td>{{$servicio->pivot->cantidad}}</td>
                                <td>@dinero($servicio->costo * $servicio->pivot->cantidad)</td>
                                <td>
                                    @if ($servicio->pivot->regalo)
                                    Si
                                    @else
                                    No
                                    @endif
                                </td>
                                <td class="text-center">
                                    <i class="fas fa-trash" role="button"
                                        wire:click="deleteService({{$servicio->id}})"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Costo del evento:  $@dinero($costEvent)
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-7">
            {{-- Este card nos sirve para visualizar y buscar los servicios --}}
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Buscar:</span>
                            <input type="text" class="form-control" placeholder="Nombre del servicio"
                                aria-label="Username" aria-describedby="basic-addon1" wire:model="search">
                        </div>
                    </h3>
                    {{-- <div class="card-tools">
                        <!-- Buttons, labels, and many other things can be placed here! -->
                        <!-- Here is a label for example -->
                        <span class="badge badge-primary">Label</span>
                    </div> --}}
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <tbody class="text-center">
                            <tr class="expandable-body">
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Agregar</th>
                            </tr>
                            @foreach ($services as $service)
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>{{$service->nombre}}</td>
                                <td>$@dinero($service->costo)</td>
                                <td class="text-center">
                                    <i class="fas fa-plus-circle" role="button" data-controls-modal="exampleModal"
                                        data-toggle="modal" data-target="#exampleModal" data-bs-backdrop="static"
                                        data-bs-keyboard="false" wire:click="Addservice({{$service->id}})"></i>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{$services->links()}}
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
    </div>



    <!-- Button trigger modal -->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar servicio</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <span class="">{{$servicioName}}</span>
                        <div class="row">
                            <div class="col">
                                <input class="form-control mt-2" type="number" wire:model="count">
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" wire:model="gift">
                                    <label class="form-check-label">
                                        Servicio de regalo
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='close'>Cerrar</button>
                    <button type="button" class="btn btn-primary"
                        wire:click="save({{$count}},'{{$servicioId}}', '{{$gift}}')">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('showModal', event =>{
            $("#exampleModal").modal('show');
        });

    /* Cerrar modal */
    window.addEventListener('closeModal', event=>{
        $('#exampleModal').modal('hide');
    })


</script>
</div>
