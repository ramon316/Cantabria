<?php

namespace App\Http\Controllers;

use App\tablecloth;
use App\tableclothbase;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class tableclothbaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tableclothbase.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tableclothbase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'color'  =>  'required',
            'amount'    =>  'required|numeric|min:1',
            'tabletype' =>  'required',
        ]);
        
        /* Iamgen */
        if ($request->image) {
            $image = $request->file('image');
            /* Name */
            $imageName = Str::uuid() . "." . $image->extension();
            $imageServer = Image::make($image);
            $imageServer->fit(300,300);
            $imagePath = public_path('inventories\tableclothbases') . '/' .  $imageName;
            $imageServer->save($imagePath);
            
        }

       tableclothbase::create([
        'color'     =>  $request->color,
        'amount'    =>  $request->amount,
        'tabletype' =>  $request->tabletype,
        'status'    =>  $request->status,
        'image'     =>  $imageName,
       ]);

       flash('El registro se guardo con éxito');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(tableclothbase $tableclothbase)
    {
        return view('tableclothbase.show')->with('tableclothbase', $tableclothbase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tableclothbase $tableclothbase)
    {
        return view('tableclothbase.edit')->with('tableclothbase', $tableclothbase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tableclothbase $tableclothbase)
    {
        $this->validate($request,[
            'color'  =>  'required',
            'amount'    =>  'required|numeric|min:1',
            'tabletype' =>  'required',
        ]);

        /* Iamgen */
        if ($request->image) {
            $image = $request->file('image');
            /* Name */
            $imageName = Str::uuid() . "." . $image->extension();
            $imageServer = Image::make($image);
            $imageServer->fit(300, 300);
            $imagePath = public_path('inventories\tableclothbases') . '/' .  $imageName;
            $imageServer->save($imagePath);
            /* delete old image */
            if ($tableclothbase->image) {
                /* $paths = asset('inventories/tablecloths' . '/' . $tablecloth->image);
                Storage::delete($paths); */
                unlink(public_path('inventories\tableclothbases') . '/' .  $tableclothbase->image);
            }
        }
        else{
            $imageName = $tableclothbase->image;
        }

        $tableclothbase->update([
        'color'      => $request->color,
        'amount'    =>  $request->amount,
        'tabletype' =>  $request->tabletype,
        'status'    =>  $request->status,
        'image'     =>  $imageName,
        ]);

        flash('Los datos han sido actualizados');

        return back();
    }

}
