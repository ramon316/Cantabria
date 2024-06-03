<?php

namespace App\Http\Controllers;

use App\floralbase;
use App\inventory;
use App\tablecloth;
use App\tableclothbase;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class inventoryController extends Controller
{
    public function tablecloth(){
        $tablecloths = tablecloth::paginate(10);

        return view('inventories.tablecloth')->with('tablecloths',$tablecloths);
    }

    public function tableclothCreate(){
        return view('inventories.tableclothcreate');
    }
    public function tableclothstore(Request $request){

        $this->validate($request,[
            'name'  =>  'required',
            'amount'    =>  'required|numeric|min:1',
            'tonality'  =>  'required',
            'tabletype' =>  'required',
        ]);

        /* Iamgen */
        if ($request->image) {
            $image = $request->file('image');
            /* Name */
            $imageName = Str::uuid() . "." . $image->extension();
            $imageServer = Image::make($image);
            $imageServer->fit(300,300);
            $imagePath = public_path('inventories\tablecloths') . '/' .  $imageName;
            $imageServer->save($imagePath);

        }

       tablecloth::create([
        'name'  => $request->name,
        'amount'    =>  $request->amount,
        'tonality'  =>  $request->tonality,
        'tabletype' =>  $request->tabletype,
        'status'    =>  $request->status,
        'image'     =>  $imageName,
       ]);

       flash('El registro se guardo con écxito');
        return back();
    }

    public function tableclothEdit(tablecloth $tablecloth){

        return view('inventories.tableclothedit')->with('tablecloth',$tablecloth);
    }

    public function tableclothupdate(Request $request, tablecloth $tablecloth){
        $this->validate($request,[
            'name'  =>  'required',
            'amount'    =>  'required|numeric|min:1',
            'tonality'  =>  'required',
            'tabletype' =>  'required',
        ]);

        /* Iamgen */
        if ($request->image) {
            $image = $request->file('image');
            /* Name */
            $imageName = Str::uuid() . "." . $image->extension();
            $imageServer = Image::make($image);
            $imageServer->fit(300, 300);
            $imagePath = public_path('inventories\tablecloths') . '/' .  $imageName;
            $imageServer->save($imagePath);
            /* delete old image */
            if ($tablecloth->image) {
                /* $paths = asset('inventories/tablecloths' . '/' . $tablecloth->image);
                Storage::delete($paths); */
                unlink(public_path('inventories\tablecloths') . '/' .  $tablecloth->image);
            }
        }
        else{
            $imageName = $tablecloth->image;
        }

        $tablecloth->update([
        'name'      => $request->name,
        'amount'    =>  $request->amount,
        'tonality'  =>  $request->tonality,
        'tabletype' =>  $request->tabletype,
        'status'    =>  $request->status,
        'image'     =>  $imageName,
        ]);

        flash('Los datos han sido actualizados');

        return back();
    }

    public function tableclothshow(tablecloth $tablecloth){
        return view('inventories.tableclothshow')->with('tablecloth',$tablecloth);
    }

    public function othersIndex(){
       return view('others.index');
    }

    public function othersCreate(){
        return view('others.create');
    }

    public function othersStore(Request $request){

        $this->validate($request,[
            'color'    =>  'required',
            'type'  =>  'required|nullable',
            'quantity' =>  'required|numeric|min:1',
        ],[
            'color.required'  =>  'El color o tipo es obligatorio',
            'type.required'  =>  'El tipo es obligatorio',
            'quantity.required' =>  'La cantidad es obligatoria',
        ]);

        inventory::create([
            'color'    =>  $request->color,
            'type'  =>  $request->type,
            'quantity' =>  $request->quantity,
        ]);

        flash('El registro se guardo con exito');

        return back();
    }
}
