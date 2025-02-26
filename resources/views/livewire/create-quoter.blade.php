<div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="cliente">Cliente</label>
                <select class="form-control" wire:model="cliente">
                    {{-- Selección de cliente --}}
                    <option value="">--Selecciona al cliente--</option>
                    @foreach ($clientesAll as $cliente)
                    <option value="{{ $cliente->id }}"> {{ $cliente->nombre }} </option>
                    @endforeach
                </select>
                @error('cliente')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="evento">Selecciona el tipo:</label>
                <select class="form-control" wire:model="title">
                    <option value="">--Selecciona el tipo--</option>
                    <option value="Empresarial">Empresarial</option>
                    <option value="Social">Social</option>
                </select>
                <small id="helpNombre" class="form-text text-muted">Selecciona el tipo de evento que deseas
                    crear</small>
                @error('title')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="subtype">Selecciona el subtipo:</label>
                <select class="form-control" wire:model="subtitle">
                    {{-- Selección de cliente --}}
                    <option value="" selected>--Selecciona el subtipo--</option>
                    @foreach ($subtitles as $ejemplo)
                    <option value="{{ $ejemplo }}"> {{ $ejemplo }} </option>
                    @endforeach
                </select>
                @error('subtitle')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Invitados</label>
                <input type="number" class="form-control" wire:model="invitados">
                <small id="helpId" class="form-text text-muted">Ingresa la cantidad de invitados para este
                    evento</small>
                @error('invitados')
                <span class="invalid-feedback d-block" role="alert">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="start">Fecha de inicio</label>
                <input type="datetime-local" class="form-control" wire:model="start">
                <small id="helpId" class="form-text text-muted">Ingresa la fecha de inicio del evento</small>
                @error('start')
                <span class="invalid-feedback d-block" role="alert">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="end">Fecha de finalización</label>
                <input type="datetime-local" class="form-control" wire:model="end">
                <small id="helpId" class="form-text text-muted">Ingresa la fecha de finalización del evento</small>
                @error('end')
                <span class="invalid-feedback d-block" role="alert">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="">Nombre festejado(s)</label>
                <input type="text" class="form-control" wire:model.defer="comment">
                <small id="helpId" class="form-text text-muted">Ingresa el nombre del festejado(s)</small>
                @error('comment')
                <span class="invalid-feedback d-block" role="alert">
                    {{$message}}
                </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="form-group">
            <input type="button" class="btn btn-primary" value="Guardar" wire:click="save">
        </div>
    </div>

</div>
