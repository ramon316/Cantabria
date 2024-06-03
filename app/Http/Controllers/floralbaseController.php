<?php

namespace App\Http\Controllers;

use App\floralbase;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class floralbaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('floralbases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('floralbases.create');
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
            'name'  =>  'required',
            'amount'    =>  'required|numeric|min:1',
            'category' =>  'required',
        ]);
        
        /* Iamgen */
        if ($request->image) {
            $image = $request->file('image');
            /* Name */
            $imageName = Str::uuid() . "." . $image->extension();
            $imageServer = Image::make($image);
            $imageServer->fit(300,300);
            $imagePath = public_path('inventories\floralbases') . '/' .  $imageName;
            $imageServer->save($imagePath);
            
        }

       floralbase::create([
        'name'     =>  $request->name,
        'amount'    =>  $request->amount,
        'category'    =>  $request->category,
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
    public function show(floralbase $floralbase)
    {
        return view('floralbases.show')->with('floralbase', $floralbase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(floralbase $floralbase)
    {
        return view('floralbases.edit')->with('floralbase', $floralbase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, floralbase $floralbase)
    {
        $this->validate($request,[
            'name'  =>  'required',
            'amount'    =>  'required|numeric|min:1',
            'category' =>  'required',
        ]);
        
        /* Iamgen */
        if ($request->image) {
            $image = $request->file('image');
            /* Name */
            $imageName = Str::uuid() . "." . $image->extension();
            $imageServer = Image::make($image);
            $imageServer->fit(300,300);
            $imagePath = public_path('inventories\floralbases') . '/' .  $imageName;
            $imageServer->save($imagePath);

            if ($floralbase->image) {
                /* $paths = asset('inventories/tablecloths' . '/' . $tablecloth->image);
                Storage::delete($paths); */
                unlink(public_path('inventories\floralbases') . '/' .  $floralbase->image);
            }
            
        }
        else{
            $imageName = $floralbase->image;
        }

       $floralbase->update([
        'name'     =>  $request->name,
        'amount'    =>  $request->amount,
        'category'    =>  $request->category,
        'image'     =>  $imageName,
       ]);

       flash('Los datos se han actualizado');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
