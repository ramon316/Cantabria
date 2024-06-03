<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Bases florales</div>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mt-1">
                        <select class="form-control" wire:model="category">
                            <option value="">--Categoría--</option>
                            @foreach ($categorys as $category)
                            <option value="{{$category->category}}">{{$category->category}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3 mt-1">
                        <select class="form-control" wire:model="name">
                            <option value="">--Nombres--</option>
                            @foreach ($names as $name)
                            <option value="{{$name->name}}">{{$name->name}}</option>
                            @endforeach
                        </select>
                        @error('name')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3 mt-1">
                        <input type="number" class="form-control" wire:model="amount" placeholder="Ingresa la cantidad">
                        @error('amount')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary mt-1" wire:click="save">Agregar</button>
                    </div>
                </div>
                {{-- En caso de tener Banquete --}}
                @if ($banquetExist == true)
                <div class="row">
                    <div class="col-md-3 mt-1">
                        <select class="form-control" wire:model="napkins">
                            <option value="">--Servilletas--</option>
                            <option value="Ivory">Ivory</option>
                            <option value="Negra">Negra</option>
                        </select>
                        @error('napkins')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-3 mt-1">
                        <select class="form-control" wire:model="plates">
                            <option value="">--Platos--</option>
                            <option value="Dorado">Dorado</option>
                            <option value="Plata">Plata</option>
                        </select>
                        @error('plates')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-title">Bases florales registradas</div>
                <div class="card-tools">
                    <!-- Buttons, labels, and many other things can be placed here! -->
                </div>
            </div>
            <div class="card-body">
                <div class="table table-striped">
                    {{-- Verificamos si existen registros --}}
                    @if ($records->isEmpty() == false)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Categoría</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Servilletas</th>
                                <th>Platos</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                            <tr>
                                <td>{{$record->category}}</td>
                                <td>{{$record->name}}</td>
                                <td>{{$record->pivot->amount}}</td>
                                <td>{{$record->pivot->napkins}}</td>
                                <td>{{$record->pivot->plates}}</td>
                                <td>
                                    <button class="btn btn-danger" wire:click="delete({{$record->id}})">Eliminar</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    Aun no cuenta con registros asignados.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
