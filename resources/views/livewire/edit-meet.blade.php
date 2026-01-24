<div>
    @if($showModal)
    <div class="modal fade show" id="editMeetModal" style="display: block; background-color: rgba(0,0,0,0.5);" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Editar Reunión</h5>
                    <button type="button" class="close text-white" wire:click="closeModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateMeet">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="reason_id">Motivo:</label>
                                    <select wire:model="reason_id" class="form-control @error('reason_id') is-invalid @enderror">
                                        <option value="">--Selecciona un motivo--</option>
                                        @foreach ($reasons as $reason)
                                            <option value="{{$reason->id}}">{{$reason->reason}}</option>
                                        @endforeach
                                    </select>
                                    @error('reason_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date">Fecha y Hora:</label>
                                    <input type="datetime-local" wire:model="date" class="form-control @error('date') is-invalid @enderror">
                                    @error('date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="seller">Vendedor asignado:</label>
                                    <select wire:model="seller" class="form-control @error('seller') is-invalid @enderror">
                                        <option value="">--Selecciona un vendedor--</option>
                                        @foreach ($sellers as $sellerOption)
                                            <option value="{{$sellerOption->id}}">{{$sellerOption->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('seller')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client">Cliente:</label>
                                    <select wire:model="client" class="form-control @error('client') is-invalid @enderror">
                                        <option value="">--Selecciona un cliente--</option>
                                        @foreach ($clients as $clientOption)
                                            <option value="{{$clientOption->id}}">{{$clientOption->nombre}}</option>
                                        @endforeach
                                    </select>
                                    @error('client')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                    <button type="button" class="btn btn-primary" wire:click="updateMeet">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
