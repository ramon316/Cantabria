<?php

namespace App\Http\Controllers;

use App\evento;
use Illuminate\Http\Request;
use App\Traits\EventoTrait;

class BaseFloralController extends Controller
{
    use EventoTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(evento $evento){
        $banquetExist = $this->banquetExistTrait($evento);
        return view('basefloral.create')
                ->with('evento', $evento)
                ->with('banquetExist', $banquetExist);

    }
}
