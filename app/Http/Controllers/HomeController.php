<?php

namespace App\Http\Controllers;

use App\evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        
        $eventos = evento::all(['title','start','id']);
        //return $eventos; 

        //$eventos = DB::table('eventos')->get()->pluck('inicio','tipo_id');
        //return response()->json(["My events" => $eventos]);
        return view('home')->with('eventos',$eventos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
    }

    
}
