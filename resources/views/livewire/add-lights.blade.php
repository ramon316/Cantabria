<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Iluminación</h3>
                <div class="row">
                    {{-- type of light --}}
                    <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model="color1">
                            <option value="">--Control 1--</option>
                            @foreach ($this->lights as $light)
                            <option value="{{$light}}">{{$light}}</option>
                            @endforeach
                        </select>
                        @error('color1')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- name of light --}}
                    <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model="color2">
                            <option value="">--Control 2--</option>
                            @foreach ($this->lights as $light)
                            <option value="{{$light}}">{{$light}}</option>
                            @endforeach
                        </select>
                        @error('color2')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- color of light --}}
                    <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model="color3">
                            <option value="">--Control 3--</option>
                            @foreach ($this->lights as $light)
                            <option value="{{$light}}">{{$light}}</option>
                            @endforeach
                        </select>
                        @error('color3')
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
        </div>
