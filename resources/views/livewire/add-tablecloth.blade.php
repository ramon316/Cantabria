<div>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Mantelería</h3>
                <div class="row">
                    {{-- table type --}}
                    <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model="type">
                            <option value="">--Tipo de mesa--</option>
                            @foreach ($tabletypes as $tipo)
                            <option value="{{$tipo->tabletype}}">{{$tipo->tabletype}}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- name tablecloth --}}
                    <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model="name">
                            @if ($tablenames->count()==0)
                            <option value="">--Sin valores--</option>
                            @else
                            <option value="">--Nombre del mantel--</option>
                            @foreach ($tablenames as $tablename)
                            <option value="{{$tablename->name}}">{{$tablename->name}}</option>
                            @endforeach
                            @endif
                        </select>
                        @error('name')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- color tablecloth --}}
                    <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model="color">
                            @if ($tablecolors->count() == 0 or $tablenames->count() == 0)
                            <option>--Sin valores--</option>
                            @else
                            <option value="">--Tonalidad de mantel--</option>
                            @foreach ($tablecolors as $tablecolor)
                            <option value="{{$tablecolor->tonality}}">{{$tablecolor->tonality}}</option>
                            @endforeach
                            @endif
                        </select>
                        @error('color')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- Color de la base --}}
                    <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model="colorbase">
                            @if ($tablecolorbases->count() == 0 and $tablenames->count() == 0 and
                            $tabletypes->count()==0)
                            <option>--Sin valores--</option>
                            @else
                            <option value="">--Color de base--</option>
                            @foreach ($tablecolorbases as $tablecolorbase)
                            <option value="{{$tablecolorbase->color}}">{{$tablecolorbase->color}}</option>
                            @endforeach
                            @endif
                        </select>
                        @error('color')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- Tipo de silla --}}
                    {{-- <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model='chairtype'>
                            @if ($chairtypes->count() == 0)
                            <option value="">--Sin valores--</option>
                            @else
                            <option value="">--Tipo silla--</option>
                            @foreach ($chairtypes as $chairtype)
                            <option value="{{$chairtype->typechair}}">{{$chairtype->typechair}}</option>
                            @endforeach
                            @endif
                        </select>
                        @error('chairtype')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div> --}}
                    {{-- Color de silla --}}
                    {{-- <div class="col-md-2 mt-1">
                        <select class="form-control" wire:model='chaircolor'>
                            @if ($chaircolors->count() == 0)
                            <option value="">--Sin valor--</option>
                            @else
                            <option value="">--Color silla--</option>
                            @foreach ($chaircolors as $chaircolor)
                            <option value="{{$chaircolor->color}}">{{$chaircolor->color}}</option>
                            @endforeach
                            @endif
                        </select>
                        @error('chaircolor')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div> --}}
                    <div class="col-md-2 mt-1">
                        <input class="form-control" type="number" placeholder="Cantidad de mesas" wire:model='amount'>
                        @error('amount')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- <div class="col-md-2 mt-1">
                        <input class="form-control" type="number" placeholder="Cantidad de sillas" wire:model='chairs'>
                        @error('chairs')
                        <div class="p-2 mt-2 text-xs text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div> --}}
                    <div class="col text-right mt-1">
                        <button class="btn btn-primary" wire:click='addTablecloth'>Agregar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (count($records) >= 1)
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Tipo mesa</th>
                            <th>Mantel</th>
                            <th>Tonalidad</th>
                            <th>Base</th>
                            <th>Tipo Silla</th>
                            <th>Color</th>
                            <th>Número de mesas</th>
                            <th>Número de sillas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($records as $record)
                        <tr>
                            <td>{{$record->tabletype}}</td>
                            <td>{{$record->name}}</td>
                            <td>{{$record->tonality}}</td>
                            <td>{{$record->base_color}}</td>
                            <td>
                                <select name="chairType" id="" class="form-control"
                                    wire:model="chairUpdates.{{ $record->id }}.chairtype">
                                    <option value="">--</option>

                                    @foreach ($chairtypes as $type)
                                    <option value="{{$type->typechair}}">{{$type->typechair}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="chairType" id="" class="form-control"
                                    wire:model='chairUpdates.{{$record->id}}.chaircolor'>
                                    <option value="">--</option>
                                    @if(isset($chairUpdates[$record->id]['chairtype']) &&
                                    isset($availableColors[$record->id]))
                                    @foreach($availableColors[$record->id] as $color)
                                    <option value="{{ $color }}">{{ $color }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </td>
                            <td>{{$record->amount}}</td>
                            <td>
                                <input type="number" name="chairs" class="form-control" wire:model='chairUpdates.{{$record->id}}.chairs'>
                            </td>
                            <td><a class="btn btn-danger" wire:click="deleteTablecloth({{$record->id}})">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                        <div>
                            <button wire:click='updateChairs' class="btn btn-primary">Actualizar Sillas</button>
                        </div>
                    </tbody>
                </table>
                @else
                Este evento aun no cuenta con mantelería registrada.
                @endif
            </div>
        </div>
    </div>
</div>
