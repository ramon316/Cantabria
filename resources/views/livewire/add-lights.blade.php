<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Iluminación</h3>
                <div class="row">
                    {{-- type of light --}}
                    <div class="col-md-2 mt-1">
                        <div class="form-group">
                          <label for="">Ubicación</label>
                          <input type="text" class="form-control" name="place" id="place" aria-describedby="helpId" placeholder="Lugar" wire:model.defer = "place">
                          <small id="helpId" class="form-text text-muted">Ingresa la ubicación de las luces</small>
                        </div>
                        @error('place')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- name of light --}}
                    <div class="col-md-2 mt-1">
                        <label for="">Control</label>
                        <select class="form-control" wire:model="control">
                            <option value="">--Controles--</option>
                            @foreach ($this->controls as $control)
                            <option value="{{$control}}">{{$control}}</option>
                            @endforeach
                        </select>
                        @error('control')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- color of light --}}
                    <div class="col-md-2 mt-1">
                        <label for="">Color</label>
                        <select class="form-control" wire:model="color">
                            <option value="">--Color--</option>
                            @foreach ($this->lights as $color)
                            <option value="{{$color}}">{{$color}}</option>
                            @endforeach
                        </select>
                        @error('color')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- button to add light --}}
                    <div class="col-md-2 mt-1">
                        <input class="btn btn-primary" type="button" value="Agregar" wire:click="addLight">
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($LightsCollections->count())
                <table class="table table-bordered table-hover">
                    <tbody class="text-center">
                        <tr class="expandable-body">
                            <th>Ubicación</th>
                            <th>Control</th>
                            <th>Color</th>
                            <th>Eliminar</th>
                        </tr>
                        @foreach ($LightsCollections as $light)
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>{{$light->place}}</td>
                            <td>{{$light->control}}</td>
                            <td>{{$light->color}}</td>
                            <td class="text-center">
                                <i class="fas fa-trash" role="button"
                                    wire:click="deleteLight({{$light->id}})"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    Este evento no cuenta con iluminación registrada.
                @endif
            </div>
        </div>
