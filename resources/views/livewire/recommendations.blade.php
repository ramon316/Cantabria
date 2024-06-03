<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <input
                    type="search"
                    wire:model="search"
                    class="form-control"
                    placeholder="Ingresa el nombre de un cliente">
                </div>
                <div class="col-2">
                    <a class="btn btn-primary" href="" data-controls-modal="exampleModal"  data-toggle="modal" data-target="#exampleModal" data-bs-backdrop="static" data-bs-keyboard="false">Nuevo Comentario</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Comentario</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recommendations as $recommendation)
                        <tr>
                            <td>{{$recommendation->name}}</td>
                            <td>{{$recommendation->comment}}</td>
                            <td>{{$recommendation->created_at->format('d/m/Y')}}</td>
                            <td>
                                <svg class="mx-2" role="button" wire:click="$emit('delete',{{$recommendation->id}})" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                                {{-- <svg class="mx-2" role="button" wire:click="$emit('edit',{{$recommendation->id}})" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{$recommendations->links('pagination::bootstrap-4')}}
        </div>
        <!-- Modal -->
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  wire:ignore.self>
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Crear un nuevo comentario</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <label for="">Ingresa el nombre</label>
                    <input type="text" class="form-control" placeholder="Ingresa el nombre" wire:model.defer='name'/>
                    @error('name')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="">Ingresa su comentario</label>
                    <textarea name="" class="form-control" id="" rows="10" wire:model.defer='comment'></textarea>
                    @error('comment')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="">Ingresa su imagen de perfil</label>
                    <input 
                    type="file"
                    wire:model='image'
                    id='{{$identificador}}'
                    />
                    @if ($image)
                        <img width="300" class="m-2" src="{{$image->temporaryUrl()}}">
                    @endif
                    @error('image')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" >Cerrar</button>
              <button type="button" class="btn btn-primary" wire:click='save' wire:loading.attr = 'disabled' wire:target='save, image'>Guardar Comentario</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        window.addEventListener('showModal', event =>{
            $("#exampleModal").modal('show');
        });
    
        window.addEventListener('closeModal', event => {
            console.log('entro');
            /* $("#exampleModal").modal('hide');   */              
        });
    </script>
</div>
