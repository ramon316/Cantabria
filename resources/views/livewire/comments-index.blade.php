<div>
    <div class="card">
        <div class="card-header">Comentarios</div>
        <div class="card-body">
            @if (count($comments)<1)
            <p>Este evento aun no contiene comentarios</p>
                @else
                @foreach ($comments as $comment)
                <div class="row border-bottom align-items-center mb-1">
                    <div class="col-md-3">
                        <img src=" {{ asset('/upload-perfiles/' . $comment->user->perfil->imagen) }}" wirth="50"
                            height="50" class="img-circle float-start mt-1">
                        <p class="text-start">{{$comment->user->name}}</p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-start">{{$comment->comment}}</p>
                    </div>
                    <div class=" col-md-2 mr-2 text-bold mb-2">
                        <p>{{date('d-m-Y',strtotime($comment->created_at))}}</p>
                        @if ($comment->user_id == Auth()->user()->id || Auth()->user()->getRoleNames()->first()
                        =="Administrador")
                        <button class="btn btn-danger" wire:click="delete({{$comment}})">Eliminar</button>
                        @endif
                    </div>
                </div>
                @endforeach
                @endif
                <textarea class="form-control" name="" id="" cols="30" rows="4" wire:model.defer="comment"></textarea>
        </div>
        <div class="card-footer">
            <button class="btn btn-primary mt-3" href="" wire:click.prevent="save">Agregar comentario</button>
        </div>
    </div>

</div>
