<div class="mt-4">
    <div class="row">
        <div class="col-md-4">
            <label for="">Entrada/crema</label>
            <select name="" id="" class="form-control" wire:model.defer='entry'>
                <option value="">--Selecciona una entrada--</option>
                @foreach ($entrys as $entry)
                    <option value="{{$entry}}">{{$entry}}</option>
                @endforeach
            </select>
            @error('entry')
            <div class="p-2 mt-2 text-xs text-danger">
                {{$message}}
            </div>  
            @enderror
        </div>
        <div class="col-md-4">
            <label>Plato fuerte a base de pollo</label>
            <select name="" id="" class="form-control" wire:model.defer='steak'>
                <option value="">--Selecciona una opción--</option>
                @foreach ($steaks as $steak)
                    <option value="{{$steak}}">{{$steak}}</option>
                @endforeach
            </select>
            @error('steak')
            <div class="p-2 mt-2 text-xs text-danger">
                {{$message}}
            </div>  
            @enderror
        </div>
        <div class="col-md-4">
            <label>Salseo</label>
            <select name="" id="" class="form-control" wire:model.defer='sauce'>
                <option value="">--Selecciona una opción--</option>
                @foreach ($sauces as $sauce)
                    <option value="{{$sauce}}">{{$sauce}}</option>
                @endforeach
            </select>
            @error('sauce')
            <div class="p-2 mt-2 text-xs text-danger">
                {{$message}}
            </div>  
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mt-4">
            <label for="">Guarnicion</label>
            <select name="" id="" class="form-control" wire:model.defer='fitting'>
                <option value="">--Selecciona una opción--</option>
                @foreach ($fittings as $fitting)
                    <option value="{{$fitting}}">{{$fitting}}</option>
                @endforeach
            </select>
            @error('fitting')
            <div class="p-2 mt-2 text-xs text-danger">
                {{$message}}
            </div>  
            @enderror
        </div>

    
        
        <div class="col-md-3 mt-4">
            <label for="">2da Guarnicion</label>
            <select name="" id="" class="form-control" wire:model.defer='fitting2'>
                <option value="">--Selecciona una opción--</option>
                @foreach ($fittings as $fitting)
                    <option value="{{$fitting}}">{{$fitting}}</option>
                @endforeach
            </select>
            @error('fitting2')
            <div class="p-2 mt-2 text-xs text-danger">
                {{$message}}
            </div>  
            @enderror
        </div>


        <div class="col-md-6 mt-4">
            <label for="">Notas:</label>
            <textarea name="" id="" cols="30" rows="3" class="form-control" wire:model.defer='notes'></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mt-3" wire:click='saveBanquet'>Guardar banquete</a>
            @if ($banquet)
            <a class="btn btn-success mt-3" wire:click='format'>Formato</a>
            @endif
        </div>
    </div>
</div>
