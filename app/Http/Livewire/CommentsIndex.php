<?php

namespace App\Http\Livewire;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentsIndex extends Component
{
    public $evento;
    public $comment;

    protected $listeners = ['render'];

    protected $rules = [
        'comment'   => 'required'
    ];

    public function render()
    {
       $comments = Comment::where('evento_id', $this->evento->id)->get();
        return view('livewire.comments-index')->with('comments', $comments);
    }

    public function save()
    {
        $this->validate();
        /* create they comment*/
        
        Comment::create([
            'user_id'   =>  Auth()->user()->id,
            'evento_id' =>  $this->evento->id,
            'comment'   =>  $this->comment,
        ]);

        flash()->addSuccess('Comentario creado.');
        $this->reset('comment');
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        flash()->addInfo('Comentario eliminado.');
    }
}
